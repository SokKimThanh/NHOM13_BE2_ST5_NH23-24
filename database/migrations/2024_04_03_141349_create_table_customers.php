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
        Schema::create('table_customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name', length: 100);
            $table->string('customer_email', length: 100);
            $table->string('customer_phone', length: 15);
            $table->integer('taikhoan_id');
            $table->foreign('taikhoan_id')->references('id')->on('table_tai_khoan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_customers');
    }
};
