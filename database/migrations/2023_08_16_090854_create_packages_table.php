<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->decimal('insurance_period',2,1);

            $table->string('coverage');
//            $table->integer('lowest_amount');
//            $table->integer('highest_amount');
//            $table->integer('total_amount');

            $table->string('quotation');
            $table->string('policy');
            $table->integer('discount');
            $table->integer('rate');
            $table->integer('vat');
            $table->string('package_status')->default('active');
            $table->string('user_id');
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
        Schema::dropIfExists('packages');
    }
}
