<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CruiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
        	DB::table('cruise')->insert([
        			'name' => $faker->city,
        			'origin' => $faker->numberBetween(1, 30),
        			'destination' => $faker->numberBetween (1, 30),
        			'capacity' => $faker->numberBetween (50, 100),
        			'ship' => $faker->numberBetween (1, 10),
        			'created_at' => $faker->dateTime,
        		]);
        }
    }
}
