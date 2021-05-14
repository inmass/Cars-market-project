<!doctype html>
<html lang="en" dir="ltr">
	<head>
        @include('LTR/dashboard/base')
		<!-- Title -->
		<title>Gestion d'abonnement</title>
        <style>
            .row{
                display: flex;
                align-items: baseline;
            }
            p{
                margin-bottom: 0;
                margin-left: 12px !important;
            }
        </style>
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
                    <div class="side-app">
                        <div class="row mt-9">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <div id="owned">
                                            <h3>Vous êtes inscrit au pack numéro {{Auth::user()->pack->id}}</h3>
                                            <hr>
                                            <h4 class="mb-5 text-red">détails du pack:</h4>
                                            <div id="infos" class="ml-3">
                                                <div class="row">
                                                    <div id="pt1" class="col-sm">
                                                        <div class="row">
                                                            <h6><u>Boutique En Ligne</u>  :</h6>
                                                            @if (Auth::user()->pack->boutique_en_ligne)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Espace de gestion boutique</u>  :</h6>
                                                            @if (Auth::user()->pack->espace_de_gestion_boutique)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Table de bord boutique</u>  :</h6>
                                                            @if (Auth::user()->pack->table_de_bord_boutique)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Pages descriptifs de la boutique</u>  :</h6>
                                                            @if (Auth::user()->pack->pages_descriptifs_de_la_boutique)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Nombre de voitures</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->nombre_de_voitures}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Accès aux annonces des particuliers</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->acces_aux_annonce_particuliers}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Position GPS de la boutique</u>  :</h6>
                                                            @if (Auth::user()->pack->position_gps)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Bannière sur le site web</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->bannieres}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Charte visuel de la boutique</u>  :</h6>
                                                            @if (Auth::user()->pack->charte_visuel)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Email pro</u>  :</h6>
                                                            @if (Auth::user()->pack->email_pro)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Gestion des commandes</u>  :</h6>
                                                            @if (Auth::user()->pack->gestion_des_commandes)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Service d'acceuil téléphonique</u>  :</h6>
                                                            @if (Auth::user()->pack->service_acceuil_telephonique)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Transfert des leads vers Showroom</u>  :</h6>
                                                            @if (Auth::user()->pack->transfert_des_leads_vers_showroom)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Partage de la liste des leads</u>  :</h6>
                                                            @if (Auth::user()->pack->partage_de_la_liste_des_leads)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div id="pt2" class="col-sm">
                                                        <div class="row">
                                                            <h6><u>Prise des photos des voitures</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->prise_des_photos_des_voitures}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Production des vidéos promotionnelles</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->videos_promo}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Impression des fiches techniques</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->fiches_techniques}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Assistance technique par Phone/Whatsapp</u>  :</h6>
                                                            @if (Auth::user()->pack->assistnace)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Conseil et Accompagnement</u>  :</h6>
                                                            @if (Auth::user()->pack->conseil_et_accompagnement)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Création de l'identité visuelle</u>  :</h6>
                                                            @if (Auth::user()->pack->identite_visuelle)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Flag publicitaire 3m</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->flag}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Cartes Visites Pro</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->cartes}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Diffusion votre pub sur R.S par mois</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->pub_rs}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Interviews dans les Showroom</u>  :</h6>
                                                            <strong><p class="text-green" style="margin-left:5px;">{{Auth::user()->pack->interviews_showroom}}</p></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Insertion du logo sur les flyers</u>  :</h6>
                                                            @if (Auth::user()->pack->logo_flyers)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Insertion du logo sur la page d'accueil</u>  :</h6>
                                                            @if (Auth::user()->pack->logo_acceuil)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <h6><u>Insertion du logo sur Panneaux d'affichage</u>  :</h6>
                                                            @if (Auth::user()->pack->logo_panneau)
                                                                <div class="ml-3"><i class="fa fa-check text-green mr-2 "></i>Oui</div>
                                                            @else
                                                                <div class="ml-3"><i class="fa fa-close text-red mr-2 "></i>Non</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h4 class="mb-5">Vous voulez changer de pack d'abonnement ?</h4>
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