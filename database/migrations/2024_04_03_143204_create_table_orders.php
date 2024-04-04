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
        Schema::create('table_orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->integer('customer_id');
            $table->date('order_date');
            $table->decimal('total_amount', total: 10, places: 2);
            $table->string('status', length: 50);
            $table->text('shipping_address');
            $table->foreign('customer_id')->references('customer_id')->on('table_customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_orders');
    }
};
