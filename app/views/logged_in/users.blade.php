@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')

	@include('sub_views.sidebar')

@stop

@section('content')
	
	<div class="col-sm-8">
		<a href="/users/create">
			<div class="box-wrap">
				<div class="add-new-button">
					Add New User
				</div>
			</div>
		</a>
		@foreach ( $dashboardObject as $dashboardItem )
			<a href="/users/{{ $dashboardItem->id }}">
				<div class="box-wrap">
					<div class="dashboard-item">
						{{ $dashboardItem->name }} <span class="pull-right">{{ $dashboardItem->email }}</span>
					</div>
				</div>
			</a>
		@endforeach 

	</div>

@stop