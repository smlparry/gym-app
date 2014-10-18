
<div id="footer" class="footer navbar-fixed-bottom">
	@if ( User::isAdmin() )
		<ul class="nav nav-pills dash-sidebar">
				<li {{ Request::is('*/') ? 'class="active"' : '' }}>
					<a href="/">
						Dashboard
					</a>
				</li>
				<li {{ Request::is('*users') ? 'class="active"' : 'class="bordered"' }} >
					{{ HTML::decode(
						HTML::linkRoute('users.index', 'Users')
						)
					}}
				</li>
				<li>
					{{ HTML::decode( 
						HTML::linkRoute('stampScreen', 'Add Stamp') 
						) }}
				</li>
			</ul>
	@else 
		<ul class="nav nav-pills dash-sidebar non-admin">
				<li {{ Request::is('*/') ? 'class="active"' : '' }}>
					<a href="/">
						Dashboard
					</a>
				</li>
				<li>
					{{ HTML::decode( 
						HTML::linkRoute('stampScreen', 'Check In') 
						) }}
				</li>
			</ul>
	@endif
</div>