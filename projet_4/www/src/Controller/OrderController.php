<?php
declare(strict_types=1);


namespace App\Controller;


use App\Entity\Order;
use App\Form\GetOrder;
use App\Form\LanguageType;
use App\Form\Order\OrderType;
use App\Service\MailerService;
use App\Service\FlashesService;
use App\Service\ProgressService;
use App\Repository\OrderRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route as Route;


/**
 * Class OrderController
 * @package App\Controller
 */
class OrderController extends Controller
{

    /**
     * @Route("/{_locale}", name="home", methods={"GET","POST"}, defaults={"_locale":"fr"})
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(Request $req, FlashesService $flash): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order, ['order' => $order]);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()) {
            $this->container->get('session')->set('form', $form->getData());
            return $this->redirectToRoute('stripe');
        }

        return new Response($this->renderView('index.php.twig', [
            'form'      => $form->createView(),
            'flashs'    => $flash->getFlashes($req),
            'progress'  => ['color'=>'secondary','size'=>100/3],
        ]));
    }

    /**
     * @Route("/{_locale}/recap", name="recap", methods={"GET","POST"}, defaults={"_locale":"fr"})
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     * @throws \Exception
     */
    public function recap(Request $req, OrderRepository $orderRep, FlashesService $flash)
    {
        $form = $this->createForm(GetOrder::class);

        if ($form->handleRequest($req)->isSubmitted() && $form->isValid()){
            $order = $orderRep->findOneBy([
                'stripeToken'=> $form->getData()['name']]);
        }elseif ($req->get('stripeToken')){
            $order = $orderRep->findOneBy(['stripeToken'=>$req->get('stripeToken')]);
        }else{
            $session = $this->get('session');
            $session->has('stripeToken')?
                $order = $orderRep->findOneBy(['stripeToken'=>$session->get('stripeToken')]):
                $order = null;
        }

        return new Response($this->renderView('recap.html.twig', [
            'order'     => $order,
            'form'      => $form->createView(),
            'flashs'    => $flash->getFlashes($req),
            'progress'  => ['color'=>'success','size'=>100],
        ]));
    }

}