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
            'NVID' => 'BT000',
            'email' => 'hop@gmail.com',
            'password' => bcrypt('123'),
            'Chucvu' => 'NV',
            'TenNV' => 'Dinh Thai Hop',
            'DiaChi' => 'Cần Thơ',
            'SDT' => '0123456789',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];
        DB::table('staffs')->insert($data);
    }
}
