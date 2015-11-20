<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->timestamp('created_at');
        });

        Schema::create('ship', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model');
            $table->string('reg_no');
            $table->integer('capacity')->unsigned();
            $table->timestamp('created_at');
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            //$table->string('passwordhash');

            //TODO: reference a user id from MS
        });

        Schema::create('class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ship_cabin_id');
            $table->integer('capacity')->unsigned();
            $table->integer('ship_id');
            $table->string('location');
            $table->timestamp('created_at');

            //foreign keys
            $table->foreign('ship_id')->references('ship')->on('id');
            $table->foreign('ship_cabin_id')->references('ship_cabin')->on('id');
        });

        Schema::create('cabin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ship_cabin_id');
            $table->integer('capacity')->unsigned();
            $table->integer('ship_id');
            $table->string('location');
            $table->timestamp('created_at');

            //foreign keys
            $table->foreign('ship_id')->references('ship')->on('id');
            $table->foreign('ship_cabin_id')->references('ship_cabin')->on('id');
        });

        Schema::create('ship_cabin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->integer('price');
            $table->integer('ship_id');
            $table->timestamp('created_at');

            //foreign keys
            $table->foreign('ship_id')->references('ship')->on('id');
        });

        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cruise_id');
            $table->integer('cabin_id');
            $table->integer('customer_id');
            $table->timestamp('created_at');

            //foreign keys
            $table->foreign('cruise_id')->references('cruise')->on('id');
            $table->foreign('customer_id')->references('customer')->on('id');
            $table->foreign('cabin_id')->references('cabin')->on('id');
        });

        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
        });

        Schema::create('passenger', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->integer('age');
            $table->integer('sex');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('address_line_3');
            $table->string('country');
            $table->string('occupation');
            $table->integer('reservation_id');
            $table->integer('cabin_id');
            $table->timestamp('created_at');

            //foreign keys
            $table->foreign('reservation_id')->references('reservation')->on('id');
            $table->foreign('cabin_id')->references('cabin')->on('id');
        });

        Schema::create('cruise', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('origin');
            $table->integer('destination');
            $table->integer('capacity')->unsigned();
            $table->integer('ship_id');
            $table->timestamp('created_at');

            //foreign keys
            $table->foreign('ship_id')->references('ship')->on('id');
            $table->foreign('origin')->references('port')->on('id');
            $table->foreign('destination')->references('port')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('passenger');
        Schema::drop('cruise');
        Schema::drop('reservation');
        Schema::drop('ship_cabin');
        Schema::drop('cabin');
        Schema::drop('ship');
        Schema::drop('customer');
        Schema::drop('invoice');
        Schema::drop('port');
    }
}
