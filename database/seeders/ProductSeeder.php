<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $condition;
    public function __construct()
    {
        $this->condition = DB::table('product_conditions')->count();
    }
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('products')->insert([
                'product_name' => $faker->colorName,
                'price' => $faker->numberBetween(10000, 500000),
                'quantity' => $faker->numberBetween(200, 500),
                'description' => $faker->sentence(25),
                'discount' => $faker->boolean(),
                'in_stocked' => $faker->boolean(),
                'published' => $faker->boolean(),
                'product_condition_id' => random_int(1, $this->condition)
            ]);
        }
    }
}
