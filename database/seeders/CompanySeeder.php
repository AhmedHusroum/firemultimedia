<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
                'company_name' => 'Tech_ict',
                'street' => 'venomstreet',
                'house_number' => 48,
                'zipcode' => '6536EY',
                'city' => 'new-york',
                'phonenumber' => '061376473',
                'contact_id' => '123',
                'bkr_checked' => true,
                'bkr_checked_at' => now(),
        ]);

        Company::create([
            'company_name' => 'QUE MIRAS BOBO',
            'street' => 'inter miami street',
            'house_number' => 18,
            'zipcode' => '7633DF',
            'city' => 'Amsterdam',
            'phonenumber' => '0646733241',
            'contact_id' => '144',
            'bkr_checked' => true,
            'bkr_checked_at' => now(),
    ]);

        Company::create([
                'company_name' => 'school123',
                'street' => 'lackbockstreet',
                'house_number' => 22,
                'zipcode' => '65444YY',
                'city' => 'new-jersey',
                'phonenumber' => '061452473',
                'contact_id' => '123',
                'bkr_checked' => true,
                'bkr_checked_at' => now(),
        ]);

       
    }
}
