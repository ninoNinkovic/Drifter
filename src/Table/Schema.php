<?php namespace Thyyppa\Drifter\Table;

class Schema {

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $default;

    /**
     * @var bool
     */
    public $nullable;

    /**
     * @var bool
     */
    public $auto_increment;

    /**
     * @var bool
     */
    public $primary_key;


    /**
     * @param string $name
     * @param string $type
     * @param int    $default
     * @param bool   $nullable
     * @param bool   $auto_increment
     * @param bool   $primary_key
     */
    public function __construct( $name, $type, $default = 0, $nullable = true, $auto_increment = false, $primary_key = false )
    {
        $this->name = $name;
        $this->type = $type;
        $this->default = $default;
        $this->nullable = $nullable;
        $this->auto_increment = $auto_increment;
        $this->primary_key = $primary_key;
    }

}
