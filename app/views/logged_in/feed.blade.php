@extends('layouts.master')
@include('sub_views.navbar')

@section('content')
		
		<div class="table-wrapper">
			<table id="feed_table" class="display">
			    <thead>
			        <tr>
			            <th>Time</th>
			            <th>Place</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach ( $history as $historyItem )
				    	 <tr>
				            <td>{{ $historyItem->created_response }}</td>
				            <td>{{ DB::table('users')->where('id', $historyItem->stamp_user_id)->pluck('gym') }}</td>
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
		    $('#feed_table').DataTable({
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