	<div class="col-sm-4">
		<ul class="nav nav-pills nav-stacked dash-sidebar">
			<li {{ Request::is('*/') ? 'class="active"' : '' }}>
				<a href="/">
					Dashboard <span class="pull-right"><i class="fa fa-chevron-right"></i></span>
				</a>
			</li>
			<li {{ Request::is('/users/*') ? 'class="active"' : '' }}>
				<a href="/users">
					Users <span class="pull-right"><i class="fa fa-chevron-right"></i></span>
				</a>
			</li>
			<li>
				{{ HTML::decode( 
					HTML::linkRoute('stampScreen', 'Add New Stamp <span class="pull-right"><i class="fa fa-plus"></i></span>') 
					) }}
			</li>
		</ul>
	</div>