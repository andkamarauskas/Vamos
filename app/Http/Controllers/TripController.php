<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\TripHistory;
use App\User;
use App\PassengerTrip;
use App\Passenger;
use Auth;

class TripController extends Controller
{
	public function index(Request $request)
	{


		if(!$request->date){
			$request->date='2017-07-11';
		}
		if(!$request->time){
			$request->time='08:00';
		}

		if ($request->departure_city) {
			$trips = Trip::where('departure_city','=', $request->departure_city)
			->where('arrival_city','=', $request->arrival_city)
			->where('departure_date', '>=', $request->date)
			->orderBy('departure_date','ASC')
			->orderBy('departure_time','ASC')
			->get();
		}else{
			$trips = Trip::orderBy('departure_date','ASC')->orderBy('departure_time','ASC')->limit(40)->get();
		}

		$routesDep = Trip::select('departure_city')->orderBy('departure_city','ASC')->get();
		$routesArr = Trip::select('arrival_city')->orderBy('arrival_city','ASC')->get();
		$departures = [];
		$arrivals = [];

		foreach ($routesDep as $trip)
		{
			array_push($departures, $trip->departure_city);
		}
		foreach ($routesArr as $trip)
		{
			array_push($arrivals, $trip->arrival_city);
		}
		$departures = array_unique($departures);
		$arrivals = array_unique($arrivals);

		return view('trips.index',['trips' => $trips ,'departures'=>$departures,'arrivals' => $arrivals ]);
	}
	public function view(Request $request)
	{
		//randam visus passenger eilutes pagal duota ID
		$trip = Trip::where('id', $request->id)->first();

		$passengers = $trip->passenger;
		$comments = $trip->comment;

		$freeSeats = $trip->seats - count($passengers);

		$myId = Auth::user()->id;
		$iAmPassenger = false;
		$iAmDriver = false;
            //Patikrinam ar vartotojas yra keleiviu sarase
		foreach ($passengers as $passenger) {
			if($myId == $passenger->user->id)
			{
				$iAmPassenger = true;
			}
		}
            //Patikrinam ar as esu vairuotojas
		if($myId == $trip->driver_id)
		{
			$iAmDriver = true;
		}
		$driver = User::find($trip->driver_id);
		$hobbies = $driver->hobbies;

		return view('trips.view',[
			'trip' => $trip,
			'hobbies' => $hobbies,
			'passengers'=>$passengers,
			'freeSeats' =>$freeSeats,
			'iAmPassenger' => $iAmPassenger,
			'iAmDriver' => $iAmDriver
			]);
	}
	public function showTripForm(){
		return view('trips.add');
	}
	public function showTripFormFromPassenger(Request $request)
	{
		$passengerTrip = PassengerTrip::find($request->id);	

		return view('trips.make',['passengerTrip' => $passengerTrip]);
	}

	public function post(Request $request)
	{
		
		$this->validate($request,[
			'departure_city' => 'required',
			'departure_address' => 'required',
			'arrival_city' => 'required',
			'arrival_address' => 'required',
			'departure_date' => 'required',
			'departure_time' => 'required',
			'seats' => 'required',
			'packages' => 'required',
			]
			);

		$trip = new Trip();
		$trip->driver_id = Auth::user()->id;
		$trip->description = $request->description;
		$trip->departure_city = $request->departure_city;
		$trip->departure_address = $request->departure_address;
		$trip->departure_date = $request->departure_date;
		$trip->departure_time = $request->departure_time;
		$trip->arrival_city = $request->arrival_city;
		$trip->arrival_address = $request->arrival_address;
		$trip->seats = $request->seats;
		$trip->packages = $request->packages;
		$trip->save();

		if($request->passenger)
		{
			$passenger = new Passenger();
            $passenger->user_id = $request->passengerId;
            $passenger->trip_id = $trip->id;
            $passenger->save();
		}

		return redirect()->route('trips.my');
	}
	public function edit(Request $request)
	{
		$trip = Trip::find($request->id);
		if($trip)
		{
			if(Auth::user()->id == $trip->driver_id)
			{
				return view('trips.edit',['trip' => $trip]);
			}
		}
	}
	public function update(Request $request)
	{
		$trip = Trip::where('id',$request->id)->first();
		if($trip)
		{	
			if(Auth::user()->id == $trip->driver_id)
			{

				$this->validate($request,[
					'departure_city' => 'required',
					'departure_address' => 'required',
					'arrival_city' => 'required',
					'arrival_address' => 'required',
					'departure_date' => 'required',
					'departure_time' => 'required',
					'seats' => 'required',
					'packages' => 'required',
					]
					);

				$trip->description = $request->description;
				$trip->departure_city = $request->departure_city;
				$trip->departure_address = $request->departure_address;
				$trip->departure_date = $request->departure_date;
				$trip->departure_time = $request->departure_time;
				$trip->arrival_city = $request->arrival_city;
				$trip->arrival_address = $request->arrival_address;
				$trip->seats = $request->seats;
				$trip->packages = $request->packages;
				$trip->save();

			}
		}
		return redirect()->route('trips.view',['id' => $request->id]);
	}
	public function showMyTrips()
	{
		$user = Auth::user();
		$hobbies = $user->hobbies;
		$drives = $user->drives;
		$trips = $user->tripsAsPassenger;


		return view('trips.my',['user' => $user,
			'hobbies' => $hobbies,
			'drives' => $drives,
			'trips' => $trips ]);

	}
	public function delete(Request $request)
	{
		$trip = Trip::find($request->id);
		if($trip)
		{
			$passengers = $trip->passenger;
			$passengers = count($passengers);

			if(Auth::user()->id == $trip->driver_id && $passengers == 0)
			{
				$trip->delete();
			}
			else
			{
				dd($trip);
			}
		}
		return redirect()->route('trips.my');
	}
}
