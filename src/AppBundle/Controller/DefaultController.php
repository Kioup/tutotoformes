<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $this->addFlash('info', "Je suis un message d'info");
        $this->addFlash('error', "Je suis un message d'erreur");
        $this->addFlash('success', "Je suis un message positif");
        return $this->render('index.html.twig');
    }

    /**
     * @Route(name="menu")
     */
    public function menuAction($inverted = false) {
        $pages = [];
        $requestStack = $this->get('request_stack');
        $masterRequest = $requestStack->getMasterRequest();
        return $this->render('partials/_menu.html.twig', ['pages' => $pages, 'inverted' => $inverted, 'route_name' => $masterRequest->attributes->get('_route')]);
    }

}
