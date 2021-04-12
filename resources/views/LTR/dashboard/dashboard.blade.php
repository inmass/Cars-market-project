<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#162946">
		<meta name="theme-color" content="#e67605">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

		<!-- Title -->
		<title>Dashboard</title>

		<!-- Bootstrap Css -->
		<link href="../assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="../assets/css/style.css" rel="stylesheet" />
		<link href="../assets/css/admin-custom.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="../assets/css/sidemenu.css" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="../assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="../assets/css/icons.css" rel="stylesheet"/>

		<!-- Color-Skins -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/color-skins/color13.css" />

	</head>
	<body class="app sidebar-mini">

		<!--Loader-->
		<div id="global-loader">
			<img src="../assets/images/loader.svg" class="loader-img " alt="">
		</div>
		<!--/Loader-->

		<!--Page-->
		<div class="page">
			<div class="page-main">

				@include('LTR/dashboard/header')
				@include('LTR/dashboard/sidebar')

				<!--App-Content-->
				<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						{{-- <div class="page-header">
							<h4 class="page-title mt-3 mb-3">Bonjour {{ Auth::user()->nom_garage }}!</h4>
						</div> --}}

						<div class="row mt-9">
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="card-body iconfont text-center">
                                        <h5>Voitures en vente</h5>
										<h3 class="counter mb-0 fs-30 mt-1">{{count($available_cars)}}</h3>
									</div>
								</div>
							</div>
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body iconfont text-center">
                                        <h5>Voitures vendus</h5>
                                        <h3 class="counter mb-0 fs-30 mt-1 text-green">{{count($sold_cars)}}</h3>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2">
								<div class="card overflow-hidden">
									<div class="card-body iconfont text-center">
										<h5>En pause</h5>
										<h3 class="counter mb-0 fs-30 mt-1 text-red">{{count($paused_cars)}}</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
								<div class="card overflow-hidden">
									<div class="card-body iconfont text-center">
										<h5>total de voitures</h5>
										<h3 class="counter mb-0 fs-30 mt-1">{{count($total_cars)}}</h3>
									</div>
								</div>
							</div>
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-12">
                                <a href="#" style="color:inherit;">
                                    <div class="card overflow-hidden">
                                        <div class="card-body iconfont text-center" href='#'>
                                            <h5>Voitures particulier</h5>
                                            <h3 class="counter mb-0 fs-30 mt-1">{{count($particular_cars)}}</h3>
                                        </div>
                                    </div>
                                </a>
							</div>
						</div>
					</div>
				</div>
				<!--/App-Content-->
			</div>

			@include('LTR/dashboard/footer')

		</div>
		<!--/Page-->

		@include('LTR/dashboard/scripts')

	</body>
</html>