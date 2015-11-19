<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,30) as $index) {
        	DB::table('port')->insert([
        			'name' => $faker->city,
        			'country' => $faker->country,
        			'created_at' => $faker->dateTime,
        		]);
        }
    }
}
