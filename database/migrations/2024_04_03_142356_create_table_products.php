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
        Schema::create('table_products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name', length: 100);
            $table->text('description');
            $table->decimal('price', total: 10, places: 2);
            $table->integer('stock');
            $table->integer('category_id');
            $table->foreign('category_id')->references('category_id')->on('table_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_products');
    }
};
