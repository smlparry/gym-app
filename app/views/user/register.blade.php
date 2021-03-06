@extends('layouts.master')

@section('title')
	@parent 
		:: Register
@stop

<!-- Content -->
@section('content')
	<div class="login-logo">
		<a href="/">{{ HTML::image('images/zaprri/zaprriOrange.png', 'zaprriLogo', array('height' => 110 )) }}</a>
	</div>
	<div class="login-wrapper box-wrap">
		<div class="login-header">
			<h3>Register</h3>
		</div>

		{{ Form::open( array('route' => 'user.store', 'class' => 'form-horizontal') ) }}

			<!-- Name -->
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

			<!-- Password -->
			<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
				<div class="controls">
					{{ Form::password('password', array('placeholder' => 'Password')) }}

					@if ( $errors->has('password') )
						<div class="alert alert-danger alert-block margin-error">
							{{ $errors->first('password') }}
						</div>
					@endif 

				</div>
			</div>

			<!-- Login button -->
			<div class="control-group">
				<div class="controls">
					{{ Form::submit( 'Sign Up', array('class' => 'btn btn-main btn-block') ) }}
				</div>
			</div>

		{{ Form::close() }}
	</div>

	<div class="login-options">
		{{ link_to('login', 'Already Have An Account?') }}
	</div>

@stop