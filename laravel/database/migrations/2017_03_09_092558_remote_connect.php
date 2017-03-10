<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoteConnect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remote', function(Blueprint $r)
        {
            $r->increments('id');
            $r->string('firstName');
            $r->string('lastName');
            $r->string('email');
            $r->string('phone');
            $r->string('skype')->nullable();
            $r->string('paid')->default('0');
            $r->integer('isRegistered')->default('0');
            $r->string('user_id')->nullable();
            $r->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('remote');
    }
}
