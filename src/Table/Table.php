<?php namespace Thyyppa\Drifter\Table;

class Table {

    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $schema;

    /**
     * @var string
     */
    public $primary;


    /**
     * @param $name
     * @param $schema
     */
    public function __construct( $name, $schema )
    {
        $this->name = $name;
        $this->primary = $this->getPrimaryKey( $schema );
        $this->schema = $this->buildSchema( $schema );
    }


    /**
     * @param $schema
     *
     * @return array
     */
    private function buildSchema( $schema )
    {
        $schema = explode( "\n", $schema );

        $output = [ ];

        foreach ( $schema as $line ) {
            if ( strlen( $line ) < 2 ) {
                continue;
            }

            preg_match( '#`([A-Za-z0-9_-]+)`\s([\w\(\)]+)\s#', $line, $matches );

            if ( count( $matches ) < 2 ) {
                continue;
            }

            $name = $matches[ 1 ];
            $type = $matches[ 2 ];
            $nullable = stristr( $line, 'NOT NULL' ) > 0 ? false : true;
            $ai = stristr( $line, 'AUTO INCREMENT' ) > 0 ? true : false;
            $pk = $name == $this->primary;

            $output[ $name ] = new Schema( $name, $type, 0, $nullable, $ai, $pk );
        }

        return $output;

    }


    /**
     * @param $schema
     *
     * @return mixed
     */
    private function getPrimaryKey( $schema )
    {
        preg_match( '#PRIMARY KEY \(`([\w\W0-9_-]+)`\)#', $schema, $matches );

        return $matches[ 1 ];
    }

}
