@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Where You Want To Go?</strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('passengers.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('departure_city') ? ' has-error' : '' }}">
                            <label for="departure_city" class="col-md-4 control-label">
                                Departure City
                                &nbsp;
                                <i class="fa fa-plane" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="departure_city" type="text" class="form-control" name="departure_city" value="{{ old('departure_city') }}" required autofocus >

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
                                <input id="departure_address" type="text" class="form-control" name="departure_address" value="{{ old('departure_address') }}" autofocus placeholder="Just In Case">

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
                                <input id="arrival_city" type="text" class="form-control" name="arrival_city" value="{{ old('arrival_city') }}" required autofocus >

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
                                <input id="arrival_address" type="text" class="form-control" name="arrival_address" value="{{ old('arrival_address') }}"  autofocus placeholder="Just In Case" >

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
                                <input id="departure_date" type="text" class="form-control datepicker" name="departure_date" value="{{ old('departure_date') }}" required autofocus placeholder="YYYY-MM-DD">

                                @if ($errors->has('departure_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departure_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('departure_time_from') ? ' has-error' : '' }}">
                            <label for="departure_time_from" class="col-md-4 control-label">
                                Pick Up Time From
                                &nbsp;
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="timepicker" type="text" class="form-control" name="departure_time_from" value="{{ old('departure_time_from') }}" required autofocus>

                                @if ($errors->has('departure_time_from'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departure_time_from') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('departure_time_to') ? ' has-error' : '' }}">
                            <label for="departure_time_to" class="col-md-4 control-label">
                                Pick Up Time To
                                &nbsp;
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </label>

                            <div class="col-md-6">
                                <input id="timepicker2" type="text" class="form-control" name="departure_time_to" value="{{ old('departure_time_to') }}" required autofocus>

                                @if ($errors->has('departure_time_to'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departure_time_to') }}</strong>
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
