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
        Schema::create('table_purchases', function (Blueprint $table) {
            $table->bigIncrements('purchase_id');
            $table->integer('supplier_id');
            $table->date('purchase_date');
            $table->decimal('total_amount', total: 10, places: 2);
            $table->foreign('supplier_id')->references('supplier_id')->on('table_suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_purchases');
    }
};
