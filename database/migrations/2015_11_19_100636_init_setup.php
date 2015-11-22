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
        Schema::create('ports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('ships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model');
            $table->string('reg_no');
            $table->integer('capacity')->unsigned();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            //$table->string('passwordhash');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

            //TODO: reference a user id from MS
        });

        Schema::create('cabins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cruise_cabin_id');
            $table->integer('capacity')->unsigned();
            $table->integer('ship_id');
            $table->string('location');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->boolean('occupied')->default('false');

            //foreign keys
            $table->foreign('ship_id')->references('ships')->on('id');
            $table->foreign('cruise_cabin_id')->references('cruise_cabin_type')->on('id');
        });

        Schema::create('cruise_cabin_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('price');
            $table->integer('cruise_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

            //foreign keys
            $table->foreign('cruise_id')->references('cruises')->on('id');
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cruise_id');
            $table->integer('cabin_id');
            $table->integer('customer_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

            //foreign keys
            $table->foreign('cruise_id')->references('cruises')->on('id');
            $table->foreign('customer_id')->references('customers')->on('id');
            $table->foreign('cabin_id')->references('cabins')->on('id');
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('passengers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->integer('age');
            $table->integer('sex');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('address_line_3');
            $table->string('state');
            $table->string('country');
            $table->string('occupation');
            $table->integer('reservation_id');
            $table->integer('cabin_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

            //foreign keys
            $table->foreign('reservation_id')->references('reservations')->on('id');
            $table->foreign('cabin_id')->references('cabins')->on('id');
        });

        Schema::create('cruises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('origin');
            $table->integer('destination');
            $table->dateTime('departure');
            $table->dateTime('arrival');
            $table->integer('capacity')->unsigned();
            $table->integer('ship_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

            //foreign keys
            $table->foreign('ship_id')->references('ships')->on('id');
            $table->foreign('origin')->references('ports')->on('id');
            $table->foreign('destination')->references('ports')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('passengers');
        Schema::drop('cruises');
        Schema::drop('reservations');
        Schema::drop('cruise_cabin_type');
        Schema::drop('cabins');
        Schema::drop('ships');
        Schema::drop('customers');
        Schema::drop('invoices');
        Schema::drop('ports');
    }
}
