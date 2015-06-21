<?php

namespace Piga\AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class AngularController extends BaseController
{
    public function indexAction()
    {
        $baseAngularView = $this->getParameter('base.angular.view');
		return $this->render($baseAngularView);
    }
}
