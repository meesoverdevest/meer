<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeilbuizenTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peilbuizen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('peilbuiscode')->unique();
            $table->string('straat')->nullable();
            $table->string('huisnummer')->nullable();
            $table->float('longitude', 15, 12)->nullable();
            $table->float('latitude', 15, 12)->nullable();
            
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
        Schema::dropIfExists('peilbuizen');
    }
}
