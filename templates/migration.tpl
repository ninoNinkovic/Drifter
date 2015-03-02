<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{migration}} extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('{{name}}', function(Blueprint $table)
        {

            {{schema}}
        });

    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {

        Schema::drop('{{name}}');

    }

}
