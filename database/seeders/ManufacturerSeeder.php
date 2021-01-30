<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 7; $i++) {
            DB::table('manufacturers')->insert([
                'manufacturer_name' => $faker->company,
                'email' => $faker->companyEmail,
                'telephone' => $faker->phoneNumber,
                'address' => $faker->address
            ]);
        }
    }
}
