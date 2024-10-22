<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->integer('contact');
            $table->string('password');
            $table->string('image');
            $table->integer('pincode');
            $table->timestamps();

        });
        Schema::create('subinventors', function (Blueprint $table) {
            $table->id();
            $table->integer('inventors_id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->integer('contact');
            $table->string('password');
            $table->timestamps();

        });
        Schema::create('role_event', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inventors_id')->unsigned();
            $table->bigInteger('subinventors_id')->unsigned();
            $table->foreign('inventors_id')->references('id')->on('inventors')->onDelete('cascade');
            $table->foreign('subinventors_id')->references('id')->on('subinventors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventors');
        Schema::dropIfExists('subinventors');
        // Schema::dropIfExists('role_event');
    }
}
