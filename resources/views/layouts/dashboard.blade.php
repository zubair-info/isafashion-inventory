
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>bitBirds - Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
		<!-- Favicon -->
        {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png')}}"> --}}
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css')}}">
		<link rel="icon" type="image/x-icon" href="https://bitbirds.com/web/wp-content/uploads/2021/10/bitBirds_fav.png">
		
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
                <div class="header-left" style="background: linear-gradient(180deg, #1b5a90, #00d0f1);">
                    <a href="index.html" class="logo" >
						<img src="{{ asset('backend/assets/img/bitBirdslogo.png')}}" alt="Logo">
					
						{{-- <h2>bitBirds</h2> --}}
					</a>
					<a href="{{route('home')}}" class="logo logo-small">
						{{-- <h2>bitBirds</h2> --}}
						{{-- <img src="https://bitbirds.com/web/wp-content/uploads/2021/10/bitBirds_fav.png" alt="Logo" width="80" height="80"> --}}
						<img src="{{ asset('backend/assets/img/bitBirdslogo.png')}}" alt="Logo">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				{{-- <div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div> --}}
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					{{-- <li class="nav-item dropdown noti-dropdown">
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
					</li> --}}
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
							<li class="{{ (request()->is('home')) ? 'active' : '' }}"> 
								<a href="{{route('home')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>

                            <li class="{{ Route::CurrentRouteName() == 'user' ? 'active' : '' }}">
								<a href="{{ route('user') }}"><i class="fa fa-user" aria-hidden="true"></i> <span> User</span></a>
							</li>	
							
							<li class="{{ Route::CurrentRouteName() == 'companyName' ? 'active' : '' }}">
								<a href="{{route('companyName')}}"><i class="fa fa-building-o" aria-hidden="true"></i> <span>Company Name</span></a>
							</li>
							<li class="{{ Route::CurrentRouteName() == 'brandName' ? 'active' : '' }}"> 
								<a href="{{route('brandName')}}"><i class="fa fa-bitcoin"></i> <span>Brand Name</span></a>
							</li>
							<li class="{{ Route::CurrentRouteName() == 'sutaName' ? 'active' : '' }}"> 
								<a href="{{route('sutaName')}}"><i class="fa fa-skype"></i><span>Suta Name</span></a>
							</li>
							<li class="{{ Route::CurrentRouteName() == 'kaporName' ? 'active' : '' }}"> 
								<a href="{{route('kaporName')}}"><i class="fa fa-scissors"></i> <span>Kapor Name</span></a>
							</li>
							<li class="{{ Route::CurrentRouteName() == 'lekraBrandName' ? 'active' : '' }}"> 
								<a href="{{route('lekraBrandName')}}"><i class="fa fa-black-tie"></i> <span>Lekra Brand </span></a>
							</li>
							<li class="submenu {{ Route::CurrentRouteName() == 'KnittingSendShow' ? 'active' : '' }}">
								<a href="#"><i class="fe fe-star-o"></i><span>Received Suta</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('knittingreceivedSutaBrand')}}">Suta Received</a></li>
									<li><a href="{{route('KnittingSutaBrandShow')}}">Suta Show</a></li>
								</ul>
							</li>
							<li class="submenu {{ Route::CurrentRouteName() == 'knittingreceivedLekraBrand' ? 'active' : '' }}">
								<a href="#"><i class="fe fe-star-o"></i><span>Received Lekra</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('knittingreceivedLekraBrand')}}">Lekra Received</a></li>
									<li><a href="{{route('KnittingSutaBrandShow')}}">Lekra Show</a></li>
								</ul>
							</li>
							<li class="submenu {{ Route::CurrentRouteName() == 'KnittingSendShow' ? 'active' : '' }} ||  {{ Route::CurrentRouteName() == 'making_knitting_send' ? 'active' : '' }}">
								<a href="#"><i class="fe fe-star-o"></i><span>Making Send</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('making_knitting_send')}}">Making Send</a></li>
									<li><a href="{{route('KnittingSendShow')}}">Making Show</a></li>
								</ul>
							</li>
							<li class="submenu {{ Route::CurrentRouteName() == 'making_knitting_recived' ? 'active' : '' }} || {{ Route::CurrentRouteName() == 'KnittingReceivedShow' ? 'active' : '' }}">
								<a href="#"><i class="fe fe-star-o"></i><span>Making Recived</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('making_knitting_recived')}}">Making Recived</a></li>
									<li><a href="{{route('KnittingReceivedShow')}}">Making Show</a></li>
								</ul>
							</li>
							

							<li class="submenu {{ Route::CurrentRouteName() == 'dyeingSend' ? 'active' : '' }} ||{{ Route::CurrentRouteName() == 'dyeingSendShow' ? 'active' : '' }}">
								<a href="#"><i class="fa fa-sheqel"></i> <span>Dyeing Send</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('dyeingSend')}}">Dyeing Send</a></li>
									<li><a href="{{route('dyeingSendShow')}}">Dyeing Show</a></li>
								</ul>
							</li>

							<li class="submenu {{ Route::CurrentRouteName() == 'dyeingReceived' ? 'active' : '' }} ||{{ Route::CurrentRouteName() == 'dyeingReceivedShow' ? 'active' : '' }}">
								<a href="#"><i class="fa fa-sheqel"></i> <span>Dyeing Received</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('dyeingReceived')}}">Dyeing Received</a></li>
									<li><a href="{{route('dyeingReceivedShow')}}">Dyeing Show</a></li>
								</ul>
							</li>
							<li class="submenu {{ Route::CurrentRouteName() == 'cuttingSend' ? 'active' : '' }} ||{{ Route::CurrentRouteName() == 'cuttingSendShow' ? 'active' : '' }}">
								<a href="#"><i class="fa fa-scissors"></i><span>Cutting Send</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('cuttingSend')}}">Cutting Send</a></li>
									<li><a href="{{route('cuttingSendShow')}}">Cutting Show</a></li>
								</ul>
							</li>
							<li class="submenu {{ Route::CurrentRouteName() == 'cuttingReceived' ? 'active' : '' }} || {{ Route::CurrentRouteName() == 'cuttingReceivedShow' ? 'active' : '' }}">
								<a href="#"><i class="fa fa-scissors"></i><span>Cutting Received</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('cuttingReceived')}}">Received</a></li>
									<li><a href="{{route('cuttingReceivedShow')}}">Show</a></li>
								</ul>
							</li>

							<li class="submenu {{ Route::CurrentRouteName() == 'markatReceived' ? 'active' : '' }} || {{ Route::CurrentRouteName() == 'markatReceivedShow' ? 'active' : '' }}">
								<a href="#"><i class="fa fa-codepen"></i><span>Markat Received</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('markatReceived')}}">Received</a></li>
									<li><a href="{{route('markatReceivedShow')}}">Show</a></li>
								</ul>
							</li>
							<li class="submenu {{ Route::CurrentRouteName() == 'markatSend' ? 'active' : '' }} || {{ Route::CurrentRouteName() == 'markatSendShow' ? 'active' : '' }}">
								<a href="#"><i class="fa fa-codepen"></i><span>Markat Send</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('markatSend')}}">Markat Send</a></li>
									<li><a href="{{route('markatSendShow')}}">Markat Show</a></li>
								</ul>
							</li>

							
							
							<li class="submenu ">
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