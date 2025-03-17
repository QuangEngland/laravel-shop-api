<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 10 categories with random data
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => 'Category ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'image' . $i . '.jpg',
            ]);
        }

    }
}
