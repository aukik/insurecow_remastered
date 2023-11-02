<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedingAndNutritionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeding_and_nutrition', function (Blueprint $table) {
            $table->id();
            $table->date('schedule_date');
            $table->text('feeding_schedule');
            $table->text('nutrition_plans');
            $table->text('feed_consumption_records');
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
        Schema::dropIfExists('feeding_and_nutrition');
    }
}
