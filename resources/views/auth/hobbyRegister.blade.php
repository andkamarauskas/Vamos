@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Add Your Hobbies</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('hobby.post') }}">
                        {{ csrf_field() }}

                        
                        <div class="form-group">
                            <label for="hobbies" class="col-md-4 control-label">Add Hobbies From List</label>
                            <div class="col-md-6">
                                <select id="hobbies" type="text" name="hobbies[]" class="js-example-basic-multiple form-control" multiple="multiple" value="{{ old('hobbies') }}" required placeholder="Add Your Hobbies">

                                  @foreach($hobbies as $hobby)
                                  <option value="{{$hobby->id}}">{{$hobby->name}}</option>
                                  @endforeach
                                  
                              </select>                           
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="new_hobby" class="col-md-4 control-label">Add New Hobbies</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="new_hobby" value="{{ old('new_hobby') }}" autofocus placeholder="If not find in list">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
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
