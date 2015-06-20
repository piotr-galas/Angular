<?php

namespace Piga\AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PigaAngularBundle:Default:index.html.twig', array('name' => $name));
    }
}
