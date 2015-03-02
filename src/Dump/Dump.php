<?php namespace Thyyppa\Drifter\Dump;

class Dump implements DumpInterface {

    /**
     * @var
     */
    public $data;


    /**
     * @param $data
     */
    public function __construct( $data )
    {
        $this->data = $data;
    }

}
