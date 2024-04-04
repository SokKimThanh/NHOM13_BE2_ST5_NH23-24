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
        Schema::create('table_employees', function (Blueprint $table) {
            $table->bigIncrements('employee_id');
            $table->string('honv', length: 100);
            $table->string('tenlot', length: 100);
            $table->string('tennv', length: 100);
            $table->date('ngsinh');
            $table->string('dchi', length: 100);
            $table->string('phai', length: 100);
            $table->float('luong');
            $table->integer('taikhoan_id');
            $table->string('position', length: 255);
            $table->foreign('taikhoan_id')->references('taikhoan_id')->on('table_tai_khoan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_employees');
    }
};
