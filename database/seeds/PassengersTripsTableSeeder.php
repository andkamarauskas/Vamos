<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PassengersTripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$departure = ['Vilnius','Kaunas','Klaipeda'];
    	$arrival = ['Druskininkai','Ukmerge','Jovana','Anyksciai','Utena','Moletai', 'Zarasai'];
        $time_from = ['06:00','06:30','07:00','07:30','08:00','08:30','09:00','09:30','10:00', '10:30','11:00','11:30'];
        $time_to = ['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30'];

    	$faker = Faker::create();

    	for ($i=0; $i < 50 ; $i++) { 
    		DB::table('passengers_trips')->insert([
    			'passenger_id' => $faker->numberBetween(1,40),
    			'description' => $faker->text($maxNbChars = 200),
    			'departure_city' => $departure[array_rand($departure)],
    			'departure_address' => $faker->streetAddress,
    			'arrival_city' => $arrival[array_rand($arrival)],
    			'arrival_address' => $faker->streetAddress,
    			'departure_date' => $faker->dateTimeBetween('now', '+5 day'),
    			'departure_time_from' => $time_from[array_rand($time_from)],
    			'departure_time_to' => $time_from[array_rand($time_to)],
    			]); 
    	}
    }
}
