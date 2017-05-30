<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeilbuisMetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peilbuis_meting', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('peilbuis_id')->index();

            $table->float('nap_hoogte_meetpunt',14,9)->nullable();
            $table->integer('meetdatum')->nullable();
            $table->float('grondwaterstand', 14, 9)->nullable();
            $table->float('nap_hoogte_maaiveld',14,9)->nullable();
            $table->timestamps();
        });

        Schema::table('peilbuis_meting', function($table){
            $table->foreign('peilbuis_id')
                ->references('id')
                ->on('peilbuizen');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peilbuis_meting');
    }
}
