<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
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

        $this->call(ProductConditionsSeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(UserProductSeeder::class);
    }
}
