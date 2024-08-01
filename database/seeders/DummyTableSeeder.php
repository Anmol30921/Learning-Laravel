<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DummyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Create a Faker instance

        $records = [];
        for ($i = 0; $i < 15; $i++) {
            $records[] = [
                'name' => $faker->name, // Generate a random name
                'age' => $faker->numberBetween(18, 99), // Generate a random age between 18 and 99
            ];
        }

        DB::table('dummy')->insert($records);
    }
}
