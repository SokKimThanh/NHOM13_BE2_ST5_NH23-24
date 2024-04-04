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
        Schema::create('table_tai_khoan', function (Blueprint $table) {
            $table->bigIncrements('taikhoan_id');
            $table->string('taikhoan_name', length: 50)->nullable(false);
            $table->string('matkhau', length: 100)->nullable(false);
            $table->string('email', length: 100);
            $table->string('full_name', length: 15);
            $table->string('role', length: 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_tai_khoan');
    }
};
