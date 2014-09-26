@extends('layouts.callback')

@section('content')
	
	<h3>You must be logged in to perform this action</h3>

@stop

@section('callback-button')

	<a href="/login" class="btn btn-main btn-callback">Login</a>
	<a href="/" class="btn btn-main btn-callback">Return Home</a>

@stop