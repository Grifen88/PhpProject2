<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CabinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,50) as $index) {
        	DB::table('cabins')->insert([
        			'cruise_cabin_id' => $faker->numberBetween(1, 2),
        			'capacity' => $faker->numberBetween (1, 3),
        			'ship_id' => $faker->numberBetween (1, 10),
        			'location' => $faker->buildingNumber,
        			'created_at' => $faker->dateTime,
        	]);
        }


        DB::table('cruise_cabin_type')->insert([
            'type' => "Premium",
            'price' => $faker->numberBetween(100, 500),
            'cruise_id' => 1,
            'created_at' => $faker->dateTime,
        ]);
        DB::table('cruise_cabin_type')->insert([
            'type' => "Economy",
            'price' => $faker->numberBetween(100, 500),
            'cruise_id' => 1,
            'created_at' => $faker->dateTime,
        ]);
        DB::table('cruise_cabin_type')->insert([
            'type' => "Premium",
            'price' => $faker->numberBetween(100, 500),
            'cruise_id' => 2,
            'created_at' => $faker->dateTime,
        ]);
        DB::table('cruise_cabin_type')->insert([
            'type' => "Economy",
            'price' => $faker->numberBetween(100, 500),
            'cruise_id' => 2,
            'created_at' => $faker->dateTime,
        ]);
    }
}
