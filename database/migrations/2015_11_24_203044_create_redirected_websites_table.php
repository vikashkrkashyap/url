<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedirectedWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redirected_websites', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->bigInteger('url_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('browser_id')->unsigned();
            $table->integer('os_id')->unsigned();
            $table->string('website_url');
            $table->string('website_name');
            $table->boolean('is_mobile');
            $table->boolean('is_tablet');
            $table->boolean('is_desktop');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('url_id')
                ->references('id')
                ->on('keys')
                ->onDelete('cascade');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');

            $table->foreign('browser_id')
                ->references('id')
                ->on('browsers')
                ->onDelete('cascade');

            $table->foreign('os_id')
                ->references('id')
                ->on('operating_systems')
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
        Schema::drop('redirected_websites');
    }
}
