<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCashPaymentAttachmentToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurance_requests', function (Blueprint $table) {

//  ----------------------------- Cash -----------------------------

            $table->string('cash_agent_name')->nullable();
            $table->string('cash_agent_branch_name')->nullable();
            $table->string('cash_agent_id')->nullable();
            $table->string('cash_amount')->nullable();
            $table->string('cash_phone')->nullable();

//  ----------------------------- Cash -----------------------------

//  ----------------------------- Cheque -----------------------------

            $table->string('cheque_bank_name')->nullable();
            $table->string('cheque_branch_name')->nullable();
            $table->string('amount')->nullable();

//  ----------------------------- Cheque -----------------------------

//  ----------------------------- Bank -----------------------------

            $table->string('bank_ac_name')->nullable();
            $table->string('bank_ac_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('transaction_number')->nullable();

//  ----------------------------- Bank -----------------------------

//  ----------------------------- Insurance Company Info -----------------------------

            $table->string("insured_to_ac_info")->nullable();
            $table->string("insured_to_account")->nullable();
            $table->string("insured_to_bank_name")->nullable();
            $table->string("insured_to_branch_name")->nullable();
            $table->string("insured_to_routing_no")->nullable();
            $table->string("insured_to_instruction")->nullable();

//  ----------------------------- Insurance Company Info -----------------------------

//  ----------------------------- Attachment -----------------------------

            $table->string('attachment')->nullable();

//  ----------------------------- Attachment -----------------------------

//  ----------------------------- Transaction Type -----------------------------

            $table->string('transaction_type')->nullable();
            $table->string('insurance_request_status')->nullable();

//  ----------------------------- Transaction Type -----------------------------


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance_requests', function (Blueprint $table) {
//            $table->dropColumn('attachment');
//            $table->dropColumn('transaction_type');
        });
    }
}
