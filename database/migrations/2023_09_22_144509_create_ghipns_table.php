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
        Schema::create('ghipns', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('medicine_id',10);
            $table->string('phieunhap_id',10);
            $table->tinyInteger('Soluong');
            // $table->integer('SoloSX');
            // $table->String('DVT', 10);
            $table->float('Gia', 9, 2);

            $table->primary(['medicine_id','phieunhap_id']);

            $table->foreign('medicine_id')->references('ThuocID')->on('medicines');
            $table->foreign('phieunhap_id')->references('PNID')->on('phieunhaps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghipns');
    }
};
