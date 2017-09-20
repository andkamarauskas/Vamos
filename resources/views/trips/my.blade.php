@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        &nbsp;
                        {{$user->name}} {{$user->surname}}
                        <span class="pull-right">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            {{$user->rating}}
                        </span>
                    </strong>
               </div>
               <div class="panel-body">
                <p>
                    <span class="label label-primary">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </span>
                    &nbsp;
                    <strong>{{$user->city}}</strong>
                </p>
                <p>
                    <span class="label label-primary">
                        <i class="fa fa-car" aria-hidden="true"></i>
                    </span>
                    &nbsp;
                    <strong>{{$user->car}} ({{$user->car_year}})</strong>
                </p>
                <p>
                    <span class="label label-primary"><strong>Hobbies:</strong></span>
                    <ul>
                       @foreach($hobbies as $hobby)
                       <li>
                        <strong>{{$hobby->name}}</strong>
                    </li>
                    @endforeach
                    </ul>
                </p>
                <p>
                    <span class="label label-primary"><strong>Trips Made:</strong></span>
                    &nbsp;
                    <strong>{{$user->trips_made}}</strong>
                </p>

        </div>
        <div class="panel-footer">
           <a href="{{ route('user.show',['id' => $user->id]) }}" class="btn btn-xs btn-block btn-primary"><b>Reviews</b></a>
       </div>
   </div>
</div>


<div class="col-md-8">
    <div class="panel panel-success">
        <div class="panel-heading"><strong>I'm driving</strong></div>
        <div class="panel-body">
            @if(count($drives) == 0)
            <a href="{{route('trips.add')}}" class="btn btn-primary">Add Trip</a>
            @else
            <div class="table-responsive"> 
                <table class="table table-hover table-sm">
                <tbody>
                    <?php $departure_date_was = "abc"; ?>
                    @foreach($drives as $drive)

                    @if($drive->departure_date != $departure_date_was)
                    <tr>
                        <th class="text-center warning">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            &nbsp;
                            {{$drive->departure_date}}
                        </th>
                        <?php $departure_date_was = $drive->departure_date; ?>
                    </tr>
                    @endif

                    <tr>
                        <td class="text-center">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            &nbsp;
                            {{$drive->departure_time}}
                        </td>
                        <td>
                            <i class="fa fa-plane" aria-hidden="true"></i>
                            &nbsp;
                            {{$drive->departure_city}}
                            &nbsp;
                            <i class="fa fa-fighter-jet" aria-hidden="true"></i>
                            &nbsp;
                            {{$drive->arrival_city}}
                        </td>
                        <!-- <td class="text-right">{{$drive->arrival_date}}</td>
                        <td>{{$drive->arrival_time}}</td> -->
                        <td><b><i class="fa fa-user" aria-hidden="true"></i>{{ $drive->seats - count($drive->passenger)}}</b></td>
                        <td><b><i class="fa fa-cube" aria-hidden="true"></i>{{$drive->packages}}</b></td>
                        <td class="col-md-1">
                            <a href="{{route('trips.arrived',$drive->id)}}" class="btn btn-block btn-xs  btn-primary"><b>Arrived</b></a>
                        </td>
                        <td class="col-md-1">
                            <a href="{{route('trips.view',$drive->id)}}" class="btn btn-block btn-xs  btn-success"><b>View</b></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>               
            @endif
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading"><strong>I'm Passenger</strong></div>
        <div class="panel-body">
            @if(count($trips) == 0)
            <i>No Trips</i>
            @else
            <div class="table-responsive">
                <table class="table table-xs">
                <tbody>
                    <?php $departure_date_was = "abc"; ?>
                    @foreach($trips as $trip)
                    @if($trip->departure_date != $departure_date_was)
                    <tr>
                        <th class="text-center warning">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            &nbsp;
                            {{$trip->departure_date}}
                        </th>
                        <?php $departure_date_was = $trip->departure_date; ?>
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
                        <td><b><i class="fa fa-user" aria-hidden="true"></i>{{ $trip->seats - count($trip->passenger)}}</b></td>
                        <td><b><i class="fa fa-cube" aria-hidden="true"></i>{{$trip->packages}}</b></td>
                        <td>
                            <a href="{{route('trips.view',$trip->id)}}" class="btn btn-xs btn-block btn-success"><b>View</b></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

</div>
</div>
@endsection
