<?php namespace Thyyppa\Drifter\Loader;

use Thyyppa\Drifter\Dump\Dump;

class Loader implements LoaderInterface {

    /**
     * @var
     */
    private $data;


    /**
     * @param $filename
     */
    public function __construct( $filename )
    {
        $this->load( $filename );
    }


    /**
     * @param $filename
     */
    public function load( $filename )
    {
        $this->data = new Dump( file_get_contents( $filename ) );
    }


    /**
     * @return mixed
     */
    public function data()
    {
        return $this->data->data;
    }

}
