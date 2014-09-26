@extends('layouts.callback')

@section('content')
	
	<h3>Stamp Id: {{ $stampId }}</h3>
	<h3>This Stamp Was Successfully Added To Your Account</h3>

@stop

@section('callback-button')

	<a href="/" class="btn btn-main btn-callback">Return Home</a>

@stop