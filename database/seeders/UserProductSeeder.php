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

    public function __construct()
    {
        $this->user = DB::table('users')->count();
        $this->product = DB::table('products')->count();
    }
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 60; $i++) {
            DB::table('user_products')->insert([
                'user_id' => random_int(1, $this->user),
                'product_id' => random_int(1, $this->product),
            ]);
        }
    }
}
