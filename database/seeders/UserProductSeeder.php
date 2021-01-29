<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class UserProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //constructor
    private $user;
    private $product;
    private $category;
    private $manufacturer;
    public function __construct()
    {
        $this->user = DB::table('users')->count();
        $this->product = DB::table('products')->count();
        $this->category = DB::table('categories')->count();
        $this->manufacturer = DB::table('manufacturers')->count();
    }
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 60; $i++) {
            DB::table('user_products')->insert([
                'price' => $faker->numberBetween(1000, 10000),
                'quatity' => $faker->numberBetween(1, 100),
                'description' => $faker->sentence(30),
                'user_id' => random_int(1, $this->user),
                'category_id' => random_int(1, $this->category),
                'product_id' => random_int(1, $this->product),
                'manufactural_id' => random_int(1, $this->manufacturer)
            ]);
        }
    }
}
