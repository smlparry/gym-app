<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		@yield('title')
	</title>
	
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/main.css') }}
	{{ HTML::style('css/font-awesome.css') }}
	{{ HTML::style('css/animate.css') }}
	{{ HTML::style('css/custom-styles.css') }}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>

	<!-- Navbar -->
	@yield('navbar')

    <div class="container">

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
		       	<!-- Sidebar -->
		       	@yield('sidebar')
				<!-- Content -->
				@yield('content')
			</div>

	</div>
	
	<!-- Footer -->
	@yield('footer')

	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>