<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamagochiItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamagochi_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tamagochi_id');
            $table->unsignedBigInteger('apples');
            $table->unsignedBigInteger('books');
            $table->unsignedBigInteger('dumbbell');
            $table->unsignedBigInteger('playstation');
            $table->unsignedBigInteger('super_apples');
            $table->unsignedBigInteger('super_books');
            $table->unsignedBigInteger('super_dumbbell');
            $table->unsignedBigInteger('super_playstation'); 
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
        Schema::dropIfExists('tamagochi_items');
    }
}
