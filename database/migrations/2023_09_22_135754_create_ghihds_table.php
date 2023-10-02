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
        Schema::create('ghihds', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('medicine_id',10);
            $table->string('bill_id',10);
            $table->tinyInteger('Soluong');
            // $table->String('DVT', 10);
            // $table->float('Gia', 9, 2);

            $table->primary(['medicine_id','bill_id']);

            $table->foreign('medicine_id')->references('ThuocID')->on('medicines');
            $table->foreign('bill_id')->references('HDID')->on('bills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghihds');
    }
};
