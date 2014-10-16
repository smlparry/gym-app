@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')

	@include('sub_views.sidebar')

@stop

@section('content')
	
		<!-- <h1 class="dashboard-heading">Check In Feed:</h1> -->
		<div class="table-wrapper">
			<table id="user_table" class="display">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Email</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach ( $dashboardObject as $dashboardItem )
					   	<tr>
					       <td>  <a href="/users/{{ $dashboardItem->id }}">{{ $dashboardItem->name }}</a></td>
					        <td> <a href="/users/{{ $dashboardItem->id }}">{{ $dashboardItem->email }}</a></td>
					    </tr>	
			    	@endforeach 	 
			    </tbody>
			</table>
		</div>
		
	</div>

@stop
@section('footer')
	@include('sub_views.footer')
@stop

@section('jscript')
	<script>

		$(document).ready(function(){
		    $('#user_table').DataTable({
		    	 "oLanguage": { "sSearch": "" },
		    	 "bInfo" : false,
		    	 "iDisplayLength": 25
		    });

		    // Add the placeholder with 
		    $('.dataTables_filter input').attr("placeholder", "Search Users");
		});

	</script>
@stop