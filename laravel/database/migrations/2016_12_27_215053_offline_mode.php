<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfflineMode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offline_mode', function (Blueprint $t) {
           $t->increments('id');
           $t->string('reason');
           $t->integer('mode'); //0-> Off, 1-> Busy, 2-> Holiday, 3-> Under Construction
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offline_mode');
    }
}
