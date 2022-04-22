<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Branch;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesDetail>
 */
class SalesDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'branch_id' => Branch::factory(),
            'total_amount' => $this->faker->numberBetween(7000,9000),
            'total_tax_amount' => $this->faker->numberBetween(500,1000),
            'total_number_purchases' => $this->faker->numberBetween(1,5),
            'deposit_amount' => $this->faker->numberBetween(10000,20000),
            'change' => $this->faker->numberBetween(100,500),
            'published_at' => Carbon::now(),
        ];
    }
}
