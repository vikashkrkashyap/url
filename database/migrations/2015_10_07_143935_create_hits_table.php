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

           $table->bigIncrements('id');
           $table->string('url_ip');
           $table->bigInteger('url_id')->unsigned();
           $table->timestamps();

           $table->foreign('url_id')
               ->references('id')
               ->on('keys')
               ->onDelete('cascade');

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
