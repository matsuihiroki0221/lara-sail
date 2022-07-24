<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'login_id' => Str::random(8),
            'name' => $this->faker->name(),
            'password' =>  Hash::make('password'),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
