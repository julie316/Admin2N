<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Maintenances</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_login.jpg')}}">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('layouts.sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            @include('layouts.header')
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix m-3">
                        <h4 class="page-title pull-left"><i class="ti-settings"></i> Maintenances</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Primary table start -->
                    <div class="col-12 mt-5">
                    @include('layouts.flash_message')
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('maintenance.create')}}" type="button" class="btn btn-outline-primary btn-sm mb-3 pull-right">Nouvelle Maintenance</a>
                                <h4 class="header-title">Liste des Maintenances</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>ID</th>
                                                <th>Noms du Technicien</th>
                                                <th>Véhicule</th>
                                                <th>Type de Maintenance</th>
                                                <th>Libellé</th>
                                                <th>Date de Début</th>
                                                <th>Date de fin</th>
                                                <th>Montant</th>
                                                <th>Observation</th>
                                                <th>Facture</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php($num = 1)
                                        @foreach($mains as $main) 
                                       
                                            <tr>
                                                <td>{{ $num }}</td>
                                                <td>{{ $main->technicien->nom_tech }}</td>
                                                @if($main->vehicule_id != null)
                                                    <td>{{ $main->vehicule->marque }} {{ $main->vehicule->matricule }}</td>
                                                @else
                                                    <td>Pas de Véhicule</td>
                                                @endif
                                                @if($main->type_maint != null)
                                                    <td>{{ $main->type_maint }}</td>
                                                @else
                                                    <td>{{$main->libelle_maint}}</td>
                                                @endif
                                                <td>{{ $main->libelle_maint }}</td>
                                                <td>{{ $main->date_debut }}</td>
                                                <td>{{ $main->date_fin }}</td>
                                                <td>{{ $main->mont_maint }} FCFA</td>
                                                @if($main->observation != null)
                                                    <td>{{ $main->observation }}</td>
                                                @else
                                                    <td>Aucune Observation</td>
                                                @endif
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ route('maintenance.show', $main->id) }}" class="btn btn-info btn-xs" title="Visualiser la facture"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ route('maintenance.edit', $main->id) }}" class="btn btn-primary btn-xs" title="Modifier une maintenance"><i class="fa fa-edit"></i></a></li>
                                                        @can('delete', 'App\Maintenance')
                                                            <li>
                                                                <form method="POST" action="{{ route('maintenance.destroy', $main->id)}} ">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-xs" title="Supprimer une maintenance"><i class="ti-trash"></i></button>
                                                                </form>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </td>
                                            </tr>
                                        @php($num++)
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Primary table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Copyright © 2N CORPORATE 2021. Tous les droits réservés |by<i><b> EJ</b></i>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
