<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys',function(Blueprint $table){
            $table->increments('id');
            $table->text('url');
            $table->integer('user_id')->unsigned();
            $table->text('key');
            $table->string('ip',50);
            $table->string('title');
            $table->boolean('is_custom')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('keys');
    }
}
