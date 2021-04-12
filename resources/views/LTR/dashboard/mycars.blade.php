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

						<div class="row mt-9">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Mes voitures</h3>
									</div>
									<div class="card-body p-0">
										<div class="table-responsive">
											<table class="table card-table table-striped table-vcenter text-nowrap">
												<thead>
													<tr>
														<th>Id</th>
														<th>Marque</th>
														<th>Modele</th>
														<th>Date de publication</th>
														<th>Statut</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($total_cars as $car)
														<tr>
															<td>{{ $car->token() }}</td>
															<td>{{ $car->marque }}</td>
															<td>{{ $car->modele }}</td>
															<td class="text-nowrap">{{ $car->created_at->format('d/m/Y') }}</td>
															@if ($car->available == 1)
																@if ($car->visible == 1)
																	<td>En vente</td>
																@else
																	<td>En pause</td>
																@endif
															@else
																<td>Vendu</td>
															@endif
															<td class="w-1"><a href="#" class="icon text-danger"><i class="fa fa-trash-o"></i></a></td>
														</tr>
														@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
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