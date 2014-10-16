@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')
		
	@include('sub_views.sidebar')

@stop

@section('content')

		<!-- <h1 class="dashboard-heading">Check In Feed:</h1> -->
		<div class="table-wrapper">
			<table id="data_table" class="display">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Checked In At</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach ( $history as $historyItem )
				    	 <tr>
				            <td>{{ $historyItem->user_name }}</td>
				            <td>{{ $historyItem->created_response }}</td>
				        </tr>	
			    	@endforeach 	 
			    </tbody>
			</table>
		</div>
@stop

@section('footer')
	@include('sub_views.footer')
@stop

@section('jscript')
	<script>

		$(document).ready(function(){
		    $('#data_table').DataTable({
		    	 "oLanguage": { "sSearch": "" },
		    	 "bInfo" : false,
		    	 "iDisplayLength": 25
		    });

		    // Add the placeholder with 
		    $('.dataTables_filter input').attr("placeholder", "Search Records");

		    $( "#dataTable_search_input" ).focus(function() {
		    	// Hide the footer so that they can type easier on mobile.
		    	$('#footer').hide();
			});

			$( "#dataTable_search_input" ).blur(function() {
				// Enable the footer again
				$('#footer').show();
			});

		});

	</script>
@stop


