<?php

use Illuminate\Database\Seeder;

class HobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$hobbies = [
    		'Bikes',
    		'Motorcycles',
    		'Basketball',
    		'Football',
    		'Books',
    		'Woodworking',
    		'Programming',
    		'Camping'
    		];

    	foreach ($hobbies as $hobby) {
    		DB::table('hobbies')->insert([
    			'name'=>$hobby
    			]);
    	}
    }
}
