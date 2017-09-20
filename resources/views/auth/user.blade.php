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
           <a href="#" class="btn btn-xs btn-block btn-primary"><b>Reviews</b></a>
       </div>
   </div>
</div>



</div>
@endsection
