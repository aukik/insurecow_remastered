<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceCashRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_cash_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('from_ac')->nullable();
            $table->string('to_ac')->nullable();
            $table->string('to_ac_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('routing_no')->nullable();
            $table->text('instruction')->nullable();
            $table->string('insurance_cost')->nullable();
            $table->string('cattle_sum_insurance')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('transaction_attachment')->nullable();
            $table->string('package_insurance_period')->nullable();

            $table->string('status')->nullable(); // it will be accepted or rejected

            $table->string('cattle_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('company_id')->nullable();
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
        Schema::dropIfExists('insurance_cash_requests');
    }
}
