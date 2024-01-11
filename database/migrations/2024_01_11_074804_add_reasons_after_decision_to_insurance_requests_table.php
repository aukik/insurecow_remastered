<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonsAfterDecisionToInsuranceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurance_requests', function (Blueprint $table) {

            //  ----------------------------- Insurance request type and reason after decision -----------------------------

            $table->string('insurance_request_type')->nullable();
            $table->text('reason_after_decision')->nullable();

            //  ----------------------------- Insurance request type and reason after decision -----------------------------
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
//            $table->dropColumn('insurance_request_type');
//            $table->dropColumn('reason_after_decision');
        });
    }
}
