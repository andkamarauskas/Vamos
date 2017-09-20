@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form method="get" action="{{route('trips.index')}}">
                {{ csrf_field() }} 
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>Trip Search</strong>
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
                    <input class="form-control datepicker" type="text" name="date" placeholder="YYYY-MM-DD">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Find Trip</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-9">
    <div class="panel panel-success">
        <div class="panel-heading"><strong>Trips</strong></div>

        <div class="panel-body">
            @if(count($trips)==0)
            <p>No Trips</p>
            @endif
            <div class="table-responsive">
                <table class="table table-hover">
                    @php
                    $departure_date_was = "abc";
                    @endphp
                    @foreach($trips as $trip)

                    @if($trip->departure_date != $departure_date_was )
                    <tr class="warning">
                        <td class="col-md-2 text-center">
                            <strong>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                &nbsp;
                                {{$trip->departure_date}}
                            </strong>
                        </td>
                        @php
                        $departure_date_was = $trip->departure_date;
                        @endphp
                    </tr>
                    @endif

                    <tr>
                        <td class="text-center">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            &nbsp;
                            {{$trip->departure_time}}
                        </td>
                        <td>
                            <i class="fa fa-plane" aria-hidden="true"></i>
                            &nbsp;
                            {{$trip->departure_city}}
                            &nbsp;
                            <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                            &nbsp;
                            {{$trip->arrival_city}}
                        </td>
                        <td>
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            &nbsp;
                            {{$trip->user->name}} {{$trip->user->surname}}
                        </td>
                        <td><i class="fa fa-star" aria-hidden="true"></i>{{$trip->user->rating}}</td>
                        <td><b><i class="fa fa-user" aria-hidden="true"></i>
                         {{$trip->seats - count($trip->passenger)}}
                     </b></td>
                     <td><b><i class="fa fa-cube" aria-hidden="true"></i>{{$trip->packages}}</b></td>
                     <td>
                        <a href="{{route('trips.view',$trip->id)}}" class="btn btn-xs btn-block btn-success"><b>View</b></a>
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
