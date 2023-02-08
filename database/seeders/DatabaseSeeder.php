<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Item;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Role
        Role::factory()->create([
            "role_name" => "user",
        ]);
        Role::factory()->create([
            "role_name" => "admin",
        ]);

        // Seed Gender
        Gender::factory()->create([
            "gender_desc" => "female",
        ]);
        Gender::factory()->create([
            "gender_desc" => "male",
        ]);

        Account::factory(10)->create();
        Item::factory(20)->create();
        Order::factory(15)->create();
    }
}
