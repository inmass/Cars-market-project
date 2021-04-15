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

				<!--Modals-->
				<form action="{{ route('profile') }}" id="profile_form" method="post">
					@csrf
					<div class="modal fade" id="profile_edit" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="example-Modal3">Editer profile</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label class="form-control-label">Email:</label>
											<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
											@error('email')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
										<div class="form-group">
											<label  class="form-control-label">Telephone:</label>
											<input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
											@error('phone')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
									<button type="submit" name="profile_edit_form" class="btn btn-primary">Valider</button>
								</div>
							</div>
						</div>
					</div>
				</form>

				<form action="" id="password_form" method="post">
					@csrf
					<div class="modal fade" id="password_edit" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="example-Modal3">Changer mot de passe</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label  class="form-control-label">Old password:</label>
											<input type="password" id="old_password" name="old_password" class="form-control" >
											@error('old_password')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
										<div class="form-group">
											<label  class="form-control-label">New password:</label>
											<input type="password" id="new_password" name="new_password" class="form-control" >
											@error('new_password')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
										<div class="form-group">
											<label  class="form-control-label">Confirm new password:</label>
											<input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" >
											@error('new_password_confirmation')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
									<button type="submit" name="password_edit_form" class="btn btn-primary">Valider</button>
								</div>
							</div>
						</div>
					</div>
				</form>

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
											<input type="text" class="form-control" id="nom_garage" name="nom_garage" value="{{ Auth::user()->nom_garage }}">
											@error('nom_garage')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
										<div class="form-group">
											<label  class="form-control-label">Addresse:</label>
											<input type="text" class="form-control" id="adresse" name="adresse" value="{{ Auth::user()->adresse }}">
											@error('adresse')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
										<div class="form-group">
											<label  class="form-control-label">Fixe:</label>
											<input type="text" class="form-control" id="fixe" name="fixe" value="{{ Auth::user()->fixe }}">
											@error('fixe')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
										<div class="form-group">
											<label class="form-control-label">Fax:</label>
											<input type="text" class="form-control" id="fax" name="fax" value="{{ Auth::user()->fax }}">
											@error('fax')
												<p class = "text-danger">{{$message}}</p>
											@enderror
										</div>
										<div class="form-group">
											<label class="form-control-label">Code postal:</label>
											<input type="text" class="form-control" id="code_postal" name="code_postal" value="{{ Auth::user()->code_postal }}">
											@error('code_postal')
												<p>{{$message}}</p>
											@enderror
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
                                            <div class="fade show active mb-7" >
                                                
                                                <h3 class="mb-5">Mon profile</h3>
                                                <div class="table-responsive border">
                                                    <table class="table row table-borderless w-100 m-0 ">
                                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                                            <tr>
                                                                <td><strong>Nom :</strong> {{ Auth::user()->nom }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Prenom :</strong> {{ Auth::user()->prenom }}</td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                                            <tr>
                                                                <td><strong>Email :</strong> {{ Auth::user()->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Telephone :</strong> {{ Auth::user()->phone }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm mt-2 float-right" data-toggle="modal" data-target="#password_edit">Changer Mot de passe ?</button>
                                                <button type="button" class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#profile_edit">Editer</button>
                                            </div>
                                            <div class="fade show active " >
                                                
                                                <h3 class="mb-5">Mon garage</h3>
                                                <div class="table-responsive border">
                                                    <table class="table row table-borderless w-100 m-0 ">
                                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                                            <div class="card card-profile cover-image "  data-image-src="../assets/images/photos/gradient3.jpg">
                                                                <div class="card-body text-left">
                                                                    <img class="card-profile-img" src="../assets/images/users/male/25.jpg" alt="img">
                                                                    <h3 class="mb-1 text-white">{{ Auth::user()->nom_garage }}</h3>
                                                                </div>
                                                            </div>
                                                            <tr>
                                                                <td><strong>Nom garage :</strong> {{ Auth::user()->nom_garage }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fixe :</strong> {{ Auth::user()->fixe }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fax :</strong> {{ Auth::user()->fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Ville :</strong> {{ Auth::user()->ville }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Adresse :</strong> {{ Auth::user()->adresse }}</td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                                            <tr>
                                                                <td><strong>Code Postal :</strong> {{ Auth::user()->code_postal }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>RC :</strong> {{ Auth::user()->rc }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>IF :</strong> {{ Auth::user()->if }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>ICE :</strong> {{ Auth::user()->ice }}</td>
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

		<script type="text/javascript" src="../js/profile.js"></script>

	</body>
</html>