<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;
use Auth;
class PassengerController extends Controller
{
    public function sit(Request $request){
    	// /dd($request->user_id);
            $passenger = new Passenger();
            $passenger->user_id = Auth::user()->id;
            $passenger->trip_id = $request->trip_id;
            $passenger->save();

            return redirect()->route('trips.my');
        }
    public function out(Request $request)
    {
    	$request->user_id = Auth::user()->id;
    	
    	$passenger = Passenger::where('user_id','=', $request->user_id)
            					->where('trip_id','=', $request->trip_id);
   
        if ($passenger) {
            $passenger->delete();
        }
 	  	return redirect()->route('trips.my');   	
    }
}
