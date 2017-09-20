@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>
                        Driver
                    </strong>
                </div>
                <div class="panel-body">
                    <p>
                        <span class="label label-primary">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                        </span>
                        &nbsp;
                       
                            {{$trip->user->name}} {{$trip->user->surname}}
                      
                        <span class="pull-right">
                            <i class="fa fa-star" aria-hidden="true"></i> 
                            {{$trip->user->rating}}
                            &nbsp;
                        </span>
                    </p>
                    <p>
                        <span class="label label-primary">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        &nbsp;
                        {{$trip->user->city}}
                    </p>
                    <p>
                        <span class="label label-primary">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </span>
                        &nbsp;
                        {{$trip->user->car}} ({{$trip->user->car_year}})
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
                <p>
                    <span class="label label-primary"><strong>Trips Made:</strong></span>
                    &nbsp;
                    {{$trip->user->trips_made}}
                </p>

                <a href="{{route('user.show',[$trip->user->id])}}" class="btn btn-xs btn-block btn-info"><b>Review</b></a>
            </div>
            
            
        </div>
    </div>
    <div class="col-md-8">
    
        <div class="panel panel-primary">
            <div class="panel-heading text-center trip-heading">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                &nbsp;
                {{$trip->departure_date}}
                &nbsp;
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                &nbsp;
                {{$trip->departure_time}}
                &nbsp;
                <i class="fa fa-plane" aria-hidden="true"></i>
                &nbsp;
                {{$trip->departure_city}}
                &nbsp;
                <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                &nbsp;
                {{$trip->arrival_city}}

            </div>
            <div class="panel-body">
                @if($iAmDriver)
                <a href="{{route('trips.arrived',$trip->id)}}" class="btn pull-right  btn-success">
                    <b>Arrived</b>
                </a>
                @endif
                <p>
                    <h4>Start Point:</h4>
                    {{$trip->departure_address}}
                </p>
                <p>
                    <h4>Finnish Point:</h4>
                    {{$trip->arrival_address}}
                </p>
                
                <div class="well">
                    <p>
                        <h4>{{$trip->user->name}}:</h4>
                        {{$trip->description}}
                    </p>
                </div>
                @if($iAmDriver)
                <div class="pull-right">
                    <a href="{{route('trips.edit',$trip->id)}}" class="btn btn-warning btn-xs ">Edit</a>
                    <a href="{{route('trips.delete',$trip->id)}}" class="btn btn-danger btn-xs ">Cancel</a>
                </div>
                @endif
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <strong>Passengers</strong>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tbody>
                        @foreach($passengers as $passenger)
                        <tr>
                            <td>
                                <i class="fa fa-user" aria-hidden="true"> </i> {{$passenger->user->name}}
                            </td>
                            <td>
                                <i class="fa fa-star" aria-hidden="true"> </i> {{$passenger->user->rating}}
                            </td>
                            <td class="text-right">
                                @if($passenger->user->id == Auth::User()->id)
                                <a href="{{route('passenger.out', ['trip_id'=>$trip->id])}}" class="btn btn-xs btn-warning"><strong>Jump Out</strong></a>
                                @else
                                <a href="{{ route('user.show',['id' => $passenger->user->id]) }}" class="btn btn-xs btn-info"><strong>Review</strong></a>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                        @foreach(range(1,$freeSeats) as $key)
                        <tr>
                            <td>Free</td>
                            <td></td>
                            <td class="text-right">
                                @if($iAmPassenger || $iAmDriver)
                                <a href="#" class="btn btn-xs btn-success"><strong>Call a Friend</strong></a>
                                @else
                                <a href="{{route('passenger.sit',['trip_id'=>$trip->id])}}" class="btn btn-xs btn-success"><strong>Take a Seat</strong></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
</div>
<!-- container -->

</div>


@endsection
