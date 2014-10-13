@extends('layouts.master')
@include('sub_views.navbar')

@section('sidebar')

	@include('sub_views.sidebar')

@stop

@section('content')
	
	<div class="col-md-8">
		<h1 class="dashboard-heading">Add New User</h1>
		<div class="box-wrap">
			<div class="dashboard-item">

				{{ Form::open( array('route' => 'login.store', 'class' => 'form-horizontal') ) }}

					<!-- Name -->
					<div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">

						<div class="controls">
							{{ Form::text( 'name', Input::old('name'), array('placeholder' => 'Full Name') ) }}

							@if ( $errors->has('name') )
								<div class="alert alert-danger alert-block margin-error">
									{{ $errors->first('name') }}
								</div>
							@endif

						</div>
					</div>

					<!-- Email -->
					<div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">

						<div class="controls">
							{{ Form::text( 'email', Input::old('email'), array('placeholder' => 'Email Address') ) }}

							@if ( $errors->has('email') )
								<div class="alert alert-danger alert-block margin-error">
									{{ $errors->first('email') }}
								</div>
							@endif

						</div>
					</div>

					<!-- Address -->
					<div class="control-group {{{ $errors->has('address') ? 'error' : '' }}}">

						<div class="controls">
							{{ Form::text( 'address', Input::old('address'), array('placeholder' => 'User Address') ) }}

							@if ( $errors->has('address') )
								<div class="alert alert-danger alert-block margin-error">
									{{ $errors->first('address') }}
								</div>
							@endif

						</div>
					</div>

					<!-- Date of Birth -->
					<div class="control-group {{{ $errors->has('DOB') ? 'error' : '' }}}">

						<div class="controls">
							{{ Form::text( 'DOB', Input::old('DOB'), array('placeholder' => 'Date of Birth', 'maxlength' => 10) ) }}

							@if ( $errors->has('DOB') )
								<div class="alert alert-danger alert-block margin-error">
									{{ $errors->first('DOB') }}
								</div>
							@endif

						</div>
					</div>

					<!-- Passcode -->
					<div class="control-group {{{ $errors->has('passcode') ? 'error' : '' }}}">

						<div class="controls">
							{{ Form::text( 'passcode', Input::old('passcode'), array('placeholder' => 'Passcode') ) }}

							@if ( $errors->has('passcode') )
								<div class="alert alert-danger alert-block margin-error">
									{{ $errors->first('passcode') }}
								</div>
							@endif

						</div>
					</div>

					<!-- Login button -->
					<div class="control-group">
						<div class="controls">
							{{ Form::submit( 'Add User', array('class' => 'btn btn-main btn-block') ) }}
						</div>
					</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop