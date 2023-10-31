<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_informations', function (Blueprint $table) {
            $table->id();
            $table->enum('health_status', ['Healthy', 'Sick', 'Injured'])->default('Healthy');
            $table->text('medical_history')->nullable();
            $table->date('last_vaccination_date')->nullable();
            $table->boolean('is_pregnant')->default(false);
            $table->string('cattle_id');
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
        Schema::dropIfExists('animal_informations');
    }
}
