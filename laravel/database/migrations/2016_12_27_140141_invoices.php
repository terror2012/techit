<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function(Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('email');
            $t->string('phone');
            $t->longText('message');
            $t->integer('contact'); //1->email, 2->phone, 3->text
            $t->string('city');
            $t->string('state');
            $t->integer('zip');
            $t->string('address');
            $t->integer('paid'); //Ammount Paid
            $t->string('amount');
            $t->timestamps();
            $t->integer('status')->default('1'); //1-> processing, 0-> declined, 2->accepted
            $t->integer('invoice_sent'); //0-> not sent, 1->sent;
            $t->integer('reminders'); //Nr of Reminders
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
