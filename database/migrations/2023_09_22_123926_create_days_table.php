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

                -- Kiểm tra xem ngày 01-01 của năm hiện tại đã tồn tại trong bảng "days" chưa
                IF (SELECT COUNT(*) FROM days WHERE ngay = CONCAT(@current_year, "-01-01")) = 0 THEN
                    -- Nếu chưa tồn tại, thì thêm ngày 01-01 vào bảng "days"
                    INSERT INTO days (Ngay) VALUES (CONCAT(@current_year, "-01-01"));
                END IF;

                -- Sau khi kiểm tra và thêm ngày 01-01, thực hiện thêm các ngày khác trong năm
                SET @current_date = CONCAT(@current_year, "-01-02"); -- Bắt đầu từ ngày 02-01 của năm

                WHILE @current_date <= CONCAT(@current_year, "-12-31") DO
                    -- Kiểm tra xem ngày đã tồn tại trong bảng "days" chưa
                    IF (SELECT COUNT(*) FROM days WHERE ngay = @current_date) = 0 THEN
                        -- Nếu chưa tồn tại, thì thêm ngày này vào bảng "days"
                        INSERT INTO days (Ngay) VALUES (@current_date);
                    END IF;

                    -- Tăng ngày lên 1
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
