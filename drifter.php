#!/usr/bin/php
<?php require_once 'vendor/autoload.php';

set_time_limit( 0 );
ini_set( 'memory_limit', '4G' );
ini_set( 'default_charset', 'utf-8' );

use Thyyppa\Drifter\Command\ImportCommand;

function base_dir() { return __DIR__; }

$app = new Symfony\Component\Console\Application( 'Drifter', '1.0.0' );

foreach ( [
            ImportCommand::class,
          ] as $command ) {

    $app->add( new $command() );

}

$app->run();
