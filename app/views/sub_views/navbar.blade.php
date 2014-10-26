@section ('navbar')
<!-- Navbar -->
	<div class="navbar navbar-inverse">
      	<div class="container">
        	<div class="navbar-header">
          		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
          		</button>
          		<a class="navbar-brand" href="/">
              		{{ HTML::image("images/zaprri/zaprriWhite.png", 'Zaprri Web Solutions Logo' ) }}
          		</a>
        	</div>
	        <div class="navbar-collapse collapse">
	         	<ul class="nav navbar-nav navbar-right">
	             	@if ( Auth::guest() )
	             		<li>{{ HTML::link('/', 'Home') }}</li>
	                	<li>{{ HTML::link('login', 'Login') }}</li>
	                	<li>{{ HTML::link('register', 'Sign Up') }}</li>
	                @else
	                	<li>{{ HTML::link('/', 'Dashboard') }}</li>
	                	<li>{{ HTML::linkRoute('users.index', 'Users') }}</li>
	                    <li>{{ HTML::link('logout', 'Logout') }}</li>
	                @endif
	            </ul> 
	        </div><!--/.navbar-collapse -->
      	</div>
    </div>
@stop