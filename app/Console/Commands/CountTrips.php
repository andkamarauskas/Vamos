<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TripHistory;
use App\User;

class CountTrips extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:trips';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Counts how many user was made trips';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $key => $user) {
            $tripsCount = TripHistory::where('driver_id',$user->id)->count();
            $user->trips_made = $tripsCount;
            $user->save();
            $this->line($user->name . ' ' . $tripsCount . ' ' . 'saved');
        }
    }
}
