<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dossiers</title>
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
                        <h4 class="page-title pull-left"><i class="ti-folder"></i> Pièces</h4>
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
                                <a href="{{ route('dossier.create')}}" type="button" class="btn btn-outline-primary btn-sm mb-3 pull-right">Nouvelle Pièce</a>
                                <h4 class="header-title">Liste des Pièces</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>ID</th>
                                                <th>Catégorie</th>
                                                <th>Véhicule</th>
                                                <th>Libellé</th>
                                                <th>Date de Souscription</th>
                                                <th>Durée</th>
                                                <th>Date d'Expiration</th>
                                                <th>Document</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php($num = 1)
                                        @foreach($dossier as $dossiers) 
                                       
                                            <tr>
                                                <td>{{ $num }}</td>
                                                <td>{{ $dossiers->categorie }}</td>
                                                @if($dossiers->vehicule_id != null)
                                                    <td>{{ $dossiers->vehicule->marque }} ({{ $dossiers->vehicule->matricule }})</td>
                                                @elseif($dossiers->matricule_veh != null)
                                                    <td>{{$dossiers->type_camion}} ({{$dossiers->matricule_veh}})</td>
                                                @else
                                                    <td> </td>
                                                @endif
                                                <td>{{ $dossiers->libelle_dos }}</td>
                                                <td>{{ $dossiers->date_souscrip }}</td>
                                                <td>{{ $dossiers->duree }} mois</td>
                                                <td>{{ $dossiers->date_expire }}</td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ route('dossier.show', $dossiers->id) }}" class="btn btn-info btn-xs" title="Visualiser le document"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ route('dossier.edit', $dossiers->id) }}" class="btn btn-primary btn-xs" title="Modifier une pièce"><i class="fa fa-edit"></i></a></li>
                                                        @can('delete', 'App\Dossier')
                                                            <li>
                                                                <form method="POST" action="{{ route('dossier.destroy', $dossiers->id)}} ">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-xs" title="Supprimer une pièce"><i class="ti-trash"></i></button>
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
