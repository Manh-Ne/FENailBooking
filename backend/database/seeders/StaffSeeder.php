<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staffs')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'age' => 22,
                'gender' => 'Nam',
                'address' => 'Hà Nội',
                'email' => 'a@b.com',
                'position' => 'Nhân viên',
                'phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Văn B',
                'age' => 22,
                'gender' => 'Nam',
                'address' => 'Hà Nội',
                'email' => 'b@b.com',
                'position' => 'Nhân viên',
                'phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
