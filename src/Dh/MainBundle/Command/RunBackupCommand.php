<?php
namespace Dh\MainBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Dh\MainBundle\Service\Backup;

class RunBackupCommand extends ContainerAwareCommand
{
    /*
    * Sets configuration for command
    */
    protected function configure()
    {
    $this
    // the name of the command (the part after "bin/console")
    ->setName('zephyr:run-backup')

    // the short description shown while running "php bin/console list"
    ->setDescription('Runs the backup function.')

    // the full command description shown when running the command with
    // the "--help" option
    ->setHelp('This command allows you run the backup functionality.');
    }

    /*
    * Function to execute command
    */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
      // Runs backup service
      $backup = new Backup;
      $makeZip = $backup->makeZip(".");

      //Add's timestamp to DB
      //timestamp
      //succesfull
      //filename
      //fullpath

      $output->writeln('Backup successfully generated!');
    }
}
