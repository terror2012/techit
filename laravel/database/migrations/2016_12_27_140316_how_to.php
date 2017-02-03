<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HowTo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_to', function(Blueprint $t) {
           $t->increments('id');
           $t->string('title');
           $t->string('author');
           $t->string('youtube_url');
           $t->string('thumbnail')->nullable();
           $t->longText('fulltext')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('how_to');
    }
}
