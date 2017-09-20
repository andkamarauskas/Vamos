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
        $this->call(UsersTableSeeder::class);
        $this->call(HobbiesTableSeeder::class);
        $this->call(UserHobbyTableSeeder::class);
        $this->call(TripsSeeder::class);
        $this->call(TripsHistoryTableSeeder::class);
        $this->call(PassengersTableSeeder::class);
        $this->call(PassengersTripsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
