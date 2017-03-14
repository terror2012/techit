<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Queries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function(Blueprint $t){
            $t->increments('id');
            $t->string('name');
            $t->string('user_id')->nullable();
            $t->string('email');
            $t->string('phone');
            $t->longText('message');
            $t->integer('contact'); //1->email, 2->phone, 3->text
            $t->string('city');
            $t->string('state');
            $t->integer('zip');
            $t->string('address');
            $t->integer('paid')->default('0'); //0->not paid, 1->paid
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('queries');
    }
}
