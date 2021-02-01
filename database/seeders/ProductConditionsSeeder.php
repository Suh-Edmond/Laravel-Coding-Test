<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ProductConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('product_conditions')->insert([
            'type' => "Excellent"
        ]);
        DB::table('product_conditions')->insert([
            'type' => "Good",
        ]);
        DB::table('product_conditions')->insert([
            'type' => "In Used",
        ]);
        DB::table('product_conditions')->insert([
            'type' => "Robust",
        ]);
        DB::table('product_conditions')->insert([
            'type' => "Weak Product",
        ]);
    }
}
