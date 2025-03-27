<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Manicure',
                'description' => 'Basic manicure service',
                'price' => 20.00,
                'duration' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pedicure',
                'description' => 'Basic pedicure service',
                'price' => 25.00,
                'duration' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nail Art',
                'description' => 'Custom nail art designs',
                'price' => 50.00,
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}