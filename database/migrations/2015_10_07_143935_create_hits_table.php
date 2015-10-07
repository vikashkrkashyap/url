<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('hits',function (Blueprint $table){

           $table->increments('id');
           $table->string('url_id');
           $table->integer('hits')->unsigned();
           $table->foreign('url_id')->references('id')->on('keys')->onDelete('cascade');
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hits');
    }
}
