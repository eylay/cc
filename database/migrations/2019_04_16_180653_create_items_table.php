<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
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
        Schema::dropIfExists('items');
    }
}
