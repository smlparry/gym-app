<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		@yield('title')
	</title>
	
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/jquery.dataTables.css')}}
	{{ HTML::style('css/custom-styles.css') }}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>

	<!-- Navbar -->
	@yield('navbar')


    	  @if ( $message = Session::get('success') )
	        	<!-- Success Messages -->
	            <div class="alert alert-success alert-block">
	                <button type="button" class="close" data-dismiss="alert">&times;</button>
	                <h4>Success</h4>
	                {{{ $message }}}
	            </div>
	        @elseif ( $error = Session::get('error') )
	        	<!-- Error Messages -->
	            <div class="alert alert-danger alert-block">
	                <button type="button" class="close" data-dismiss="alert">&times;</button>
	                <h4>Error</h4>
	                {{{ $error }}}
	            </div>
	       	@endif

	       	<div class="content">
				<!-- Content -->
				@yield('content')
			</div>

	<!-- Footer -->
	@yield('footer')

	<!-- Scripts -->
	{{ HTML::script('js/jquery-1.11.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/jquery.dataTables.js')}}
	@yield('jscript')

</body>
</html>