<?php

namespace Database\Seeders;

use Datetime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'NVID' => 'BT001',
            'email' => 'chau@gmail.com',
            'password' => bcrypt('123'),
            'Chucvu' => 'NV',
            'TenNV' => 'Nguyễn Nam Châu',
            'DiaChi' => 'Cần Thơ',
            'SDT' => '0123456789',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];
        DB::table('staffs')->insert($data);
    }
}
