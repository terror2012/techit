<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function(Blueprint $t) {
           $t->increments('id');
           $t->integer('section_id')->nullable();
           $t->string('name');
           $t->string('image');
           $t->string('icon');
           $t->string('small_description');
           $t->string('link')->nullable();
           $t->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services');
    }
}
