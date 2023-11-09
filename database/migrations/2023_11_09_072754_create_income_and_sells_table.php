<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeAndSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_and_sells', function (Blueprint $table) {
            $table->id();
            $table->date('record_date');
            $table->text('description');
            $table->decimal('amount', 10, 2);
            $table->string('type'); // 'income' or 'sales'
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
        Schema::dropIfExists('income_and_sells');
    }
}
