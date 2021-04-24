<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('LTR/dashboard/base')

		<!-- Title -->
		<title>{{ $car->marque }} {{ $car->modele }} v{{ $car->version }}</title>
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
				<div class="app-content">
					<div class="side-app mt-9">
						<div class="row row-cards">
							<div class="col-lg-12 col-md-12">
								<div class="card m-b-20">
									<div class="card-body">
										<div class="bg-light p-6 text-center">
											<img class="" alt="Product" src="../assets/images/admin-media/0-4.jpg">
										</div>
										<div class="d-flex flex-row justify-content-between align-center">
											<h4 class="mt-4 mb-4">Specifications</h4>
											<h3 class="mt-4 mb-4 ">{{ $car->prix }} DH</h3>
										</div>
										<div class="pro_detail border p-4">
											<h5 class="m-l-0 m-t-10 mb-5">General</h5>
											<ul class="list-unstyled mb-0">
												<li class="row">
													<div class="col-sm-3 text-muted mb-2">Marque</div>
													<div class="col-sm-3 mb-2">{{ $car->marque }}</div>
												</li>
												<li class=" row">
													<div class="col-sm-3 text-muted mb-2">Modele</div>
													<div class="col-sm-3 mb-2">{{ $car->modele }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Version</div>
													<div class="col-sm-3 mb-2">{{ $car->version }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Carburant</div>
													<div class="col-sm-3 mb-2">{{ $car->carburant }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Boite de vitesse</div>
													<div class="col-sm-3 mb-2">{{ $car->boite_de_vitesse }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Annee de mis en circulation</div>
													<div class="col-sm-3 mb-2">{{ $car->annee_mise_en_circulation }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Dedouannee</div>
													<div class="col-sm-3 mb-2">{{ $car->dedouane }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Kilometrage</div>
													<div class="col-sm-3 mb-2">{{ $car->kilometrage }} KM</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Couleur</div>
													<div class="col-sm-3 mb-2">{{ $car->couleur }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Carrosserie</div>
													<div class="col-sm-3 mb-2">{{ $car->carrosserie }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Nombre de portes</div>
													<div class="col-sm-3 mb-2">{{ $car->portes }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Puissance fiscale</div>
													<div class="col-sm-3 mb-2">{{ $car->puissance_fiscale }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Premiere main</div>
													@if ($car->premiere_main)
														<div class="col-sm-3 mb-2"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
													@else
														<div class="col-sm-3 mb-2"><i class="fa fa-close text-red mr-2 "></i>Non</div>
													@endif
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Garantie</div>
													@if ($car->garantie)
														<div class="col-sm-3 mb-2"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
													@else
														<div class="col-sm-3 mb-2"><i class="fa fa-close text-red mr-2 "></i>Non</div>
													@endif
												</li>
											</ul>
										</div>
										<h4 class="mt-4 mb-4">Options</h4>
										<div class="pro_detail border p-4">
											<ul class="list-unstyled mb-0 ">
												<div class="container">
													<div class="row">
														{{-- @foreach ($car->getAllOptions() as $option)
														<div class='col-6 d-flex'>
															<h4><i class="fa fa-check text-green mr-2 "></i></h4><p>{{ $option }}</p>
														</div>
														@endforeach --}}
														@foreach ($car_options as $car_option)
															<div class='col-6 d-flex'>
																@if (in_array($car_option, $car->getAllOptions()))
																	<h4><i class="fa fa-check text-green mr-2 "></i></h4>
																@else
																	<h4><i class="fa fa-close text-red mr-2 "></i></h4>
																@endif
																<p>{{ $car_option }}</p>
															</div>
														@endforeach
													</div>
												</div>
											</ul>
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