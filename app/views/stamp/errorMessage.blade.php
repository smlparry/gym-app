@extends('layouts.callback')

@section('content')
	
	<h3>Error ({{ $errorCode }}): {{ $errorMessage }}</h3>

@stop

@section('callback-button')

	<a href="/" class="btn btn-main btn-callback">Return Home</a>

@stop