<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_requests', function (Blueprint $table) {
            $table->id();
            $table->string('cattle_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('company_id')->nullable();
            $table->decimal('package_insurance_period',2,1)->nullable();
//            $table->string('muzzle_image')->nullable();

            $table->string('insurance_cost')->nullable();

            $table->string('insurance_status')->nullable();
            $table->string('insurance_requested_company_id')->nullable();
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
        Schema::dropIfExists('insurance_requests');
    }
}
