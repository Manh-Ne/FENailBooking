<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Gel Nail Polish',
                'price' => 15.00,
                'quantity' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuticle Oil',
                'price' => 8.50,
                'quantity' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nail File Set',
                'price' => 12.00,
                'quantity' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
