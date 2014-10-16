@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')

	@include('sub_views.sidebar')

@stop

@section('content')
	<h1 class="dashboard-heading">User Details:</h1>
		<div class="table-wrapper" id="list_style">
			<table id="specific_user_table">
				<thead>
					<th style="display:none;"></th>
					<th style="display:none;"></th>
				</thead>
			    <tbody>
			    	<tr>
				        <td style="background:#f9f9f9">Name:</td>
				        <td>{{ $specificUser->name }}</td>
				    </tr>	
					<tr>
				        <td style="background:#f9f9f9">Email:</td>
				        <td>{{ $specificUser->email }}</td>
				    </tr>	
				    <tr>
				         <td style="background:#f9f9f9">Address:</td>
				        <td>{{ $specificUser->address }}</td>
				    </tr>
				    <tr>
				         <td style="background:#f9f9f9">D.O.B:</td>
				        <td>{{ $specificUser->DOB }}</td>
				    </tr>	
				    <tr>
				         <td style="background:#f9f9f9">Last Checked In:</td>
				        <td>{{ array_last($userHistory, function($key, $value) {
					      		echo $value->created_response;
					      		}) }}</td>
				    </tr>	
				    <tr>
				         <td style="background:#f9f9f9">Total Checked In:</td>
				       <td>{{ count($userHistory) }}</td>
				    </tr>		
			    </tbody>
			</table>
		</div>

		<div class="padding-top-10"></div>
		<h1 class="dashboard-heading">History</h1>
		@if ( count($userHistory) > 0 )
			<div class="table-wrapper">
				<table id="user_history_table" class="display">
				    <thead>
				    	 <tr>
				            <th>Time</th>
				            <th>Where</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach ( $userHistory as $historyItem )
				    		<tr>
				    			<td>{{ $historyItem->created_response }}</td>
				    			<td>{{ User::find($historyItem->stamp_user_id)->gym }}</td>
				    		</tr>
						@endforeach 
				    </tbody>
				</table>
			</div>
			
		@else
			<div  style="margin-bottom:15px">
				<div class="dashboard-item">
					User has not checked in.... yet.
				</div>
			</div>
		@endif
			
	</div>

@stop
@section('footer')
	@include('sub_views.footer')
@stop

@section('jscript')
	<script>

		$(document).ready(function(){
		    $('#specific_user_table').DataTable({
		    	 "oLanguage": { "sSearch": "" },
		    	 "bInfo" : false,
		    	 "bFilter" : false,
		    	 "bPaginate" : false,
		    	 "iDisplayLength": 25,
		    	 "sDom": 'lfrtip'
		    });

		       $('#user_history_table').DataTable({
		    	 "oLanguage": { "sSearch": "" },
		    	 "bInfo" : false,
		    	 "bFilter" : false,
		    });
		});
	</script>
@stop