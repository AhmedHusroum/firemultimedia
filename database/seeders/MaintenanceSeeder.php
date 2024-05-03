<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maintenance;
use Carbon\Carbon;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Maintenance::factory(5)->create([
            'title' => 'Afspraak',
            'start_date' => Carbon::now(), // of een andere geschikte datum/tijd
            'end_date' => Carbon::now(),
        ]);
    }
}
