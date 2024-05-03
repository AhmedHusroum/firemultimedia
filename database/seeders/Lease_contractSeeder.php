<?php

namespace Database\Seeders;

use App\Models\LeaseContract;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Lease_contractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeaseContract::create([

            'name' => 'order1',
            'description' => 'in dit contract gaat het over het leasen van koffiemachine 1',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'type' => 'maandelijks',
            'is_signed' => false,
            'customer_id' => 6,
        ]);
    }
}
