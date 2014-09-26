<!doctype html>
<html>
<head>
	<title>
		@yield('title')
	</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/custom-styles.css">
</head>
<body style="background:#ff775a">

		
	<div class="container">
		<div class="callback-logo">
		<a href="/">{{ HTML::image('images/zaprri/zaprriWhite.png', 'zaprriLogo', array('height' => 110 )) }}</a>
	</div>
		<div class="callback-wrapper box-wrap">
			<!-- Content -->
			@yield('content')

		</div>

		<div class="callback-button">
			<!-- Callback buttons -->
			@yield('callback-button')

		</div>
	</div>


	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>