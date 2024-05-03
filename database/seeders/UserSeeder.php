<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'inkoop',
            'email' => 'inkoop@gmail.com',
            'password' => Hash::make('inkoop123456'),
            'role' => 'Inventory',


        ]);

        User::create([
            'name' => 'finance',
            'email' => 'finance@gmail.com',
            'password' => Hash::make('finance123456'),
            'role' => 'Finance',


        ]);
        User::create([
            'name' => 'sales',
            'email' => 'sales@gmail.com',
            'password' => Hash::make('sales123456'),
            'role' => 'Sales',


        ]);
        User::create([
            'name' => 'maintenance',
            'email' => 'maintenance@gmail.com',
            'password' => Hash::make('maintenance123456'),
            'role' => 'Maintenance',


        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123456'),
            'role' => 'Admin',


        ]);

        User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('customer123456'),
            'role' => 'Customer',
            'company_id' => 1


        ]);

        User::create([
            'name' => 'Messi',
            'email' => 'messi@gmail.com',
            'password' => Hash::make('messi123456'),
            'role' => 'Customer',
            'company_id' => 2


        ]);

        User::create([
            'name' => 'headmaintenance',
            'email' => 'headmaintenance@gmail.com',
            'password' => Hash::make('headmaintenance123456'),
            'role' => 'Headmaintenance',


        ]);
    }
}
