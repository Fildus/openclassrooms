<?php
declare(strict_types=1);

namespace App\Service\Stripe;

use Stripe\Stripe;
use Stripe\Charge;

use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Translation\Exception\InvalidArgumentException;


/**
 * Class StripeService
 * @package App\Service\Stripe
 */
class StripeService
{

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var mixed
     */
    private $request;

    /**
     * @var $_locale
     */
    private $_locale;

    /**
     * @var $form
     */
    private $form;

    /**
     * @var $paid
     */
    private $paid;


    /**
     * StripeService constructor.
     * @param SessionInterface $session
     * @param TranslatorInterface $translator
     */
    public function __construct(SessionInterface $session, TranslatorInterface $translator)
    {
        $this->session      = $session;
        $this->translator   = $translator;
    }

    /**
     * @param $_locale
     * @param $request
     * @param $form
     * @return $this
     */
    public function hydrate($_locale, $request, $form): self
    {
        Stripe::setApiKey('sk_test_JRo7mkkzsuruvV5rat43LVUM');
        $this->form    = $form;
        $this->_locale = $_locale;
        $this->request = $request;
        return $this;
    }

    /**
     * for testing tok_bypassPending
     * for real connection $this->request->get('stripeToken')
     * @return $this
     */
    public function doCharge(): self
    {
        $charge = Charge::create([
            'amount'        => $this->form->getTotal()*100,
            'currency'      => 'eur',
            'description'   => 'Tickets musé du louvre',
            'source'        => 'tok_bypassPending'
        ]);
        $charge->paid ? $this->paid = true : false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->paid;
    }

    /**
     * @return array|null
     * @throws InvalidArgumentException
     */
    public function getView(): ?array
    {
        if($this->session->has('form')){
            return [
                'currency'          => 'eur',
                'total'             => $this->session->get('form')->getTotal(),
                'data_key'          => 'pk_test_0qpcWx5gkWzV92iEiuHckQYQ',
                'name'              => $this->translator->trans('stripe.data_description'),
                'data_description'  => $this->translator->trans('stripe.name'),
                'data_locale'       => $this->_locale,
                'mail'              => $this->session->get('form')->getMail()
            ];
        }
        return null;
    }
}