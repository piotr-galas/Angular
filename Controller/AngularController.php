<?php

namespace Piga\AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class AngularController extends BaseController
{
    public function indexAction()
    {
        return $this->render('PigaAngularBundle:Angular:index.html.twig'
        );
    }
}
