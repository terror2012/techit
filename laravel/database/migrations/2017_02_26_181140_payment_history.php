<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('payment_history', function(Blueprint $t)
     {
        $t->increments('id');
        $t->string('user_id')->default('guest');
        $t->string('query_id_data');
        $t->string('email');
        $t->string('paid_amount');
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
        Schema::drop('payment_history');
    }
}
