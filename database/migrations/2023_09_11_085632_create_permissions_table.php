<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->boolean("f_cattle_reg")->default(true);
            $table->boolean("f_insurance")->default(false);
            $table->boolean("f_farm_management")->default(false);
            $table->boolean("c_dashboard")->default(true);
            $table->boolean("c_register_agent")->default(false);
            $table->boolean("c_insurance")->default(false);
            $table->string("role")->nullable();
            $table->string("user_id")->unique();
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
        Schema::dropIfExists('permissions');
    }
}
