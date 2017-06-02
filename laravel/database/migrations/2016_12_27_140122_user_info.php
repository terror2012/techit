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
        Schema::table('users', function(Blueprint $t)
        {
            $t->string('first_name')->nullable();
            $t->string('last_name')->nullable();
            $t->string('phone')->nullable();
            $t->integer('contact')->nullable(); //1->email, 2->phone, 3->text
            $t->string('city')->nullable();
            $t->string('state')->nullable();
            $t->integer('zip')->nullable();
            $t->string('address')->nullable();
            $t->string('ip_address')->nullable();
            $t->string('icon')->default('img/default_avatar.jpg');
            $t->integer('rank')->default('1'); //1->Normal, 2->Mod, 3->Admin
            $t->integer('status')->default('1'); //1->active, 0->banned
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
