<?php

namespace Piga\AngularBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Process\Process;


class BowerCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('piga:bower:install')
            ->setDescription('install bower dependencies to public folder')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$bashCommand = $this->bashCommand();
		$process = new Process($bashCommand);
		$process->run();
		echo $process->getOutput();
    }

	private function getBundlePath()
	{
		$kernel = $this->getContainer()->get('kernel');
		return  $kernel->locateResource('@PigaAngularBundle');
	}

	private function bashCommand()
	{
		return 'cd ' . $this->getBundlePath() . ' && bower install';
	}


}