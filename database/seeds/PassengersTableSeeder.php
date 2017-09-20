<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PassengersTableSeeder extends Seeder
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
	        DB::table('passengers')->insert([
	            'trip_id' => $faker->numberBetween(1,50),
	            'user_id' => rand(2, 10),
	        ]);
	    }
    }
}
