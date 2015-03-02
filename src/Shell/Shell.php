<?php namespace Thyyppa\Drifter\Shell;

class Shell implements ShellInterface {

    public function exec( $cmd )
    {
        return shell_exec( $cmd );
    }

}
