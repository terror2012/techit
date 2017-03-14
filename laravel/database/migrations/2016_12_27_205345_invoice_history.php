<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_history', function(Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('email');
            $t->string('phone');
            $t->integer('contact'); //1->email, 2->phone, 3->text
            $t->string('city');
            $t->string('state');
            $t->integer('zip');
            $t->integer('paid'); //Ammount Paid
            $t->string('date');
            $t->string('time');
            $t->integer('status')->default('1'); //1-> processing, 0-> declined, 2->accepted, 3->paid
            $t->string('notes')->nullable();
            $t->string('address');
            $t->longText('message');
            $t->integer('invoice_sent'); //0-> not sent, 1->sent;
            $t->integer('reminders'); //Nr of Reminders
            $t->string('solved_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoice_history');
    }
}
