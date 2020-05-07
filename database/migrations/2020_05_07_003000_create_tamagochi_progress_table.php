<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamagochiProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamagochi_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tamagochi_id'); 
            $table->unsignedBigInteger('tamagochi_score');
            $table->unsignedBigInteger('tamagochi_hungry');
            $table->unsignedBigInteger('tamagochi_learning');
            $table->unsignedBigInteger('tamagochi_sport');
            $table->unsignedBigInteger('tamagochi_relax');
            $table->unsignedBigInteger('tamagochi_purity'); 
            $table->timestamps();
			
            $table->foreign('tamagochi_id')->references('id')->on('tamagochi'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamagochi_progress');
    }
}
