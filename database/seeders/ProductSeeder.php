<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Machine Bit Deluxe',
            'description' => 'beschrijving machine 1',
            'price' => '30',
            'stock' => 8,
            'product_category_id' => 2,
            'image_path' => 'machine-bit-deluxe.png'
        ]);

        Product::create([
            'name' => 'Machine Bit Light',
            'description' => 'beschrijving machine 2',
            'price' => '50',
            'stock' => 10,
            'product_category_id' => 2,
            'image_path' => 'machine-bit-light.png'
        ]);

        Product::create([
            'name' => 'Machine Groot',
            'description' => 'beschrijving machine 3',
            'price' => '100',
            'stock' => 4,
            'product_category_id' => 2,
            'image_path' => 'machine-groot.jpg'
        ]);

        Product::create([

            'name' => 'machine2',
            'description' => 'beschrijving machine 2',
            'price' => '2.50',
            'stock' => 18,
            'product_category_id' => 2

        ]);

        Product::create([

            'name' => 'machine3',
            'description' => 'beschrijving machine 3',
            'price' => '15',
            'stock' => 10,
            'product_category_id' => 2

        ]);

        Product::create([

            'name' => 'machine4',
            'description' => 'beschrijving machine 4',
            'price' => '12',
            'stock' => 11,
            'product_category_id' => 2

        ]);
    }
}