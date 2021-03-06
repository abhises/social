@extends('layout.master')
@section('title')
Welcome
@endsection
@section('content')
@include('includes.message-block')




<div class="row">

   
    <div class="col-md-6">
    <h3>Signup</h3>
        <form action="{{route('signup')}}" method="POST">{{csrf_field()}}
            <div class="form-group">
             <label for="email"> Your Email Address </label>
            <input class="form-control" type="email" name="email" id="email" value="{{Request::old('email')}}">
                
            </div>
            <div class="form-group">
             <label for="first_name"> Your First Name </label>
            <input class="form-control" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
                
            </div>

            <div class="form-group">
             <label for="passwordl"> Your Password </label>
            <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
        </div>
    

    <div class="col-md-6">
    <h3>Signin</h3>
        <form action='{{route('signin')}}' method="Post"> {{csrf_field()}}
            <div class="form-group">
             <label for="email"> Your Email Address </label>
            <input class="form-control" type="email" name="email" id="email" value="{{Request::old('email')}}">
                
            </div>
            

            <div class="form-group">
             <label for="passwordl"> Your Password </label>
            <input class="form-control" type="password" name="password" id="password"  value="{{Request::old('password')}}">
                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            
        </form>
        
    </div>
    
</div>


@endsection