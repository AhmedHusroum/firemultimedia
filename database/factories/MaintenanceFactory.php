<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Maintenance;

class MaintenanceFactory extends Factory
{
    protected $model = Maintenance::class;

    public function definition()
    {
        return [
            'remark' => $this->faker->sentence,
            'date_added' => now(),
            'maintenance_type' => $this->faker->randomElement(['storingsaanvragen', 'routinematige_bezoeken']),
            'assigned' => $this->faker->numberBetween(1, 10),
            'company_id' => 1,
            'product_category_id' => 1,
           
        ];
    }
}
