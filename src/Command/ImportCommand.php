<?php namespace Thyyppa\Drifter\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Thyyppa\Drifter\Dump\Parser;
use Thyyppa\Drifter\Loader\Loader;

class ImportCommand extends Command {

    protected function configure()
    {
        $this
            ->setName( 'import' )
            ->setDescription( 'Import SQL Dump' )
            ->addArgument(
                'sqldump',
                InputArgument::REQUIRED,
                'SQL Dump'
            );
    }


    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function execute( InputInterface $input, OutputInterface $output )
    {
        $dump = new Loader( $input->getArgument( 'sqldump' ) );
        $parser = new Parser();

        $tables = $parser->get_tables( $dump->data() );

        $output->writeln( '<info>Done!</info>' );
    }

}
