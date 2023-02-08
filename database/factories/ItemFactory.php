<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $item_name = $this->faker->unique()->lexify("Vegetable-???");
        $item_slug = Str::slug($item_name);

        return [
            "item_name" => $item_name,
            "item_slug" => $item_slug,
            "item_desc" => $this->faker->text(300),
            "price" => $this->faker->numberBetween(5000, 25000),
        ];
    }
}
