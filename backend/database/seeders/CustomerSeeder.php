<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'age' => 25,
                'gender' => 'Nam',
                'address' => 'Hà Nội',
                'appointment' => Carbon::now()->addDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Văn B',
                'age' => 30,
                'gender' => 'Nam',
                'address' => 'Hà Nội',
                'appointment' => Carbon::now()->addDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Văn C',
                'age' => 28,
                'gender' => 'Nam',
                'address' => 'Hà Nội',
                'appointment' => Carbon::now()->addDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
