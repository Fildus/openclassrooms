<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * ---Connection---
 *      (success) Connexion Première page
 *      (fail) Connexion à la deuxieme page
 *      (success) Connexion à la troisème page
 *
 * ---Language---
 *      (success) Sélection du language
 *
 * ---Achat d'un ticket---
 *      (success) Achat
 *      (success) Paiement
 *      (success) Récapitulatif

 * ---Achat de plusieurs tickets---
 *      (success) Achat
 *      (success) Paiement
 *      (success) Récapitulatif
 *
 * ---Commande première page---
 *      (fail) Mail incorrect
 *      (fail) date passée|Jour fermé|musé rempli
 *
 * ---Prix en fonction de paramètres---
 *      (test PRIX) birthday => prix
 *      (test PRIX) discount => prix
 *
 * Class OrderControllerTest
 * @package Controller\Tests
 */
class OrderControllerTest extends WebTestCase
{

    /**---Connexion---**/

    /**
     * Connexion à la première page (success)
     */
    public function testFirstPageConnexion()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        static::assertSame(200,$client->getResponse()->getStatusCode());

        echo $client->getResponse()->getContent();
    }

    /**
     * Connexion à la deuxième page (fail)
     */
    public function testSecondPageConnexion()
    {
        $client = static::createClient();
        $client->followRedirects();
        $client->request('GET', '/fr/paiement');


        static::assertContains('vous ne pouvez pas accéder au paiement',
            $client->getResponse()->getContent() );
        static::assertSame(200,$client->getResponse()->getStatusCode());

        echo $client->getResponse()->getContent();
    }

    /**
     * Connexion à la troisème page (success)
     */
    public function testThirdPageConnexion()
    {
        $client = static::createClient();
        $client->request('GET', '/fr/recap');

        static::assertSame(200,$client->getResponse()->getStatusCode());

        echo $client->getResponse()->getContent();
    }

    /**---Language---**/

    /**
     * Sélection language
     */
    public function testSelectLanguageFrEn()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        static::assertSame('fr',$client->getRequest()->getLocale());
        static::assertContains('Récupérer vos tickets',$crawler->html());

        $linkEn = $crawler->selectLink("en")->link();
        $crawler = $client->click($linkEn);

        static::assertContains('Recover your tickets',$client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**
     * Achat d'un ticket (success)
     */
    public function testPrepareBuyingOneTicket()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2000-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-20';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Etape n°2', $client->getResponse()->getContent());

        /**---Paiement---**/
        $form = $crawler->selectButton('Acheter')->form();

        $form['number']      = 4242424242424242;
        $form['exp_month']   = 12;
        $form['exp_year']    = 19;
        $form['cvc']         = 777;

        $crawler = $client->submit($form);

        static::assertContains('Récapitulatif', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**
     * Achat plusieurs tickets (success)
     */
    public function testPrepareBuyingThreeTicket()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        /**
         * first ticket (price normal)
         */
        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2000-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-20';

        /**
         * second ticket (price old person)
         */
        $values['order']['ticket'][2]['visitor']['firstName'] = 'robert';
        $values['order']['ticket'][2]['visitor']['lastName']  = 'Francesco';
        $values['order']['ticket'][2]['visitor']['birthday']  = '1955-01-01';
        $values['order']['ticket'][2]['visitor']['country']   = 'EN';
        $values['order']['ticket'][2]['date']                 = '2018-07-20';

        /**
         * third ticket (price young person)
         */
        $values['order']['ticket'][3]['visitor']['firstName'] = 'cerise';
        $values['order']['ticket'][3]['visitor']['lastName']  = 'MAAF';
        $values['order']['ticket'][3]['visitor']['birthday']  = '1995-01-01';
        $values['order']['ticket'][3]['visitor']['country']   = 'FR';
        $values['order']['ticket'][3]['date']                 = '2018-07-20';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Etape n°2', $client->getResponse()->getContent());

        /**---Paiement---**/
        $form = $crawler->selectButton('Acheter')->form();

        $form['number']      = 4242424242424242;
        $form['exp_month']   = 12;
        $form['exp_year']    = 20;
        $form['cvc']         = 888;

        $crawler = $client->submit($form);

        static::assertContains('Récapitulatif', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**---Commande première page---**/

    /**
     * Mail incorrect (fail)
     */
    public function testPrepareBuyingTicketMailIncorrect()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@marchepas';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2000-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-20';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('L&#039;email &#039;&quot;davidgastaldello@marchepas&quot;&#039; n&#039;est pas valide.',
            $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }


    /**
     * date passée (fail)
     */
    public function testPrepareBuyingTicketPastDay()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2000-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-01-01';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Il n&#039;est pas possible de commander pour les jours passés.',
            $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**
     * jour fermé (fail)
     */
    public function testPrepareBuyingTicketCloseDay()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2000-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-17';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Il n&#039;est pas possible de commander pour le 17-07-2018&quot;. Car le musé est fermé.',
            $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**
     * jour musé plein (fail)
     */
    public function testPrepareBuyingTicketFullMuseum()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();

        /**
         * first ticket (price normal)
         */
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2000-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-21';

        /**
         * second ticket (price normal)
         */
        $values['order']['ticket'][2]['visitor']['firstName'] = 'melinda';
        $values['order']['ticket'][2]['visitor']['lastName']  = 'girou';
        $values['order']['ticket'][2]['visitor']['birthday']  = '1990-01-01';
        $values['order']['ticket'][2]['visitor']['country']   = 'FR';
        $values['order']['ticket'][2]['date']                 = '2018-07-21';

        /**
         * third ticket (price old person)
         */
        $values['order']['ticket'][3]['visitor']['firstName'] = 'michel';
        $values['order']['ticket'][3]['visitor']['lastName']  = 'denis';
        $values['order']['ticket'][3]['visitor']['birthday']  = '1930-01-01';
        $values['order']['ticket'][3]['visitor']['country']   = 'FR';
        $values['order']['ticket'][3]['date']                 = '2018-07-21';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());


        static::assertContains('Vous souhaitez commander 3 place\s, hors 2 places sont disponibles pour le &quot;21-Jul-2018&quot;.',
            $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**---Prix en fonction de paramètres---**/

    /**
     * Achat d'un ticket Prix "Normal"(success)
     */
    public function testBuyingOneTicketPriceNormal()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2000-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-20';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Etape n°2', $client->getResponse()->getContent());
        static::assertContains('16</output>', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**
     * Achat d'un ticket Prix "Enfant"(success)
     */
    public function testBuyingOneTicketPriceEnfant()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '2013-07-20';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-20';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Etape n°2', $client->getResponse()->getContent());
        static::assertContains('8</output>', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**
     * Achat d'un ticket Prix "Senior"(success)
     */
    public function testBuyingOneTicketPriceSenior()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '1950-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-20';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Etape n°2', $client->getResponse()->getContent());
        static::assertContains('12</output>', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

    /**
     * Achat d'un ticket Prix "Militaire.."(success)
     */
    public function testBuyingOneTicketPriceDiscount()
    {
        /**---Remplissage des champs---**/
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $client->followRedirects();

        $form = $crawler->selectButton('soumission du formulaire')->form();
        $form['order[mail]'] = 'davidgastaldello@msn.com';

        $values = $form->getPhpValues();
        $values['order']['ticket'][1]['visitor']['firstName'] = 'david';
        $values['order']['ticket'][1]['visitor']['lastName']  = 'gastaldello';
        $values['order']['ticket'][1]['visitor']['birthday']  = '1980-01-01';
        $values['order']['ticket'][1]['visitor']['country']   = 'FR';
        $values['order']['ticket'][1]['date']                 = '2018-07-20';
        $values['order']['ticket'][1]['discount']             = true;

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        static::assertContains('Etape n°2', $client->getResponse()->getContent());
        static::assertContains('10</output>', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();
    }

}