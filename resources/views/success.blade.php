@extends('layouts.app')
@section('content')
@if (isset(Auth::user()->email))
<div class="alert alert-danger success-block">
<strong>Hey {{Auth::user()->name}} welcome to the home page!!</strong>
<br>
{{-- logout --}}
<a href="{{url('/logout')}}">Logout</a>

</div>
@else
<script>window.location = "/login";</script>
@endif
@endsection