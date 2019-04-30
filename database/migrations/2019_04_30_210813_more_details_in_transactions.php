<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoreDetailsInTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('gift_spent')->after('gift_amount')->default(0);
            $table->unsignedBigInteger('received_amount')->after('gift_spent')->default(0);
            $table->unsignedBigInteger('payable_amount')->after('received_amount')->default(0);
            $table->unsignedBigInteger('discount_amount')->after('payable_amount')->default(0);
            $table->unsignedBigInteger('total_amount')->after('discount_amount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn([
                'gift_spent',
                'received_amount',
                'payable_amount',
                'discount_amount',
                'total_amount',
            ]);
        });
    }
}
