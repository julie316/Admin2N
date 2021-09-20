    <div class="row">
        <div class="col-lg-12 header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <!-- profile info & task notification -->
                <div class="col-md-6 col-sm-4 clearfix">
                    <ul class="notification-area pull-right">
                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        <li><i class="ti-user" data-toggle="dropdown">  </i>
                            <div class="dropdown-menu">
                                <div class="dropdown-item">
                                    <img class="avatar user-thumb pull-left" src="{{ asset('assets/images/author/avatar3.png') }}" style="width: 60px; height: 50px" alt="avatar">
                                    <h5 >{{ Auth::user()->nom_act }}</h5>
                                    <h7 >{{ Auth::user()->pseudo }}</h7>
                                </div>
                                @can('create', 'App\Acteur')
                                    <a class="dropdown-item" href="{{ route('utilisateur.show_profile', Auth::user()->id) }}"><i class="ti-user"> </i> <span>Profil</span></a>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="ti-power-off"> </i> {{ __('Se Déconnecter') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>               
                    </ul>
                </div>
            </div>
        </div>
    </div>
    