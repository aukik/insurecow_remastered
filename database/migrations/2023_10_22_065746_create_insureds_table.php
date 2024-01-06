<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insureds', function (Blueprint $table) {
            $table->id();
            $table->string("cattle_id")->nullable();
            $table->string("package_id")->nullable();
            $table->string("company_id")->nullable();
            $table->string("order_id")->nullable();
            $table->string("user_id")->nullable();
            $table->string('insurance_status')->nullable();
            $table->string('insurance_type')->nullable();
            $table->string('insurance_request_id')->nullable();
            $table->string('insurance_requested_company_id')->nullable();
            $table->string('package_expiration_date')->nullable();
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
        Schema::dropIfExists('insureds');
    }
}
