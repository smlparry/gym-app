	<div class="col-sm-12" style="text-align:center;">
		<ul class="nav nav-pills dash-sidebar">
			<li {{ Request::is('*/') ? 'class="active"' : '' }}>
				<a href="/">
					Dashboard
				</a>
			</li>
			<li {{ Request::is('*users') ? 'class="active"' : '' }}>
				{{ HTML::decode(
					HTML::linkRoute('users.index', 'Users')
					)
				}}
					
				</a>
			</li>
			<li>
				{{ HTML::decode( 
					HTML::linkRoute('stampScreen', 'Add Stamp') 
					) }}
			</li>
		</ul>
	</div>