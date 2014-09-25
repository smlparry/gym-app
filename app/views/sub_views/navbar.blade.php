@section ('navbar')
<!-- Navbar -->
	<div class="navbar navbar-inverse ">
      	<div class="container">
        	<div class="navbar-header">
          		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
          		</button>
          		<a class="navbar-brand img-responsive" href="index.php">
              		<img src="images/zaprri/zaprriWhite.png" height="50px" alt="logo">
          		</a>
        	</div>
	        <div class="navbar-collapse collapse">
	         	<ul class="nav navbar-nav navbar-right">
	              	<li>
	              		<a href="{{{ URL::to('') }}}">Home</a>
	              	</li>
	             	@if ( Auth::guest() )
	                	<li>{{ HTML::link('login', 'Login') }}</li>
	                	<li>{{ HTML::link('register', 'Sign Up', array('class' => "sign-up-button")) }}</li>
	                @else
	                    <li>{{ HTML::link('logout', 'Logout') }}</li>
	                @endif
	            </ul> 
	        </div><!--/.navbar-collapse -->
      	</div>
    </div>
@stop