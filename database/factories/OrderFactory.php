<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $itemID = $this->faker->numberBetween(1, 20);

        return [
            "account_id" => $this->faker->numberBetween(1, 10),
            "item_id" => $itemID,
            "price" => Item::where("id", $itemID)->first()->price,
        ];
    }
}
