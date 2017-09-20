<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hobby;
use App\User;
use Auth;


class HobbyController extends Controller
{
    public function showRegisterHobbyForm()
    {
    	$hobbies = Hobby::all();

    	return view('auth.hobbyRegister',['hobbies' => $hobbies]);
    }
    //sujungiam useri su hobbies
    public function hobbyPost(Request $request)
    {
    	$hobbies_array = $request->hobbies;

    	if($request->new_hobby)
    	{
    		$new_hobbies = $request->new_hobby;
    		$new_hobbies = explode(" ", $new_hobbies);

	    	foreach ($new_hobbies as $key => $new_hobby) {
	    		$existHobby = Hobby::where('name',$new_hobby)->first();
	    		
	    		if($existHobby == null)
	    		{
		    		$hobby = new Hobby();
		    		$hobby->name = $new_hobby;
		    		$hobby->save();
					
					$addedHobby = Hobby::where('name', $new_hobby)->first();
					array_push($hobbies_array, $addedHobby->id);	
	    		}

	    	}
    	}
    	
    	$user = Auth::user();
    	//$request->hobbies yra array, sita magija sudeda i user_hobby lentele hobbies id su user id
    	$user->hobbies()->sync($hobbies_array,false);

    	return view('home');
    }
}
