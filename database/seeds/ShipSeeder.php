<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ShipSeeder extends Seeder
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
        	DB::table('ships')->insert([
        			'name' => $faker->city,
        			'model' => $faker->city,
        			'reg_no' => $faker->numberBetween (1000000, 9999999),
        			'capacity' => $faker->numberBetween (50, 150),
        			'created_at' => $faker->dateTime,
        		]);
        }
    }
}
