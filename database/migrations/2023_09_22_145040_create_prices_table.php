<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicine_id',10);
            $table->date('ngay_id');
            $table->String('DVT', 10);
            $table->float('Gia', 9, 2);

            $table->foreign('medicine_id')->references('ThuocID')->on('medicines');
            $table->foreign('ngay_id')->references('Ngay')->on('days');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
