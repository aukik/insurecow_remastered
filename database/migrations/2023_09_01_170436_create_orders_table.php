<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("amount")->nullable();
            $table->string("status")->nullable();
            $table->string("address")->nullable();
            $table->string("transaction_id")->nullable();
            $table->string("currency")->nullable();

            $table->string("cattle_id")->nullable();
            $table->string("package_id")->nullable();
            $table->string("company_id")->nullable();
            $table->string("user_id")->nullable();

            $table->date("package_expiration_date")->nullable();

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
        Schema::dropIfExists('orders');
    }
}
