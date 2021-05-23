<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('LTR/dashboard/base')

		<!-- Title -->
		<title>Ajouter garage</title>
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

				<div class="app-content  my-3 my-md-5">
					<div class="side-app">

						<div class="row mt-9">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
                                    <div class="card-body">
										<form id="add_garage_form" method="POST" enctype="multipart/form-data">
                                            @csrf
											<div class="form-row">
												<div class="form-group col-md-6">
													<div class="form-group">
														<label class="form-label" for="nom">Nom du propriétaire</label>
														<input type="text" class="form-control" name="nom" id="nom"  placeholder="Nom">
                                                        <p id="nom_errors" class = "errors text-danger"></p>
                                                    </div>
												</div>
												<div class="form-group col-md-6">
													<div class="form-group">
														<label class="form-label" for="prenom">Prénom du propriétaire</label>
														<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                                                        <p id="prenom_errors" class = "errors text-danger"></p>
                                                    </div>
												</div>
												<div class="form-group col-md-6">
													<label for="email" class="col-form-label">Email</label>
													<input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                    <p id="email_errors" class = "errors text-danger"></p>
                                                </div>
												<div class="form-group col-md-6">
                                                    <label for="phone" class="col-form-label">Téléphone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Téléphone">
                                                    <p id="phone_errors" class = "errors text-danger"></p>
												</div>
                                                <div class="form-group col-md-6">
                                                    <label for="password" class="col-form-label">Mot de passe</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                                    <p id="password_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password" class="col-form-label">Confirmation mot de passe</label>
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmation mot de passe">
                                                    <p id="password_confirmation_errors" class = "errors text-danger"></p>
                                                </div>
											</div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="nom_garage" class="col-form-label">Nom du garage</label>
                                                    <input type="nom_garage" class="form-control" id="nom_garage" name="nom_garage" placeholder="Nom du garage">
                                                    <p id="nom_garage_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="logo_garage">Logo du garage</label>
                                                    <div class="custom-file">
                                                        <label class="custom-file-label mb-0">Choose files</label>
                                                        <input type="file" class="custom-file-input" id="logo_garage" name="logo_garage" accept="image/*">
                                                    </div>
                                                    <div class="m-0" id="chosen_files"></div>
                                                    <p id="logo_garage_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="fixe" class="col-form-label">Fixe</label>
                                                    <input type="fixe" class="form-control" id="fixe" name="fixe" placeholder="Fixe">
                                                    <p id="fixe_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="fax" class="col-form-label">Fax</label>
                                                    <input type="fax" class="form-control" id="fax" name="fax" placeholder="Fax">
                                                    <p id="fax_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ville" class="col-form-label">Ville</label>
                                                    <input type="ville" class="form-control" id="ville" name="ville" placeholder="Ville">
                                                    <p id="ville_errors" class = "errors text-danger"></p>
                                                </div>
											</div>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label class="col-form-label">Adresse</label>
                                                    <textarea class="form-control" name="adresse" id="adresse" rows="4" placeholder="Adresse"></textarea>
                                                    <p id="adresse_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="code_postal" class="col-form-label">Code postal</label>
                                                    <input type="code_postal" class="form-control" id="code_postal" name="code_postal" placeholder="Code postal">
                                                    <p id="code_postal_errors" class = "errors text-danger"></p>
                                                </div>
                                            </div>
											<div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="rc" class="col-form-label">RC</label>
                                                    <input type="rc" class="form-control" id="rc" name="rc" placeholder="RC">
                                                    <p id="rc_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="if" class="col-form-label">IF</label>
                                                    <input type="if" class="form-control" id="if" name="if" placeholder="IF">
                                                    <p id="if_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ice" class="col-form-label">ICE</label>
                                                    <input type="ice" class="form-control" id="ice" name="ice" placeholder="ICE">
                                                    <p id="ice_errors" class = "errors text-danger"></p>
                                                </div>
											</div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="pack_id">pack d'abonnement</label>
                                                    <select class="required form-control select" name="pack_id" id="pack_id">
                                                        <option value="" disabled selected></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4 </option>
                                                    </select>
                                                    <p id="pack_id_errors" class = "errors text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="pack_end_date">Valide jusqu'au</label>
                                                    <input class="form-control" name="pack_end_date" id="pack_end_date" type="date" placeholder="">
                                                    <p id="pack_end_date_errors" class = "errors text-danger"></p>
                                                </div>
                                            </div>
											<button type="submit" class="btn btn-primary ">Confirmer</button>
										</form>
									</div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			@include('LTR/dashboard/footer')

		</div>
		<!--/Page-->

		@include('LTR/dashboard/scripts')
        <script>
            var redirect_url = "{{ route('garages_list') }}";
        </script>
        <script src="../js/add_garage.js"></script>

	</body>
</html>