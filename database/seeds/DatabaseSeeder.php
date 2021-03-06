<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PortSeeder::class);
        $this->call(ShipSeeder::class);
        $this->call(CruiseSeeder::class);
        $this->call(CabinSeeder::class);
        
        Model::reguard();
    }
}
