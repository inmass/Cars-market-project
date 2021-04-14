<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('LTR/dashboard/base')
		<!-- Title -->
		<title>Dashboard</title>
		
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

				@if (!Auth::user()->super_user)
					<!--App-Content-->
					<div class="app-content  my-3 my-md-5">
						<div class="side-app">
							<div class="row mt-9">
								<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
									<div class="card overflow-hidden">
										<div class="card-body iconfont text-center">
											<h5>Voitures en vente</h5>
											<h3 class="counter mb-0 fs-30 mt-1">{{count($garage_available_cars)}}</h3>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
									<div class="card overflow-hidden">
										<div class="card-body iconfont text-center">
											<h5>Voitures vendus</h5>
											<h3 class="counter mb-0 fs-30 mt-1 text-green">{{count($garage_sold_cars)}}</h3>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2">
									<div class="card overflow-hidden">
										<div class="card-body iconfont text-center">
											<h5>En pause</h5>
											<h3 class="counter mb-0 fs-30 mt-1 text-red">{{count($garage_paused_cars)}}</h3>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
									<div class="card overflow-hidden">
										<div class="card-body iconfont text-center">
											<h5>total de voitures</h5>
											<h3 class="counter mb-0 fs-30 mt-1">{{count(Auth::user()->cars)}}</h3>
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
				@else
					<!--App-Content-->
					<div class="app-content  my-3 my-md-5">
						<div class="side-app">
							<div class="row mt-9">
								<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
									<div class="card overflow-hidden">
										<div class="card-body iconfont text-center">
											<h5>Voitures en vente</h5>
											<h3 class="counter mb-0 fs-30 mt-1">{{count($total_cars)}}</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/App-Content-->
				@endif
			</div>

			@include('LTR/dashboard/footer')

		</div>
		<!--/Page-->

		@include('LTR/dashboard/scripts')

	</body>
</html>