<?php namespace Thyyppa\Drifter\Builder;

class MigrationBuilder implements BuilderInterface {

    private $table;


    public function __construct( $table )
    {
        $this->table = $table;
    }


    public function output()
    {

        $migration = $this->table->name . '_' . time();
        $schema = ( new SchemaBuilder( $this->table->schema ) )->output();

        $output = file_get_contents( base_dir() . '/templates/migration.tpl' );
        $output = str_replace( '{{name}}', $this->table->name, $output );
        $output = str_replace( '{{migration}}', $migration, $output );
        $output = str_replace( '{{schema}}', $schema, $output );

        return $output;
    }

}
