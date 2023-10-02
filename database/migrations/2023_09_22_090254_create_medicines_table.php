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
        Schema::create('medicines', function (Blueprint $table) {
            $table->string('ThuocID',10);
            $table->string('Tenthuoc', 30);
            $table->date('NSX');
            $table->date('HSD');
            $table->string('TPhoatchat');
            $table->string('Dieutri');
            $table->string('HDSD');
            $table->string('Chongchidinh');
            $table->string('DVT', 30);
            $table->string('druggr_id',10);
            $table->string('supplier_id',10);
            $table->string('producer_id',10);

            $table->primary('ThuocID');

            $table->foreign('druggr_id')->references('NhomthuocID')->on('druggrs');
            $table->foreign('supplier_id')->references('NCCID')->on('suppliers');
            $table->foreign('producer_id')->references('NSXID')->on('producers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
