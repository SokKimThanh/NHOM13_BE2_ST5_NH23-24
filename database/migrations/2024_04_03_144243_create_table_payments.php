<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->integer('order_id');
            $table->date('payment_date');
            $table->decimal('amount', total: 10, places: 2);
            $table->string('payment_method', length: 50);
            $table->foreign('order_id')->references('order_id')->on('table_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_payments');
    }
};
