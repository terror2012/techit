<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function(Blueprint $t){
           $t->increments('id');
           $t->string('first_name')->nullable();
           $t->string('last_name')->nullable();
           $t->string('email')->nullable();
           $t->string('phone')->nullable();
           $t->integer('contact')->nullable(); //1->email, 2->phone, 3->text
           $t->string('city')->nullable();
           $t->string('state')->nullable();
           $t->integer('zip')->nullable();
           $t->string('address')->nullable();
           $t->string('ip_address')->nullable();
           $t->string('icon')->default('img/default_avatar.jpg');
        });
        Schema::table('users', function(Blueprint $t)
        {
           $t->integer('rank')->default('1'); //1->normal, 2->moderator, 3->administrator
           $t->integer('status')->default('1'); //1-> active, 0->banned
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_info');
    }
}
