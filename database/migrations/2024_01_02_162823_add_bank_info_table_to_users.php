<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankInfoTableToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

//            $table->dropColumn('ac_info');
//            $table->dropColumn('account');
//            $table->dropColumn('bank_name');
//            $table->dropColumn('branch_name');
//            $table->dropColumn('routing_no');
//            $table->dropColumn('instruction');
//            $table->dropColumn('company_plan');
//            $table->dropColumn('company_type');

            $table->string("ac_info")->nullable();
            $table->string("account")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("branch_name")->nullable();
            $table->string("routing_no")->nullable();
            $table->string("instruction")->nullable();
            $table->string("company_type")->nullable();
            $table->string("company_plan")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
//            $table->dropColumn('ac_info');
//            $table->dropColumn('account');
//            $table->dropColumn('bank_name');
//            $table->dropColumn('branch_name');
//            $table->dropColumn('routing_no');
//            $table->dropColumn('instruction');
        });
    }
}
