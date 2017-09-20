<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$faker = Faker::create();
    	foreach (range(1,100) as $index) {
    		DB::table('reviews')->insert([
    			'user_id' => rand(1, 50),
    			'respondent_id' => rand(1,50),
    			'review' => $faker->text($maxNbChars = 200),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			]);
    	}
    }
}
