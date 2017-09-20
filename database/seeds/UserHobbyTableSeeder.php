<?php

use Illuminate\Database\Seeder;

class UserHobbyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,50) as $index) {
	        DB::table('user_hobby')->insert([
	            'user_id' => $index,
	            'hobby_id' => rand(1, 3),
	        ]);
            DB::table('user_hobby')->insert([
                'user_id' => $index,
                'hobby_id' => rand(4, 5),
            ]);
            DB::table('user_hobby')->insert([
                'user_id' => $index,
                'hobby_id' => rand(6, 8),
            ]);
	    }
    }
}
