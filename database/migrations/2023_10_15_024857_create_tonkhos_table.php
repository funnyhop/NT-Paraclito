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
        Schema::create('tonkhos', function (Blueprint $table) {
            $table->string('medicine_id', 10);
            $table->string('warehouse_id', 10);
            $table->integer('Soluong');
            $table->primary(['medicine_id','warehouse_id']);

            $table->foreign('medicine_id')->references('ThuocID')->on('medicines');
            $table->foreign('warehouse_id')->references('KhoID')->on('warehouses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tonkhos');
    }
};
