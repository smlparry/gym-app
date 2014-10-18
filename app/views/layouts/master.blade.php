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