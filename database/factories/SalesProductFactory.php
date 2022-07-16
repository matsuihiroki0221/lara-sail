<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;
use App\Models\SalesDetail;
use App\Models\Product;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesProduct>
 */
class SalesProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'store_id' => Store::factory(),
            'sales_detail_id' => SalesDetail::factory(),
            'basic_product_information_id' => Product::factory(),
            'published_at' => Carbon::now(),
            'number_purchases' => $this->faker->numberBetween(1,5),
        ];
    }
}
