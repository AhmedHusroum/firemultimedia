<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([

            'name' => 'gereedschap',

        ]);

        Category::create([

            'name' => 'machines',

        ]);

        Category::create([

            'name' => 'overig',

        ]);
    }
}
