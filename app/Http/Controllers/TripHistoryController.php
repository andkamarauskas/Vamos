<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\TripHistory;
use Auth;

class TripHistoryController extends Controller
{
	public function arrived(Request $request)
	{
		$trip = Trip::find($request->id);
		$user = Auth::user();
		if($trip)
		{
			if($user->id == $trip->driver_id)
			{

				$trip_history = new TripHistory();
				$trip_history->driver_id = $trip->driver_id;
				$trip_history->description = $trip->description;
				$trip_history->departure_city = $trip->departure_city;
				$trip_history->departure_address = $trip->departure_address;
				$trip_history->departure_date = $trip->departure_date;
				$trip_history->departure_time = $trip->departure_time;
				$trip_history->arrival_city = $trip->arrival_city;
				$trip_history->arrival_address = $trip->arrival_address;
				$trip_history->seats = $trip->seats;
				$trip_history->packages = $trip->packages;
				$trip_history->save();

				$user->trips_made = $user->trips_made + 1;
				$user->save();

				$trip->delete();
			}
		}
		return redirect()->route('trips.my');
	}
}
