<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetingAndForecastingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgeting_and_forecastings', function (Blueprint $table) {
            $table->id();
            $table->string('budget_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_income', 10, 2);
            $table->decimal('total_expenses', 10, 2);
            $table->decimal('net_profit', 10, 2);
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
        Schema::dropIfExists('budgeting_and_forecastings');
    }
}
