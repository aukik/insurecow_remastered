<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReproductionAndBreedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproduction_and_breedings', function (Blueprint $table) {
            $table->id();
            $table->date('breeding_date');
            $table->text('breeding_records');
            $table->text('pregnancy_information');
            $table->text('fertility_history');
            $table->text('cattle_id');
            $table->text('user_id');
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
        Schema::dropIfExists('reproduction_and_breedings');
    }
}
