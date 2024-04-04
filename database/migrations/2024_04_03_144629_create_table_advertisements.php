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
        Schema::create('table_advertisements', function (Blueprint $table) {
            $table->bigIncrements('ad_id');
            $table->string('ad_name', length: 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('budget', total: 10, places: 2);
            $table->string('ad_type', length: 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_advertisements');
    }
};
