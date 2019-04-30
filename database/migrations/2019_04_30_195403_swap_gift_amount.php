<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SwapGiftAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('gift_amount');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('gift_amount')->after('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('gift_amount');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('gift_amount');
        });
    }
}
