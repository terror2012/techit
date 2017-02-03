<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $t) {
            $t->increments('id');
            $t->string('Title');
            $t->string('Description');
            $t->string('phone');
            $t->string('email');
            $t->string('logo');

            //Payment
            $t->string('rate_hour')->default('40');
            $t->integer('initial_payment')->default('15');
            $t->string('days')->default('Mon-Sat');
            $t->string('hours')->default('10AM-3PM');
            $t->integer('email_on_upgrade')->default('1');
            //Website mode
            $t->integer('offline_mode')->default('0'); //Sets website to offline.

            //Design
            $t->string('landing_title');
            $t->string('landing_desc');
            $t->string('about_img');
            $t->string('about_capt');
            $t->string('comment_img');
            $t->string('comment_capt');
            $t->string('contact_img');
            $t->string('contact_capt');
            $t->string('howto_img');
            $t->string('howto_capt');
            $t->string('myacc_img');
            $t->string('myacc_capt');
            $t->string('schedule_img');
            $t->string('schedule_capt');
            $t->string('service_img');
            $t->string('service_capt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('general_settings');
    }
}
