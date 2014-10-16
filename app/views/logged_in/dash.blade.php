@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')
		
	@include('sub_views.sidebar')

@stop

@section('content')
	
	<div class="col-sm-8">
		<h1 class="dashboard-heading">Check In Feed:</h1>
		<div class="table-wrapper">
			<table id="data_table" class="display">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Email</th>
			            <th>Check In Time</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 Data 1</td>
			            <td>Row 1 Data 2</td>
			            <td></td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
			            <td></td>
			        </tr>
			    </tbody>
			</table>
		</div>

@stop

@section('jscript')
	@include('js.datatables_init')
@stop


