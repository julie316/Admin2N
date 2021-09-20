    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="nav-btn pull-right">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="logo">
                <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/sidebar_lg.png')}}" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="active"><a href="{{ route('dashboard') }}"><i class="ti-dashboard"></i><span>Tableau de Bord</span></a></li>
                        @can('update', 'App\EntreeCaisse')
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-money"></i>
                                    <span>Caisse</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('entree_caisse') }}">Entrées</a></li>
                                    <li><a href="{{ route('sortie_caisse') }}">Sorties</a></li>
                                    <li><a href="{{ route('bilan') }}">Bilan</a></li>
                                </ul>
                            </li>
                        @endcan

                        @can('update', 'App\Vehicule')
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-car"></i>
                                    <span>Véhicules</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('vehicule') }}">Véhicules</a></li>
                                    <li><a href="{{ route('proprietaire') }}">Propriétaires</a></li>
                                    <li><a href="{{ route('vidange') }}">Vidanges Moteur</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('view', 'App\EntreeStock')
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cubes"></i>
                                    <span>Stock</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('entree_stock') }}">Entrées</a></li>
                                    <li><a href="{{ route('sortie_stock') }}">Sorties</a></li>
                                </ul>
                            </li>
                        @endcan

                        @can('view', 'App\Technicien')
                            <li><a href="{{ route('technicien') }}"><i class="ti-id-badge"></i> <span>Techniciens</span></a></li>
                        @endcan

                        @can('view', 'App\Maintenance')
                            <li><a href="{{ route('maintenance') }}"><i class="ti-settings"></i> <span>Maintenances</span></a></li>
                        @endcan
                        <li><a href="{{ route('paiement') }}"><i class="ti-receipt"></i> <span>Paiements</span></a></li>
                        
                        @can('view', 'App\dossier')
                            <li><a href="{{ route('dossier') }}"><i class="ti-folder"></i> <span>Dossiers Administratifs et des Véhicules</span></a></li>
                        @endcan

                        @can('view', 'App\Rubrique')
                            <li><a href="{{ route('rubrique') }}"><i class="ti-folder"></i> <span>Rubriques</span></a></li>
                        @endcan

                        @can('create', 'App\Acteur')
                            <li><a href="{{ route('utilisateur') }}"><i class="ti-user"></i> <span>Utilisateurs</span></a></li>
                        @endcan    
                    </ul>
                </nav>
            </div>
        </div>
    </div>