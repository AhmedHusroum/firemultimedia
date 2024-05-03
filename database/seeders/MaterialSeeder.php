<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create([

            'name' => 'boormachine',


        ]);

        Material::create([

            'name' => 'hamer',


        ]);

        Material::create([

            'name' => '10 cm moersleutel',


        ]);

        Material::create([

            'name' => '10 mm schroef',


        ]);
    }
}
