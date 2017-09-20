<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home','TripController@index')->name('trips.index');
Route::get('/','TripController@index')->name('trips.index');
Route::get('/trips','TripController@index')->name('trips.index');

Route::get('/passengers','PassengerTripController@index')->name('passengers.index');

Route::get('/register/hobby', 'HobbyController@showRegisterHobbyForm')->name('register.hobby');
Route::post('/register/hobby/post', 'HobbyController@hobbyPost')->name('hobby.post');

Route::group(['middleware' => ['auth']], function() {
	Route::prefix('trips')->group(function(){

	Route::get('/view/{id}','TripController@view')->name('trips.view');
	Route::get('/add','TripController@showTripForm')->name('trips.add');	
	Route::post('/post','TripController@post')->name('trips.post');
	Route::get('/edit/{id}','TripController@edit')->name('trips.edit');
	Route::post('/update','TripController@update')->name('trips.update');
	Route::get('/delete/{id}', 'TripController@delete')->name('trips.delete');
	Route::get('/my','TripController@showMyTrips')->name('trips.my');
	// create trip from passengers posts
	Route::get('/make/{id}','TripController@showTripFormFromPassenger')->name('trips.make');

	Route::get('/arrived/{id}','TripHistoryController@arrived')->name('trips.arrived');
	});



	Route::get('/passenger/sit/{trip_id}', 'PassengerController@sit')->name('passenger.sit');
	Route::get('/passenger/out/{trip_id}','PassengerController@out')->name('passenger.out');

	Route::get('/passengers/create','PassengerTripController@create')->name('passengers.create');
	Route::post('/passengers/store','PassengerTripController@store')->name('passengers.store');
	Route::get('/passengers/show/{id}','PassengerTripController@show')->name('passengers.show');

	Route::get('/users/show/{id}','UserController@show')->name('user.show');

	Route::post('/review/post','ReviewController@store')->name('review.store');
	Route::get('/review/delete/{id}','ReviewController@destroy')->name('review.destroy');
});
