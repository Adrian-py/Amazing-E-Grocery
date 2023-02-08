<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "role_id" => $this->faker->numberBetween(1, 2),
            "gender_id" => $this->faker->numberBetween(1, 2),
            "first_name" => $this->faker->word(),
            "last_name" => $this->faker->word(),
            "email" => $this->faker->unique()->safeEmail,
            "display_picture_link" => "",
            "password" => bcrypt("password"),
            "remember_token" => $this->faker->lexify("??????????"),
        ];
    }
}
