<div class="wrapper">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Right navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>
 
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
					<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li>
			<li class="nav-item dropdown porfileImageAdmin">
			    
				<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
				    
				     @if(!empty(session('userData')['profile_image']))
                                    <img class="file-upload-image" src="{{ asset('userProfile/' . session('userData')['profile_image']) }}" alt="your image" style="display:block" />
                                   @else
                                   <img src="{{ asset('admin-assets/img/avatar5.png')}}" class='img-circle elevation-2' width="40" height="40" alt="">
                                    @endif
			 
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
					<h4 class="h4 mb-0"><strong> {{session('userData')['name']}} </strong></h4>
					<div class="mb-3"> {{session('userData')['email']}} </div>
					<div class="dropdown-divider"></div>
					<!--<a href="#" class="dropdown-item" id="editAdminProfile">-->
					<!--	<i class="fas fa-user-cog mr-2"></i> Settings-->
					<!--</a>-->
    	<!--			<a href="#" class="dropdown-item" id="editAdminProfile" data-toggle="modal" data-target="#changePasswordModal">-->
     <!--                   <i class="fas fa-user-cog mr-2"></i> Settings-->
     <!--               </a>-->

				 
					<a href="{{ route('partner.index') }}" class="dropdown-item">
					<i class="fas fa-edit mr-2"></i> Edit Profile
					</a>
					<div class="dropdown-divider"></div>
					<a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<i class="fas fa-sign-out-alt mr-2"></i> Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->
	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="#" class="brand-link">
			<img src="{{ asset('admin-assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
 			<span class="brand-text font-weight-light">{{ (session('userData')['first_name'] ?? 'Spotless Cleaners') . ' ' . (session('userData')['last_name'] ?? '') }}</span>
		</a>
		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user (optional) -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="{{ route('dashboard') }}" class="nav-link">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('category.index') }}" class="nav-link">
							<i class="nav-icon fas fa-file-alt"></i>
							<p>Category</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('subCategory.index') }}" class="nav-link">
							<i class="nav-icon fas fa-file-alt"></i>
							<p>Sub Category</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('service.index') }}" class="nav-link">
							<i class="nav-icon fas fa-file-alt"></i>
							<p>Services</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('logo.index')}}" class="nav-link">
							<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
							</svg>
							<p> Logo</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('banner.index')}}" class="nav-link">
							<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
							</svg>
							<p> Banner</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('contactInfo.index')}}" class="nav-link">
							<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
							</svg>
							<p> Contact Details</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('contact-us-list')}}" class="nav-link">
							<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
							</svg>
							<p> Contact Us</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('pages.index')}}" class="nav-link">
							<i class="nav-icon fas fa-shopping-bag"></i>
							<p>pages</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('about-us')}}" class="nav-link">
							<i class="nav-icon fas fa-shopping-bag"></i>
							<p>About us</p>
						</a>
					</li>
                    	<li class="nav-item">
						<a href="{{ route('orders')}}" class="nav-link">
							<i class="nav-icon fas fa-shopping-bag"></i>
							<p>Orders</p>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="{{ route('orders-assing')}}" class="nav-link">
							<i class="nav-icon fas fa-shopping-bag"></i>
							<p>Orders Assign</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('partner.index')}}" class="nav-link">
							<i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
							<p>Partners</p>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="{{ route('orders-review-list')}}" class="nav-link">
							<i class="nav-icon fas fa-shopping-bag"></i>
							<p>Customers Reviews</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('cars.index')}}" class="nav-link">
							<i class="nav-icon  fas fa-users"></i>
							<p>Add Car</p>
						</a>
					</li>
						<li class="nav-item">
						<a href="{{ route('show-partner')}}" class="nav-link">
							<i class="nav-icon fas fa-shopping-bag"></i>
							<p>Be Comes Partner</p>
						</a>
					</li>
					<!--<li class="nav-item">-->
					<!--	<a href="#" class="nav-link">-->
					<!--		<i class="nav-icon  far fa-file-alt"></i>-->
					<!--		<p>Pages</p>-->
					<!--	</a>-->
					<!--</li>-->
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>