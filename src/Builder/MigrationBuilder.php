<?php namespace Thyyppa\Drifter\Builder;

class MigrationBuilder implements BuilderInterface {

    private $table;

    public $migration_name;

    public function __construct( $table )
    {
        $this->table = $table;
        $this->migration_name = $this->table->name . '_' . time();
    }


    public function output()
    {

        $schema = ( new SchemaBuilder( $this->table->schema ) )->output();

        $output = file_get_contents( base_dir() . '/templates/migration.tpl' );
        $output = str_replace( '{{name}}', $this->table->name, $output );
        $output = str_replace( '{{migration}}', $this->migration_name, $output );
        $output = str_replace( '{{schema}}', $schema, $output );

        return $output;
    }

}
