@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>
                        Passenger
                    </strong>
                </div>
                <div class="panel-body">
                    <p>
                        <span class="label label-primary">
                            <i class="fa fa-user" aria-hidden="true"> </i>
                        </span>
                        &nbsp;

                        {{$passengerTrip->user->name}} {{$passengerTrip->user->surname}}

                        <span class="pull-right">
                            <i class="fa fa-star" aria-hidden="true"></i> 
                            {{$passengerTrip->user->rating}}
                            &nbsp;
                        </span>
                    </p>
                    <p>
                        <span class="label label-primary">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        &nbsp;
                        {{$passengerTrip->user->city}}
                    </p>
                    <p>
                        <span class="label label-primary"><strong>Hobbies:</strong></span>
                        <ul class="list-inline">
                           @foreach($hobbies as $hobby)
                           <li class="list-inline-item">
                            {{$hobby->name}}
                        </li>
                        @endforeach
                    </ul>
                </p>

                <a href="{{ route('user.show',['id' => $passengerTrip->user->id]) }}" class="btn btn-xs btn-block btn-info"><b>Review</b></a>
            </div>
            
            
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading text-center trip-heading">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                &nbsp;
                {{$passengerTrip->departure_date}}
                &nbsp;
                <i class="fa fa-plane" aria-hidden="true"></i>
                &nbsp;
                {{$passengerTrip->departure_city}}
                &nbsp;
                <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                &nbsp;
                {{$passengerTrip->arrival_city}}

            </div>
            <div class="panel-body">
                <p>
                <h4>Convenient Time</h4>
                    From {{$passengerTrip->departure_time_from}} To {{$passengerTrip->departure_time_to}}
                </p>

                <p>
                    <h4>Confortable Start Point:</h4>
                    {{$passengerTrip->departure_address}}
                </p>
                <p>
                    <h4>Confortable Finnish Point:</h4>
                    {{$passengerTrip->arrival_address}}
                </p>
                <div class="well">
                    <p>
                        <h4>{{$passengerTrip->user->name}}:</h4>
                        {{$passengerTrip->description}}
                    </p>
                </div>
                @if($iAmThisPassenger)
                <div class="pull-right">
                    <a href="route('trips.edit',$trip->id)" class="btn btn-warning btn-xs ">Edit</a>
                    <a href="route('trips.delete',$trip->id)" class="btn btn-danger btn-xs ">Cancel</a>
                </div>
                @else
                    <a href="{{route('trips.make', $passengerTrip->id)}}" class="btn btn-success btn-block">Make a Trip for This Passenger</a>
                @endif

            </div>
        </div>
        
    </div>
</div>
<!-- container -->
</div>


@endsection
