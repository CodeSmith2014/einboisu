<!-- #NAVIGATION -->
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->

<aside id="left-panel">
	<!-- NAVIGATION : This navigation is also responsive-->
	<nav>
		<ul>
			<li>
				<a href="/dashboard" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-university"></i> <span class="menu-item-parent">Client Information</span></a>
				<ul>
					<li><a href="{{URL::route('clients.index')}}"><i class="fa fa-list"></i> Client List</a></li>
					<li><a href="{{URL::route('contacts.index')}}"><i class="fa fa-list"></i> Contact Personnel List</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Maintenance Support</span></a>
				<ul>
					<li><a href="{{URL::route('maintenance.index')}}"><i class="fa fa-list"></i> Client List</a></li>
					<li><a href="{{URL::route('onsitesupport.index')}}"><i class="fa fa-list"></i> Onsite Support List</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-taxi"></i> <span class="menu-item-parent">Invoices</span></a>
				<ul>
					<li><a href="{{URL::route('invoices.index')}}"><i class="fa fa-list"></i> List Invoices</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">Settings</span></a>
				<ul>
					<li><a href="{{URL::route('users.index')}}"><i class="fa fa-user"></i> Users Settings</a></li>
					<li><a href="{{URL::route('systems.index')}}"><i class="fa fa-hdd-o"></i> System Settings</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</aside>
<!-- END NAVIGATION -->

