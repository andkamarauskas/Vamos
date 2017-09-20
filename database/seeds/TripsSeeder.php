<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departure = ['Vilnius','Kaunas','Klaipeda'];
        $arrival = ['Druskininkai','Ukmerge','Jovana','Anyksciai','Utena','Moletai', 'Zarasai'];
        $nowd = date('Y-m-d');
        $nowt = date('H:i:s');
        $faker = Faker::create();

         for ($i=0; $i < 50 ; $i++) { 
        	DB::table('trips')->insert([
                'driver_id' => $faker->numberBetween(2,40),
        		'description' => $faker->text($maxNbChars = 200),
                'departure_city' => $departure[array_rand($departure)],
        		'departure_address' => $faker->streetAddress,
                'arrival_city' => $arrival[array_rand($arrival)],
        		'arrival_address' => $faker->streetAddress,
        		'departure_date' => $faker->dateTimeBetween('now', '+1 day'),
        		'departure_time' => $faker->date('H:i'),
        		'seats' => $faker->numberBetween(3,6),
        		'packages' => $faker->numberBetween(1,20),
        	]); 
        }
    }
}

