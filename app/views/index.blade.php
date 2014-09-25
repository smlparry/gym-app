@extends('layouts.master')
@include('sub_views.navbar')

@section('content')

	<h3>Hello, You are currently logged out this has changed</h3>

	<h3>{{ link_to('register', 'Create a new account') }} or {{ link_to('login', 'Login with an existing account') }}</h3>

@stop


