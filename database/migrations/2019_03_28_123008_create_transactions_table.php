<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->default(0);
            $table->string('service')->nullable();
            $table->unsignedInteger('count');
            $table->unsignedBigInteger('first_amount');
            $table->unsignedBigInteger('cash_discount');
            $table->unsignedBigInteger('cash_discount_with_count');
            $table->unsignedBigInteger('club_discount');
            $table->unsignedBigInteger('payable_amount');
            $table->unsignedBigInteger('gift_amount');
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
        Schema::dropIfExists('transactions');
    }
}
