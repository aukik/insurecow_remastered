<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('present_address');
            $table->date('dob');
            $table->string('nid');
            $table->string('source_of_income');
            $table->string('bank_account_no');
            $table->string('farmer_address');
            $table->string('thana');
            $table->string('upazilla');
            $table->string('union');
            $table->string('city');
            $table->string('district');
            $table->string('zip_code');
            $table->string('village');
            $table->string('loan_amount');
            $table->string('num_of_livestock');
            $table->string('type_of_livestock');
//            $table->string('sum_insured');
            $table->string('nationality');
            $table->string('image');
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
        Schema::dropIfExists('farmer_profiles');
    }
}
