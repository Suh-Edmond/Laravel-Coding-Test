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
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'name' => $faker->mimeType,
                'price' => $faker->numberBetween(10000, 500000)
            ]);
        }
    }
}
