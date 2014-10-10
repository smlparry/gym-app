@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')

	@include('sub_views.sidebar')

@stop

@section('content')

	<div class="col-sm-8">
		<h1 class="dashboard-heading">User: {{ $specificUser->name }}</h1>
		<div class="box-wrap">
			<div class="dashboard-item">
				<table class="table table-hover ">
				  	<tbody>
				    	<tr>
					      <td style='border-top:none;'>Name</td>
					      <td style='border-top:none;'>{{ $specificUser->name }}</td>
				    	</tr>
				    	<tr>
					      <td>Email</td>
					      <td>{{ $specificUser->email }}</td>
				    	</tr>
				    	<tr>
					      <td>Address</td>
					      <td>{{ $specificUser->address }}</td>
				    	</tr>
				    	<tr>
					      <td>Date of Birth</td>
					      <td>{{ $specificUser->DOB }}</td>
				    	</tr>
				    	<tr>
					      <td>Last Checked In</td>
					      <td>{{ array_last($userHistory, function($key, $value) {
					      		echo $value->created_response;
					      		}) }}</td>
				    	</tr>
				    	<tr>
					      <td>Total Checked In</td>
					      <td>{{ count($userHistory) }}</td>
				    	</tr>
				    </tbody>
				</table>
			</div>
		</div>

		<h1 class="dashboard-heading">Check In History</h1>
		@if ( count($userHistory) > 0 )
			@foreach ( $userHistory as $historyItem )
				<div class="box-wrap" style="margin-bottom:15px">
					<div class="dashboard-item">
						{{ $historyItem->created_response }} 
						<span class="pull-right">{{ User::find($historyItem->stamp_user_id)->gym }}</span>
					</div>
				</div>
			@endforeach 
		@else
			<div class="box-wrap" style="margin-bottom:15px">
				<div class="dashboard-item">
					User has not checked in.... yet.
				</div>
			</div>
		@endif
			
	</div>

@stop