<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name') }} - Admin Panel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	{{ Html::style('assets/vendor/bootstrap/css/bootstrap.min.css') }}
	{{ Html::style('assets/vendor/font-awesome/css/font-awesome.min.css') }}
	{{ Html::style('assets/vendor/linearicons/style.css') }}
	{{ Html::style('assets/vendor/dataTables/css/dataTables.bootstrap.min.css') }}
	{{-- <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('assets/vendor/datepicker/datepicker.css') }}"> --}}
	<!-- MAIN CSS -->
	{{ Html::style('assets/css/main.css') }}
	{{ Html::style('assets/css/custom.css') }}
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	{{-- <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"> --}}
	<!-- GOOGLE FONTS -->
	{{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> --}}
	<!-- ICONS -->
	{{-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}">

    
    @yield('head')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/"><img src="{{ asset('assets/img/rei-logo.png') }}" alt="Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn" style="padding-left:15px;">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/user-logo.png') }}" class="img-circle" alt="Avatar"> <span> {{ Sentinel::getUser()->first_name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li>
									<a href="{{ route('auth.logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i><span>Logout</span>
									</a>
								</li>
								<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
								</form>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li style="border-top:3px outset white;"><a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li style="border-top:1px outset white;"><a href="{{ route('admin.users.index') }}" class="{{ Request::is('*/users','*/users/*') ? 'active' : '' }}"><i class="lnr lnr-users"></i> <span>Users</span></a></li>
						<li style="border-top:1px outset white;"><a href="{{ route('admin.products.index') }}" class="{{ Request::is('*/products','*/products/*') ? 'active' : '' }}"><i class="lnr lnr-briefcase"></i> <span>Products</span></a></li>
                        <li style="border-top:1px outset white;"><a href="{{ route('admin.categories.index') }}" class="{{ Request::is('*/categories','*/categories/*') ? 'active' : '' }}"><i class="lnr lnr-list"></i> <span>Categories</span></a></li>
                        <li style="border-top:1px outset white;">
                            <a href="#subPlaces" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Places</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPlaces" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{ route('admin.places.provinces.index') }}" class="">Province</a></li>
									<li><a href="{{ route('admin.places.cities.index') }}" class="">City</a></li>
									<li><a href="{{ route('admin.places.sub_districts.index') }}" class="">Sub District</a></li>
								</ul>
							</div>
						</li>
                        <li style="border-top:1px outset white;"><a href="{{ route('admin.purchasings.index') }}" class="{{ Request::is('*/purchasings','*/purchasings/*') ? 'active' : '' }}"><i class="lnr lnr-cart"></i> <span>Purchasings</span></a></li>
                        <li style="border-top:1px outset white;"><a href="{{ route('admin.confirmations.index') }}" class="{{ Request::is('*/confirmations','*/confirmations/*') ? 'active' : '' }}"><i class="lnr lnr-bookmark"></i> <span>Confirmations</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	{{ Html::script('assets/vendor/jquery/jquery.min.js') }}
	{{ Html::script('assets/vendor/bootstrap/js/bootstrap.min.js') }}
	{{ Html::script('assets/scripts/klorofil-common.js') }}
	{{ Html::script('assets/vendor/jquery-slimscroll/jquery.slimscroll.js') }}
	{{ Html::script('assets/vendor/dataTables/js/jquery.dataTables.min.js') }}
    {{ Html::script('assets/vendor/dataTables/js/dataTables.bootstrap.min.js') }}
    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	{{-- <script src="{{ asset('assets/vendor/select2/select2.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets/vendor/datepicker/datepicker.js') }}"></script> --}}
	<script>
	// Custom


	$(document).ready(function() {
    	$('#table').DataTable();

        $('.delete').on('click', function(e){
            e.preventDefault();
            var url = $(this).attr('href');

            swal({
                text: "Are you sure want to delete this item?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((confirmation) => {
                if (confirmation) {
                    location.href = url;
                }
            });
            return false;
        })
	});

	// $(function() {
	// 	$('[data-toggle="datepicker"]').datepicker({
	// 		format: 'yyyy-mm-dd',
	// 		autoHide: true,
	// 	}).datepicker("setDate", new Date());
 	// });


	</script>
     @stack('scripts')
</body>

</html>
