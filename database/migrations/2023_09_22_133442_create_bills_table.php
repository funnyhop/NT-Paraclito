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
        Schema::create('bills', function (Blueprint $table) {
            $table->String('HDID', 10);
            $table->String('DoituongSD', 50);
            $table->float('Tongtien', 9, 2);
            $table->string('staff_id',10);
            $table->string('prescription_id',10)->nullable();
            $table->string('customer_id',10);

            $table->primary('HDID');

            $table->foreign('staff_id')->references('NVID')->on('staffs');
            $table->foreign('prescription_id')->references('ToaID')->on('prescriptions');
            $table->foreign('customer_id')->references('KHID')->on('customers');
            $table->timestamps();//ngay lap (thay bang cot created_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
