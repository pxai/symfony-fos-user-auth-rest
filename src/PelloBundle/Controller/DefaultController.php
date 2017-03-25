<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/pello", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $response =  $this->render('PelloBundle:Default:login.html.twig');
        return  $response;
    }



}
