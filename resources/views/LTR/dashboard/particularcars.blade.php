<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('LTR/dashboard/base')

		<!-- Title -->
		<title>Voitures particuliers</title>
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

				@if ($total_cars->count())
				<!--App-Content-->
				<div class="app-content  my-3 my-md-5">
					<div class="side-app">

						<div class="row mt-9">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Voitures particuliers</h3>
									</div>
									<div class="card-body p-0">
										<div class="table-responsive">
											<table class="table card-table table-striped table-vcenter text-nowrap">
												<thead>
													<tr>
														<th>ID</th>
														<th>PUBLIÉE LE</th>
														<th>Marque</th>
														<th>Modele</th>
														<th>Version</th>
														<th>Prix</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($total_cars as $car)
														<tr>
															<td>{{ $car->uid() }}</td>
															<td class="text-nowrap">{{ $car->created_at->format('d/m/Y') }}</td>
															<td>{{ $car->marque }}</td>
															<td>{{ $car->modele }}</td>
															<td>{{ $car->version }}</td>
															<td>{{$car->prix}}</td>
															<td class="w-1">
																<a href="{{ route('dash_car', $car->uid()) }}" class="icon text-danger">
																	<i class="fe fe-eye"></i>
																</a>
															</td>
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
				@else
				<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="row mt-9">
							<h1>No data available.</h1>
						</div>
					</div>
				</div>		
				@endif
			</div>

			@include('LTR/dashboard/footer')

		</div>
		<!--/Page-->

		@include('LTR/dashboard/scripts')

	</body>
</html>