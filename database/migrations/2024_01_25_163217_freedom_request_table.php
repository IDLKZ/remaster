<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FreedomRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freedom_requests', function (Blueprint $table) {
            $table->id();
            $table->text('iin')->nullable();
            $table->text('mobile_phone')->nullable();
            $table->text('verification_sms_code')->nullable();
            $table->text('email')->nullable();
            $table->text('product')->nullable();
            $table->text('period')->nullable();
            $table->text('principal')->nullable();
            $table->text('uuid')->nullable();
            $table->boolean("is_success")->default(false);
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
        Schema::dropIfExists('freedom_requests');
    }
}
