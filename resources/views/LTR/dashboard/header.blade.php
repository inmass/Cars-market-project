<!--Header-->
<div class="app-header1 header py-1 d-flex">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="header-brand" href="#">
                LOGO IMG
            </a>
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
            <div class="d-flex order-lg-2 ml-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Se déconnecter') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/Header-->
