<?php

namespace Piga\AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class DemoController extends BaseController
{
	public function indexAction()
	{
		return $this->render('PigaAngularBundle:Demo:index.html.twig',array('variable' => 'value'));
	}
}
