<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ResetController
 * @package App\Controller
 */
class ResetController extends Controller
{
    /**
     * @Route("/reset", name="reset")
     * @param Session $session
     * @return Response
     */
    public function index(Session $session)
    {
        $session->clear();
        return $this->redirectToRoute('home');
    }
}
