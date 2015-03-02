<?php namespace Thyyppa\Drifter\Builder;

class SchemaBuilder implements BuilderInterface {


    /**
     * @var
     */
    private $schema;


    public function __construct( $schema )
    {
        $this->schema = $schema;
    }


    public function output()
    {
        $output = '';

        foreach ( $this->schema as $column ) {

            $output .= $this->makeMigration( $column ) . "\n" . str_repeat( ' ', 12 );

        }

        return $output;
    }


    public function makeMigration( $column )
    {

        $nullable = '';

        if ( $column->nullable ) {
            $nullable = '->nullable()';
        }

        return sprintf(
            '$table->%s(\'%s\'%s)%s%s;',
            $this->getType( $column->type ),
            $column->name,
            $this->getAttribute( $column->type ),
            $nullable,
            $this->getDefault( $column->default )
        );

    }


    private function getType( $type )
    {
        return explode( '(', $type )[ 0 ];
    }


    private function getAttribute( $type )
    {
        $type = explode( '(', $type )[ 1 ];
        $type = explode( ')', $type )[ 0 ];

        if ( strlen( $type ) < 1 ) {
            return;
        }

        return sprintf( ', \'%s\'', $type );
    }


    private function getDefault( $default )
    {
        if ( $default == 0 ) {
            return;
        }

        return sprintf( '->default(\'%s\')', $default );
    }

}
