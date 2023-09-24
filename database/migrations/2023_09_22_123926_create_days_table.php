<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('days', function (Blueprint $table) {
            $table->date('Ngay');
            $table->primary('Ngay');
        });
        // tạo thủ tục lưu trữ chèn ngày hàng năm
        DB::unprepared('
            CREATE PROCEDURE InsertYearlyDate()
            BEGIN
                SET @current_year = YEAR(NOW());

                IF (SELECT COUNT(*) FROM days
                    WHERE ngay = CONCAT(@current_year, "-01-01")) = 0 THEN
                    INSERT INTO days (Ngay) VALUES (CONCAT(@current_year, "-01-01"));
                END IF;

                SET @current_date = CONCAT(@current_year, "-01-02");

                WHILE @current_date <= CONCAT(@current_year, "-12-31") DO

                    IF (SELECT COUNT(*) FROM days WHERE ngay = @current_date) = 0 THEN
                        INSERT INTO days (Ngay) VALUES (@current_date);
                    END IF;

                    SET @current_date = DATE_ADD(@current_date, INTERVAL 1 DAY);
                END WHILE;
            END
        ');

    }

    public function down(): void
    {
        Schema::dropIfExists('days');
        DB::unprepared('DROP PROCEDURE IF EXISTS InsertYearlyDate');
    }

};
