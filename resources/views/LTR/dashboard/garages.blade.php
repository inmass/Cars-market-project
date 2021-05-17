<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('LTR/dashboard/base')

		<!-- Title -->
		<title>Garages</title>
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

				@if ($garages->count())
				<!--App-Content-->
				<div class="app-content  my-3 my-md-5">
					<div class="side-app">

						<div class="row mt-9">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Garages</h3>
									</div>
									<div class="card-body p-0">
										<div id="garages" class="table-responsive">
											<table class="table card-table table-striped table-vcenter text-nowrap">
												<thead>
													<tr>
														<th>Nom garage <a style="cursor: pointer;" class="sort" data-sort="garage_name"><i class="fa fa-angle-down sort_icon"></i></th>
														<th>Fixe</th>
														<th>Pack <a style="cursor: pointer;" class="sort" data-sort="pack"><i class="fa fa-angle-down sort_icon"></i></a></th>
														<th>Total des voitures <a style="cursor: pointer;" class="sort" data-sort="total_cars"><i class="fa fa-angle-down sort_icon"></i></a></th>
														<th>En vente <a style="cursor: pointer;" class="sort" data-sort="on_sale"><i class="fa fa-angle-down sort_icon"></i></a></th>
														<th>Vendues <a style="cursor: pointer;" class="sort" data-sort="sold"><i class="fa fa-angle-down sort_icon"></i></a></th>
														<th>En pause <a style="cursor: pointer;" class="sort" data-sort="paused"><i class="fa fa-angle-down sort_icon"></i></a></th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody class="list">
													@foreach ($garages as $garage)
														<tr>
															<td class="garage_name"><a>{{$garage->nom_garage}}</a></td>
															<td>{{$garage->fixe}}</td>
															<td class="pack">{{$garage->pack->id}}</td>
															<td class="total_cars">{{$garage->cars->count()}}</td>
															<td class="on_sale">{{$garage->cars->where('available' ,'=', 1)->where('visible', '=', 1)->count()}}</td>
															<td class="sold">{{$garage->cars->where('available' ,'=', 0)->count()}}</td>
															<td class="paused">{{$garage->cars->where('available' ,'=', 1)->where('visible', '=', 0)->count()}}</td>
															<td class="w-1">
																<a href="{{ route('garage_details', $garage->id) }}" class="icon text-danger">
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
		<script src="../list/list.js"></script>
		<script>
			var options = {
				valueNames: [ 'sold', 'pack', 'total_cars', 'on_sale', 'paused', 'garage_name' ]
			};

			var userList = new List('garages', options);
			 
			$('.sort_icon').click(function(){
				$(this).toggleClass('fa-angle-down fa-angle-up')
			});
		</script>

	</body>
</html>