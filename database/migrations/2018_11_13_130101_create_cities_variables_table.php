<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesVariablesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities_variables',
                       function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code');
            $table->integer('default_value');
            $table->string('default_fixed_value')->nullable();
            $table->string('default_field_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities_variables');
    }

}
