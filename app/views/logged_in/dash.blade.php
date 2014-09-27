@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')
		
	<div class="col-sm-4">
		<ul class="nav nav-pills nav-stacked dash-sidebar">
			<li class="active"><a href="#">Dashboard <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a></li>
			<li><a href="#">Add New Stamp<span class="pull-right"><i class="fa fa-plus"></i></span></a></li>
		</ul>
	</div>

@stop

@section('content')
	
	<div class="col-sm-8">
		@foreach ( $history as $historyItem )
			<div class="box-wrap" style="margin-bottom:15px">
				<div class="dashboard-item">
					{{ $historyItem->user_id }} <span class="pull-right">{{ $historyItem->created_response }}</span>
				</div>
			</div>
		@endforeach 

	</div>

@stop


