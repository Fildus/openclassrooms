<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\LanguageType;
use App\Service\FlashesService;
use App\Service\MailerService;
use App\Service\ProgressService;
use App\Service\Stripe\StripeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class StripeController
 * @package App\Controller
 */
class StripeController extends Controller
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var FlashesService
     */
    private $flashes;

    /**
     * OrderController constructor.
     * @param EntityManagerInterface $entityManager
     * @param FlashesService $flashes
     */
    public function __construct(EntityManagerInterface $entityManager, FlashesService $flashes)
    {
        $this->entityManager    = $entityManager;
        $this->flashes          = $flashes;
    }

    /**
     * @Route("/{_locale}/paiement", name="stripe", methods={"GET","POST"}, defaults={"_locale":"fr"})
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     * @throws \Exception
     */
    public function stripe(Request $req, StripeService $stripe, SessionInterface $session, MailerService $mailer)
    {
        if($req->isMethod('POST') && $session->has('form')) {
            $stripe
                ->hydrate($req->getLocale(), $req->request, $session->get('form'))
                ->doCharge();
            if($stripe->isPaid()) {
//                $session->get('form')->setStripeToken($req->get('stripeToken'));
                /**--for testing--**/
                $session->get('form')->setStripeToken(md5(random_bytes(30)));

                $this->entityManager->persist($session->get('form'));
                $this->entityManager->flush();

                $mailer->sendTicketsByMail($session->get('form'), $req);

                $session->set('stripeToken', $session->get('form')->getStripeToken());
                $session->remove('form');

                return $this->redirectToRoute('recap');
            }
            $session->getFlashBag()->add('danger','Le paiement a échoué. Veuillez réessayer.');
            return $this->redirectToRoute('home');
        }

        if(!$session->has('form')){
            $session->getFlashBag()->add('danger','vous ne pouvez pas accéder au paiement tant que le formulaire n\'est pas valide ');
            return $this->redirectToRoute('home');
        }

        return new Response($this->renderView('stripe.html.twig', [
            'stripe'    => $stripe->getView(),
            'flashs'    => $this->flashes->getFlashes($req),
            'progress'  => ['color'=>'warning','size'=>100/1.5],
        ]));
    }
}
