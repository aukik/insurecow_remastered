<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCattleRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cattle_registrations', function (Blueprint $table) {
            $table->id();
            $table->string("nid_front");
            $table->string("nid_back");
            $table->string("chairman_certificate");

            $table->string("cattle_name");
            $table->string("cattle_breed");
            $table->string("age");
            $table->string("cattle_color");
            $table->string("weight");
            $table->string("cattle_type");

            $table->string("muzzle_of_cow");
            $table->string("left_side");
            $table->string("right_side");
            $table->string("special_marks");
            $table->string("cow_with_owner");

            $table->string("sum_insured");
//            $table->string("current_price");

            $table->string('unique_id');
            $table->string('user_id');

            $table->string("loan_investment");  //file
            $table->string("bank_name_insured");
            $table->string("bank_account_no");

            $table->string('insured_by')->default(0);
            $table->string('insurance_status')->default(0);
            $table->date('insurance_date')->nullable();
            $table->string('insurance_expire_date')->nullable();

            $table->string('is_claimed')->default(0);

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
        Schema::dropIfExists('cattle_registrations');
    }
}
