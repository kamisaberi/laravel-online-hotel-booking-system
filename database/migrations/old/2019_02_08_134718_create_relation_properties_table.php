<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('default_value');
            $table->string('input_type');
            $table->integer('level');
            $table->integer('relation_type')->unsigned();
            $table->integer('parent')->unsigned();
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
        Schema::dropIfExists('relation_properties');
    }
}
