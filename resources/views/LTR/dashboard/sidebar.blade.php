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
        <li class="slide">
            <a class="side-menu__item" href="{{ route('dashboard') }}"></i><span class="side-menu__label">Dashboard</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"></i><span class="side-menu__label">Profile</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="#">informations personnelles</a></li>
                <li><a class="slide-item" href="#">informations garage</a></li>
                <li><a class="slide-item" href="#">Gestion de compte</a></li>
                <li><a class="slide-item" href="#">Gestion d'abonnement</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"></i><span class="side-menu__label">Voitures</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('mycars') }}">Mes voitures</a></li>
                <li><a class="slide-item" href="#">Ajouter une voiture</a></li>
                <li><a class="slide-item" href="#">Voitures particulier</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="#"></i><span class="side-menu__label">Messages</span></a>
        </li>
    </ul>
</aside>
<!--/Sidebar menu-->