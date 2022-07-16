<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'login_id' => Str::random(8),
            'name' => $this->faker->name(),
            'password' =>  Str::random(8),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
