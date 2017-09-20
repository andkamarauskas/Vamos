@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form method="get" action="{{route('passengers.index')}}">
                {{ csrf_field() }} 
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>Passengers Search</strong>
                    </div>
                    <div class="panel-body">
                       <div class="form-group">
                        <select class="form-control" id="form_departure" name="departure_city">
                            @foreach ($departures as $departure_city)
                            <option value="{{$departure_city}}">{{$departure_city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="form_arrival" name="arrival_city">
                           @foreach ($arrivals as $arrival_city)
                           <option value="{{$arrival_city}}">{{$arrival_city}}</option>
                           @endforeach
                       </select>
                   </div>
                   <div class="form-group">
                    <input class="form-control datepicker" type="text" name="date" placeholder="YYYY-MM-DD" value="{{ old('departure_date') }}">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Find Passengers</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-9">
    <div class="panel panel-success">
        <div class="panel-heading"><strong>Passengers</strong></div>

        <div class="panel-body">
            @if(count($passengerTrips)==0)
            <p>No passengerTrips</p>
            @endif
            <div class="table-responsive">
                <table class="table table-hover">
                    @php
                    $departure_date_was = "abc";
                    @endphp
                    @foreach($passengerTrips as $passengerTrip)

                    @if($passengerTrip->departure_date != $departure_date_was )
                    <tr class="warning">
                    <td class="col-md-3 text-center">
                            <strong>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                &nbsp;
                                {{$passengerTrip->departure_date}}
                            </strong>
                        </td>
                        @php
                        $departure_date_was = $passengerTrip->departure_date;
                        @endphp
                    </tr>
                    @endif

                    <tr>
                        <td class="text-center">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            &nbsp;
                            {{$passengerTrip->departure_time_from}} - {{$passengerTrip->departure_time_to}} 
                        </td>
                        <td>
                            <i class="fa fa-plane" aria-hidden="true"></i>
                            &nbsp;
                            {{$passengerTrip->departure_city}}
                            &nbsp;
                            <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                            &nbsp;
                            {{$passengerTrip->arrival_city}}
                        </td>
                        <td>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            &nbsp;
                            {{$passengerTrip->user->name}} {{$passengerTrip->user->surname}}
                        </td>
                        <td><i class="fa fa-star" aria-hidden="true"></i>{{$passengerTrip->user->rating}}</td>
                        
                        <td>
                            <a href="{{route('passengers.show',$passengerTrip->id)}}" class="btn btn-xs btn-block btn-success"><b>View</b></a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection
