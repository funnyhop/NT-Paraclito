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
        Schema::create('phieunhaps', function (Blueprint $table) {
            $table->String('PNID', 10);
            $table->String('Lothuoc', 10);
            $table->string('staff_id',10);
            $table->string('warehouse_id',10);

            $table->primary('PNID');

            $table->foreign('staff_id')->references('NVID')->on('staffs');
            $table->foreign('warehouse_id')->references('KhoID')->on('warehouses');

            $table->timestamps();//ngay lap (thay bang cot created_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieunhaps');
    }
};
