<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_payments', function (Blueprint $table) {
            $table->id();
            $table->string('donate_id');
            $table->string('user_id');
            $table->string('amount');
            $table->string('dname');
            $table->string('demail');
            $table->string('dphone');
            $table->string('transaction_id');
            $table->string('payment_type');
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
        Schema::dropIfExists('donate_payments');
    }
}
