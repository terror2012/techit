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
            $t->string('phone');
            $t->string('email');
            $t->string('logo');

            //Payment
            $t->string('rate_hour')->default('40');
            $t->integer('initial_payment')->default('15');
            $t->string('days')->default('Mon-Sat');
            $t->string('hours')->default('10AM-3PM');
            $t->integer('email_on_upgrade')->default('1');
            $t->integer('remoteStatus')->default('1');
            //Website mode
            $t->integer('offline_mode')->default('0'); //Sets website to offline.

            //Design
            $t->string('landing_title')->default('test');
            $t->string('landing_desc')->default('test');
            $t->string('about_img')->default('assets/lake.jpg');
            $t->string('about_capt')->default('About Page');
            $t->string('comment_img')->default('assets/contact.jpg');
            $t->string('comment_capt')->default('Comment page');
            $t->string('contact_img')->default('assets/contact.jpg');
            $t->string('contact_capt')->default('Contact page');
            $t->string('howto_img')->default('assets/howTo2.jpg');
            $t->string('howto_capt')->default('How To Page');
            $t->string('myacc_img')->default('assets/myAccount.jpg');
            $t->string('myacc_capt')->default('My Account Page');
            $t->string('schedule_img')->default('assets/schedule3.jpg');
            $t->string('schedule_capt')->default('Schedule Page');
            $t->string('service_img')->default('assets/schedule3.jpg');
            $t->string('service_capt')->default('Service Page');
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
