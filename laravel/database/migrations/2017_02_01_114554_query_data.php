<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QueryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('query_data', function(Blueprint $t){
            $t->increments('id');
            $t->string('user_id');
            $t->string('query_id')->nullable();
            $t->string('invoice_id')->nullable();
            $t->string('invoice_archieve_id')->nullable();
            $t->string('ammount_to_pay')->nullable();
            $t->string('date');
            $t->string('time');
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
        Schema::drop('query_data');
    }
}
