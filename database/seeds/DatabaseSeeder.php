<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        $this->call([
			        CountryTableSeeder::class,
			        StateTableSeeder::class,
			        CityTableSeeder::class,
			        MunicipalityTableSeeder::class,
			        OtherTableSeeder::class,
			        TownshipTableSeeder::class,
			        PersonTableSeeder::class,
			    ]);
    }
}
