<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('LTR/dashboard/base')

		<!-- Title -->
		<title>Mes voitures</title>
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
					<!--Modal-->
					<form action="" id="car_edit_form" method="post">
						@csrf
						<div class="modal fade" id="car_edit" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="example-Modal3">Editer voiture</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form>
											<div class="form-group ">
												<div class="form-group">
													<label  class="form-control-label">Prix (en Dirhams):</label>
													<input type="text" class="form-control" id="prix" name="prix" value="">
													<p id="prix_errors" class = "errors text-danger"></p>
												</div>
												<div class="row">
													<div class="col">
														<label class="form-label">Statut:</label>
														<select id="statut" name="statut" class="form-control select2">
															<option value='en_vente'>En vente</option>
															<option value='vendue'>Vendue</option>
															<option value='en_pause'>En pause</option>
														</select>
														<p id="statut_errors" class = "errors text-danger"></p>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
										<button type="submit" name="profile_edit_form" id='profile_edit_form' class="btn btn-primary">Valider</button>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!--Modal-->

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
															<th>Publiée le</th>
															<th>Marque</th>
															<th>Modele</th>
															<th>Version</th>
															<th>Prix</th>
															<th>Statut</th>
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
																<td>{{ $car->prix }} DH</td>
																@if ($car->available == 1)
																	@if ($car->visible == 1)
																		<td>En vente</td>
																	@else
																		<td>En pause</td>
																	@endif
																@else
																	<td>Vendu</td>
																@endif
																<td class="w-1">
																	@if ($car->available)
																		<a data-carid="{{ $car->id }}" data-caruid="{{ $car->uid() }}" class="btnModal icon text-danger" data-toggle="modal" data-target="#car_edit">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<span style="color:#212529 !important"> / </span>
																	@endif
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

		{{-- script to change the modal data and action --}}
		<script type="text/javascript">

			var passedID = '';
			var passedUID = '';
			var post_url = "{{ route('dash_car', ':id') }}";
			var get_url = "{{ route('dash_car', ':uid') }}";

			// reset form and urls action when modal closes
			$('#car_edit').on('hidden.bs.modal', function () {
				post_url = "{{ route('dash_car', ':id') }}";
				get_url = "{{ route('dash_car', ':uid') }}";
			});

		</script>

		<script type="text/javascript" src="../js/mycars.js"></script>

	</body>
</html>