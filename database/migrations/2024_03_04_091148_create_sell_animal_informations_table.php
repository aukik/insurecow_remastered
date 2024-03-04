<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellAnimalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_animal_informations', function (Blueprint $table) {
            $table->id();
            $table->integer('selling_cost')->nullable();
            $table->integer('selling_percentage')->nullable();
            $table->string('status')->nullable();
            $table->string('cattle_id')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('sell_animal_informations');
    }
}
