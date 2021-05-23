<!-- Sidebar menu-->
<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar ">
    <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
            <div>
                <img src="../assets/images/users/male/25.jpg" alt="user-img" class="avatar avatar-lg brround">
            </div>
            <div class="user-info">
                <h2>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h2>
                <span>{{ Auth::user()->nom_garage }}</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        @if (!Auth::user()->super_user)
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard') }}"></i><span class="side-menu__label">Accueil</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"></i><span class="side-menu__label">Profil</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('profile') }}">informations generales</a></li>
                    <li><a class="slide-item" href="{{route('manage_sub')}}">Gestion d'abonnement</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"></i><span class="side-menu__label">Voitures</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('mycars') }}">Mes voitures</a></li>
                    <li><a class="slide-item" href="{{ route('particular_cars') }}">Voitures particulier</a></li>
                    <li><a class="slide-item" href="{{ route('add_car') }}">Ajouter une voiture</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('garage_messages') }}">
                    <span class="side-menu__label">
                        Messages
                        @if (Auth::user()->messages->where('seen', '=', '0')->count())
                            <span class="badge badge-primary">{{Auth::user()->messages->where('seen', '=', '0')->count()}}</span>
                        @endif
                    </span>
                </a>
            </li>
        @else
            <li class="slide">
                <a class="side-menu__item" href="{{ route('super_dashboard') }}"><span class="side-menu__label">Accueil</span></a>
            </li>
            {{-- <li class="slide">
                <a class="side-menu__item" href="#"><span class="side-menu__label">General setting</span></a>
            </li> --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Garages</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('garages_list') }}">Liste des garages</a></li>
                    <li><a class="slide-item" href="{{ route('add_garage') }}">Ajouter garage</a></li>
                    <li><a class="slide-item" href="{{ route('admin_particular_cars') }}">Voitures particulier</a></li>
                </ul>
            </li>
            {{-- <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"></i><span class="side-menu__label">Messages</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="#">Formulaires contact</a></li>
                    <li><a class="slide-item" href="#">Demandes d'adhesion</a></li>
                    <li><a class="slide-item" href="#">Consultation voitures</a></li>
                </ul>
            </li> --}}
		@endif
    </ul>
</aside>
<!--/Sidebar menu-->