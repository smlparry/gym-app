@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')
		
	@include('sub_views.sidebar')

@stop

@section('content')
	
	<div class="col-sm-8">
		<h1 class="dashboard-heading">Check In Feed:</h1>
		@foreach ( $history as $historyItem )
			<div class="box-wrap">
				<div class="dashboard-item">
					{{ $historyItem->user_name }} <span class="pull-right">{{ $historyItem->created_response }}</span>
				</div>
			</div>
		@endforeach 

	</div>

@stop


