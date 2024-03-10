<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditFreedomRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freedom_requests', function (Blueprint $table) {
            $table->string("result")->nullable();
            $table->string("alternative_reason")->nullable();
            $table->string("alternative_sum")->nullable();
            $table->string("redirect_url")->nullable();
            $table->string("interest_rate")->nullable();
            $table->string("effective_rate")->nullable();
            $table->string("monthly_payment")->nullable();
            $table->boolean("is_phone_verified")->nullable();
            $table->string("status")->nullable();
            $table->string("credit_contract")->nullable();
            $table->string("issue_iin")->nullable();
            $table->string("issue_mobile_phone")->nullable();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("middle_name")->nullable();
            $table->string("reference_id")->nullable();
            $table->boolean("with_card")->nullable();
            $table->integer("status_code")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freedom_requests', function (Blueprint $table) {
            //
        });
    }
}
