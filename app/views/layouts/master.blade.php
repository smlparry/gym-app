<!doctype html>
<html>
<head>
	<title>
		@yield('title')
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/custom-styles.css">

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
	        @elseif ( $errorMessages = Session::get('error') )
	        	<!-- Error Messages -->
	            <div class="alert alert-danger alert-block">
	                <button type="button" class="close" data-dismiss="alert">&times;</button>
	                <h4>Error</h4>

	                @foreach ( $errorMessages as $message )
	                	{{{ $message }}}
	                @endforeach

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