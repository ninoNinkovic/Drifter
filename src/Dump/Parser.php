<?php namespace Thyyppa\Drifter\Dump;

use Thyyppa\Drifter\Table\Table;

class Parser {

    /**
     * @param $data
     *
     * @return mixed
     */
    public function get_tables( $data )
    {
        preg_match_all( '#(CREATE TABLE `([A-Za-z0-9_-]+)` \(([^;]*)\))#', $data, $tables, PREG_SET_ORDER );

        array_walk( $tables, function ( &$data ) {
            $data = new Table( $data[ 2 ], $data[ 3 ] );
        } );

        return $tables;
    }

}
