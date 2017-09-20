<?php

namespace App\Http\Controllers;

use App\PassengerTrip;
use App\User;
use Illuminate\Http\Request;
use Auth;

class PassengerTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->date){
            $request->date='2017-07-11';
        }
        if(!$request->time){
            $request->time='08:00';
        }

        if ($request->departure_city) {
            $passengerTrips = PassengerTrip::where('departure_city','=', $request->departure_city)
            ->where('arrival_city','=', $request->arrival_city)
            ->where('departure_date', '>=', $request->date)
            ->orderBy('departure_date','ASC')
            ->orderBy('departure_time_from','ASC')
            ->get();
        }else{
            $passengerTrips = PassengerTrip::orderBy('departure_date','ASC')->orderBy('departure_time_from','ASC')->limit(40)->get();
        }

        $routesDep = PassengerTrip::select('departure_city')->orderBy('departure_city','ASC')->get();
        $routesArr = PassengerTrip::select('arrival_city')->orderBy('arrival_city','ASC')->get();
        $departures = [];
        $arrivals = [];

        foreach ($routesDep as $passengerTrip)
        {
            array_push($departures, $passengerTrip->departure_city);
        }
        foreach ($routesArr as $passengerTrip)
        {
            array_push($arrivals, $passengerTrip->arrival_city);
        }
        $departures = array_unique($departures);
        $arrivals = array_unique($arrivals);

        return view('passengers.index',['passengerTrips' => $passengerTrips ,'departures'=>$departures,'arrivals' => $arrivals ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passengers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'departure_city' => 'required',
            'departure_address' => 'required',
            'arrival_city' => 'required',
            'arrival_address' => 'required',
            'departure_date' => 'required',
            'departure_time_from' => 'required',
            'departure_time_to' => 'required',
            ]
            );

        $passengerTrip = new PassengerTrip();
        $passengerTrip->passenger_id = Auth::user()->id;
        $passengerTrip->description = $request->description;
        $passengerTrip->departure_city = $request->departure_city;
        $passengerTrip->departure_address = $request->departure_address;
        $passengerTrip->departure_date = $request->departure_date;
        $passengerTrip->departure_time_from = $request->departure_time_from;
        $passengerTrip->departure_time_to = $request->departure_time_to;
        $passengerTrip->arrival_city = $request->arrival_city;
        $passengerTrip->arrival_address = $request->arrival_address;
        $passengerTrip->save();

        return redirect()->route('passengers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PassengerTrip  $passengerTrip
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $passengerTrip = PassengerTrip::where('id', $request->id)->first();

        $myId = Auth::user()->id;

        if($myId == $passengerTrip->passenger_id)
        {
            $iAmThisPassenger = true;
        }
        else
        {
            $iAmThisPassenger = false;
        }

        $passenger = User::find($passengerTrip->passenger_id);
        $hobbies = $passenger->hobbies;

        return view('passengers.show',[
            'passengerTrip' => $passengerTrip,
            'hobbies' => $hobbies,
            'iAmThisPassenger' => $iAmThisPassenger
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PassengerTrip  $passengerTrip
     * @return \Illuminate\Http\Response
     */
    public function edit(PassengerTrip $passengerTrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PassengerTrip  $passengerTrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassengerTrip $passengerTrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PassengerTrip  $passengerTrip
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassengerTrip $passengerTrip)
    {
        //
    }
}
