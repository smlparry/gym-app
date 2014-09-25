@extends('layouts.master')
@include('sub_views.navbar')

@section('content')

	<h3>Hello, You are currently logged in</h3>

	<h3>Your user id is: {{ Auth::id() }}</h3>
	<h3>Your email is: {{ Auth::user()->email }}</h3>
	<h3>{{ link_to('logout', 'Click here to logout') }}</h3>

@stop


