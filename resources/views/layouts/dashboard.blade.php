
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>bitBirds - Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css')}}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/feathericon.min.css')}}">
		
		<link rel="stylesheet" href="{{ asset('backend/assets/plugins/morris/morris.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">
		{{-- tostar css --}}
		<link rel="stylesheet" href="{{ asset('backend/assets/plugins/toastr/toastr.css')}}">
		{{-- select 2 css --}}
		<link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css')}}">

		
		
		{{-- [if lt IE 9]
			<script src="{{ asset('backend/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{ asset('backend/assets/js/respond.min.js')}}"></script>
		[endif] --}}
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.html" class="logo"  style="margin-top:10px;">
						{{-- <img src="{{ asset('backend/assets/img/bitBirdslogo.png')}}" alt="Logo"> --}}
						<h2>bitBirds</h2>
					</a>
					<a href="index.html" class="logo logo-small" style="margin-top:10px;">
						<h2>bitBirds</h2>
						{{-- <img src="{{ asset('backend/assets/img/bitBirdslogo.png')}}" alt="Logo" width="30" height="30"> --}}
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fe fe-bell"></i> <span class="badge badge-pill">1</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('backend/assets/img/doctors/doctor-thumb-01.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{ asset('/uploads/users') }}/{{ Auth::user()->profile_photo }}" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{ asset('/uploads/users') }}/{{ Auth::user()->profile_photo }}" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text text-capitalize">
									<h6>{{ Auth::user()->name }}</h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="{{ route('profile.change') }}">My Profile</a>
							<a class="dropdown-item" href="settings.html">Settings</a>
							<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Admin</span>
							</li>
							<li class="active"> 
								<a href="{{route('home')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>

                            <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> User</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('user') }}"">User List</a></li>
								</ul>
							</li>	
							
							<li class=""> 
								<a href="{{route('companyName')}}"><i class="fe fe-home"></i> <span>Company Name</span></a>
							</li>
							<li class=""> 
								<a href="{{route('brandName')}}"><i class="fe fe-home"></i> <span>Brand Name</span></a>
							</li>
							<li class=""> 
								<a href="{{route('sutaName')}}"><i class="fe fe-home"></i> <span>Suta Name</span></a>
							</li>
							<li class=""> 
								<a href="{{route('kaporName')}}"><i class="fe fe-home"></i> <span>Kapor Name</span></a>
							</li>
							<li class=""> 
								<a href="{{route('lekraBrandName')}}"><i class="fe fe-home"></i> <span>Lekra Brand </span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span>Knitting Send</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('making_knitting_send')}}">Knitting Send</a></li>
									<li><a href="{{route('KnittingSendShow')}}">Knitting Show</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span>Knitting Recived</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('making_knitting_recived')}}">Knitting Recived</a></li>
									<li><a href="{{route('KnittingReceivedShow')}}">Knitting Show</a></li>
								</ul>
							</li>

							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span>Dyeing Send</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('dyeingSend')}}">Dyeing Send</a></li>
									<li><a href="{{route('KnittingSendShow')}}">Dyeing Show</a></li>
								</ul>
							</li>
							
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="#">Invoice Reports</a></li>
								</ul>
							</li>

					
					
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">

                @yield('content')
		            	
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('backend/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{ asset('backend/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<script src="{{ asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>    
		<script src="{{ asset('backend/assets/plugins/morris/morris.min.js')}}')}}"></script>  
		<script src="{{ asset('backend/assets/js/chart.morris.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{ asset('backend/assets/js/script.js')}}"></script>

		{{-- toster js--}}
		<script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js')}}"></script> 

		{{-- select 2 --}}
		<script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script> 

		<script>
			@if (Session::has('message'))
				var type ="{{ Session::get('alert-type', 'info') }}"
				switch(type){
				case 'info':
				toastr.info(" {{ Session::get('message') }} ");
				break;
			
				case 'success':
				toastr.success(" {{ Session::get('message') }} ");
				break;
			
				case 'warning':
				toastr.warning(" {{ Session::get('message') }} ");
				break;
			
				case 'error':
				toastr.error(" {{ Session::get('message') }} ");
				break;
				}
			@endif
		</script>

		{{-- select 2  --}}
		<script>
			// In your Javascript (external .js resource or <script> tag)
			$(document).ready(function() {
				$('.select2_search').select2();
			});
		</script>
	
        @yield('footer_script')
		
    </body>
</html>