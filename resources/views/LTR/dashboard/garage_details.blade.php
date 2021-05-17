<!doctype html>
<html lang="en" dir="ltr">
	<head>
        @include('LTR/dashboard/base')
		<!-- Title -->
		<title>{{$garage->nom_garage}}</title>
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

                <!--Modals-->
                <form action="" id="garage_form" method="post">
					@csrf
					<div class="modal fade" id="garage_edit" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="example-Modal3">Editer garage infos</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label  class="form-control-label">Nom garage:</label>
											<input type="text" class="form-control" id="nom_garage" name="nom_garage" value="{{ $garage->nom_garage }}">
											<p id="nom_garage_errors" class = "errors text-danger"></p>
										</div>
										<div class="form-group">
											<label  class="form-control-label">Addresse:</label>
											<input type="text" class="form-control" id="adresse" name="adresse" value="{{ $garage->adresse }}">
											<p id="adresse_errors" class = "errors text-danger"></p>
										</div>
										<div class="form-group">
											<label  class="form-control-label">Numéro de téléphone:</label>
											<input type="text" class="form-control" id="phone" name="phone" value="{{ $garage->phone }}">
											<p id="phone_errors" class = "errors text-danger"></p>
										</div>
										<div class="form-group">
											<label  class="form-control-label">Fixe:</label>
											<input type="text" class="form-control" id="fixe" name="fixe" value="{{ $garage->fixe }}">
											<p id="fixe_errors" class = "errors text-danger"></p>
										</div>
										<div class="form-group">
											<label class="form-control-label">Fax:</label>
											<input type="text" class="form-control" id="fax" name="fax" value="{{ $garage->fax }}">
											<p id="fax_errors" class = "errors text-danger"></p>
										</div>
										<div class="form-group">
											<label class="form-control-label">Code postal:</label>
											<input type="text" class="form-control" id="code_postal" name="code_postal" value="{{ $garage->code_postal }}">
											<p id="code_postal_errors" class = "errors text-danger"></p>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
									<button type="submit" name="garage_edit_form" class="btn btn-primary">Valider</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!--Modals-->

                <!--App-Content-->
                <div class="app-content">
                    <div class="side-app">
                        <div class="row mt-9">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <div id="profile-log-switch">
                                            <div class="fade show active " >
                                                
                                                <h3 class="mb-5">Garage {{$garage->nom_garage}}</h3>
                                                <div class="table-responsive">
                                                    <table class="table row table-borderless w-100 m-0 ">
                                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                                            <img class="card-profile-img" src="../images/uploads/{{$garage->logo_garage}}" alt="img">
                                                            <tr>
                                                                <td><strong>Nom propriétaire :</strong> {{ $garage->nom }} {{$garage->prenom}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Email :</strong> {{ $garage->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Numéro de téléphone :</strong> {{ $garage->phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fixe :</strong> {{ $garage->fixe }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fax :</strong> {{ $garage->fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Ville :</strong> {{ $garage->ville }}</td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                                            <tr>
                                                                <td><strong>Adresse :</strong> {{ $garage->adresse }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Code Postal :</strong> {{ $garage->code_postal }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>RC :</strong> {{ $garage->rc }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>IF :</strong> {{ $garage->if }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>ICE :</strong> {{ $garage->ice }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button type="button" class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#garage_edit">Editer</button>
                                            </div>
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

		<script type="text/javascript" src="../js/garage.js"></script>

	</body>
</html>