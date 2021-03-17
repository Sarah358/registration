@extends('layouts.app')
@section('content')
<div id="login">
<h3 class="text-center text-white pt-5">Login form</h3>
<div class="container">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
<div id="login-box" class="col-md-12">
   
{{-- <form id="login-form" class="form" action="" method="post"> --}}
    {{Form::open(array('url'=> 'register','id'=>'login-column','id'=>'login-form'))}}
    {{@csrf_field()}}
<h3 class="text-center text-info">REGISTER HERE</h3>
 {{-- if the user is already logged in we dont want them seeing the login form --}}
 @if (isset(Auth::user()->email))
 <script>window.location="/success";</script>
 @endif

{{-- diplaying error messages --}}
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif

{{-- checking for validation errors --}}
{{-- <p>
    {{$errors->first('name')}}
    {{$errors->first('email')}}
    {{$errors->first('password')}}

</p> --}}
@if (count($errors)>0)
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
       <li>{{$error}}</li> 
    @endforeach
</ul>
</div>
    
@endif
<div class="form-group">
    {{Form::label('name','Name:', array('class'=>'text-info'))}}<br>
    {{Form::text('name')}}
    {{-- <input type="text" name="username" id="username" class="form-control"> --}}
</div>
<div class="form-group">
    {{Form::label('email','Email',array('class'=>'text-info'))}}<br>
    {{Form::text('email')}}
    {{-- <label for="password" class="text-info">Password:</label><br> --}}
    {{-- <input type="text" name="password" id="password" class="form-control"> --}}
</div>
<div class="form-group">
    {{Form::label('password','Password',array('class'=>'text-info'))}}<br>
    {{Form::password('password')}}
    {{-- <label for="password" class="text-info">Password:</label><br> --}}
    {{-- <input type="text" name="password" id="password" class="form-control"> --}}
</div>
<div class="form-group">
    {{Form::label('confirm_password','Confirm Password',array('class'=>'text-info'))}}<br>
    {{Form::password('confirm_password')}}
    {{-- <label for="password" class="text-info">Password:</label><br> --}}
    {{-- <input type="text" name="password" id="password" class="form-control"> --}}
</div>
<div class="form-group">
    {{-- {{Form::checkbox('remember-me','Remember me')}} <span class="text-info" id="remember-me">Remember me</span><br> --}}
    {{-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> --}}
    {{-- <input type="submit" name="submit" class="btn btn-info btn-md" value="submit"> --}}
    {{Form::submit('Register',array('class'=>'btn btn-info btn-md'))}}
</div>

{{Form::close()}}
{{-- </form> --}}
</div>
</div>
</div>
</div>
</div>
    
@endsection
