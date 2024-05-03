<?php

namespace Database\Seeders;

use App\Models\LeaseContractProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaseContractProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeaseContractProduct::create([
            'lease_contract_id' => 1,
            'product_id' => 1,
        ]);

        LeaseContractProduct::create([
            'lease_contract_id' => 1,
            'product_id' => 2,
        ]);

        LeaseContractProduct::create([
            'lease_contract_id' => 1,
            'product_id' => 3,
        ]);

        LeaseContractProduct::create([
            'lease_contract_id' => 1,
            'product_id' => 4,
        ]);
    }
}
