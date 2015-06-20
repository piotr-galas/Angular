<?php

namespace Piga\AngularBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Process\Process;


class InstallCommand extends ContainerAwareCommand
{

	protected function configure()
	{
		$this
			->setName('piga:angular:install')
			->setDescription('Initialize all nessesary angular command')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->bowerInstallCommand($input, $output);
		$this->symlinkInstallCommand($input, $output);
	}

	private function bowerInstallCommand($input, $output)
	{
		$command = $this->getApplication()->find('piga:bower:install');
		$command->run($input, $output);
	}

	private function symlinkInstallCommand($input, $output)
	{
		$asseticInstall = $this->getApplication()->find(('assets:install'));

		$arguments = array(
			'command' => 'assets:install',
			'--symlink'  => 'web',
		);
		$input = new ArrayInput($arguments);
		$asseticInstall->run($input,$output);
	}

}