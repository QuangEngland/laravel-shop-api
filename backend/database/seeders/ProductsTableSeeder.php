<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 10 products with random data
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Description ' . $i,
                'price' => rand(100, 1000),
                'stock' => rand(1, 100),
                'category_id' => rand(1, 10),
                'image' => 'image' . $i . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
