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
            'NVID' => 'A0000',
            'email' => 'hop@gmail.com',
            'password' => bcrypt('123'),
            'Chucvu' => 'Admin',
            'TenNV' => 'Dinh Thai Hop',
            'DiaChi' => 'Ninh Kiều-Cần Thơ',
            'SDT' => '0123456789',
            'role_id' => 1,
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];
        DB::table('staffs')->insert($data);
    }
}
