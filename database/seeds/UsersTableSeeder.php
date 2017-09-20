<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=> 'Andrius',
        	'surname'=> 'Kamarauskas',
        	'phone'=> '37064103803',
        	'city'=> 'Vilnius',
        	'car'=> 'Mercedes-Benz',
        	'car_year'=> 2017,
        	'email'=> 'andkamarauskas@gmail.com',
        	'password'=> bcrypt('inzinierius'),
            'status' => 'admin',
        	'rating' => 8.8
        ]);

        $faker = Faker::create();
    	foreach (range(1,50) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->firstNameMale,
	            'surname' => $faker->lastName,
	            'phone' => rand(37061546100,37069546100),
	            'city' => $faker->city,
	            'car' => $faker->company,
	            'car_year' => rand(1980,2017),
	            'email' => $faker->email,
	            'password' => bcrypt('inzinierius'),
	            'rating' => rand(55, 99) / 10,
	        ]);
	    }
    }
}
