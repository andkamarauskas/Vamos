@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading my-panel-heading">
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
                         @foreach($user->hobbies as $hobby)
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

        </div>
        <div class="panel panel-info">
            <div class="panel-heading my-panel-heading">
                Reviews
            </div>
            <div class="panel-body">
             @foreach($user->reviews as $review)
             <span class="label label-success">
                <i class="fa fa-user" aria-hidden="true"></i>
                &nbsp;
                <strong>{{$review->respondent->name}}</strong>
            </span>
            <span class="pull-right">
                {{$review->created_at}}
                &nbsp;
                @if($review->respondent->id == Auth::user()->id)
                <a href="{{route('review.destroy',['review' => $review->id])}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                @endif   
            </span>
            <p class="review">
                {{$review->review}}            
            </p>
            @endforeach
        </div>
        <div class="panel-footer">
        <p>Leave Review</p>
            <form action="{{route('review.store')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('review') ? ' has-error' : '' }}">
                    <textarea id="review" rows="3" type="text" class="form-control" name="review" value="{{ old('review') }}" autofocus >
                    </textarea>
                    @if ($errors->has('review'))
                    <span class="help-block">
                        <strong>{{ $errors->first('review') }}</strong>
                    </span>
                    @endif
                </div>
                <input type="text" hidden name="user_id" value="{{$user->id}}">
                <div class="text-right">
                    <input type="submit" name="submit" class="btn btn-primary btn-xs" value="Post Review">
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection
