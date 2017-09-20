@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Create New Trip</strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('trips.post') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('departure_city') ? ' has-error' : '' }}">
                            <label for="departure_city" class="col-md-4 control-label">
                                Departure City
                                &nbsp;
                                <i class="fa fa-plane" aria-hidden="true"></i>
                            </label>
                            <div class="col-md-6">
                                <input id="departure_city" readonly type="text" class="form-control" name="departure_city" value="{{ $passengerTrip->departure_city }}" required autofocus >

                                @if ($errors->has('departure_city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departure_city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('departure_address') ? ' has-error' : '' }}">
                            <label for="departure_address" class="col-md-4 control-label">
                                Departure Point
                                &nbsp;
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="departure_address" type="text" class="form-control" name="departure_address" value="{{ $passengerTrip->departure_address }}" required autofocus >

                                @if ($errors->has('departure_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departure_address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('arrival_city') ? ' has-error' : '' }}">
                            <label for="arrival_city" class="col-md-4 control-label">
                                Arrivall city
                                &nbsp;
                                <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="arrival_city" readonly type="text" class="form-control" name="arrival_city" value="{{ $passengerTrip->arrival_city }}" required autofocus >

                                @if ($errors->has('arrival_city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('arrival_city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('arrival_address') ? ' has-error' : '' }}">
                            <label for="arrival_address" class="col-md-4 control-label">
                                Arrival Point
                                &nbsp;
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="arrival_address" type="text" class="form-control" name="arrival_address" value="{{ $passengerTrip->arrival_address }}" required autofocus >

                                @if ($errors->has('arrival_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('arrival_address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('departure_date') ? ' has-error' : '' }}">
                            <label for="departure_date" class="col-md-4 control-label">
                                Date
                                &nbsp;
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="departure_date" type="text" class="form-control datepicker" name="departure_date" readonly value="{{ $passengerTrip->departure_date }}" required autofocus placeholder="YYYY-MM-DD">

                                @if ($errors->has('departure_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departure_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <p>
                                <span class="label label-warning">
                                    Passenger Convenient Time is From {{$passengerTrip->departure_time_from}} To {{$passengerTrip->departure_time_to}}
                                </span>
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('departure_time') ? ' has-error' : '' }}">
                            <label for="departure_time" class="col-md-4 control-label">
                                Time
                                &nbsp;
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="departure_time" type="text" class="form-control timepicker" name="departure_time" value="{{ old('departure_time') }}" required autofocus>

                                @if ($errors->has('departure_time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departure_time') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('seats') ? ' has-error' : '' }}">
                            <label for="seats" class="col-md-4 control-label">
                                Seats
                                &nbsp;
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="seats" type="text" class="form-control" name="seats" value="{{ old('seats') }}"  autofocus >

                                @if ($errors->has('seats'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seats') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('packages') ? ' has-error' : '' }}">
                            <label for="packages" class="col-md-4 control-label">
                                Packages
                                &nbsp;
                                <i class="fa fa-cube" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="packages" type="text" class="form-control" name="packages" value="{{ old('packages') }}" autofocus >

                                @if ($errors->has('packages'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('packages') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">
                                Trip Comment
                                &nbsp;
                                <i class="fa fa-comment" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" type="text" class="form-control" name="description" value="{{ old('description') }}" autofocus >
                                </textarea>

                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('passenger') ? ' has-error' : '' }}">
                            <label for="passenger" class="col-md-4 control-label">
                                Passenger
                                <!-- &nbsp;
                                <i class="fa fa-comment" aria-hidden="true"></i> -->
                            </label>

                            <div class="col-md-6">
                                <input id="passenger" type="text" readonly class="form-control" name="passenger" value="{{ $passengerTrip->user->name }} {{ $passengerTrip->user->surname }} " autofocus >
                                <input type="text" hidden name="passengerId" value="{{ $passengerTrip->user->id }}">
                                @if ($errors->has('passenger'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('passenger') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
