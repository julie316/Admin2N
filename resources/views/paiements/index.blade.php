<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Paiements</title>
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
                        <h4 class="page-title pull-left"><i class="ti-receipt"></i> Paiements</h4>
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
                                <a href="{{ route('paiement.create')}}" type="button" class="btn btn-outline-primary btn-sm mb-3 pull-right">Nouveau Paiement</a>
                                <h4 class="header-title">Liste des Paiements</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>ID</th>
                                                <th>Noms du technicien</th>
                                                <th>Objet</th>
                                                <th>Montant</th>
                                                <th>Avance</th>
                                                <th>Reste</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php($num = 1)
                                        @foreach($paie as $paies) 
                                            <tr>
                                                <td>{{ $num }}</td>
                                                <td><a href="{{ route('paiement.show', $paies->id) }}">{{ $paies->technicien->nom_tech }}</a></td>
                                                <td>{{ $paies->objet }}</td>
                                                <td>{{ $paies->mont_paie }} FCFA</td>
                                                @foreach($avance as $ava)
                                                @if($paies->id == $ava->paiement_id)
                                                <td>{{ $ava->sum }} FCFA</td>
                                                @php($reste = $paies->mont_paie - $ava->sum)
                                                <td><span style="color: red" >{{$reste}} FCFA</span></td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3">
                                                            <a href="{{ route('paiement.edit_avance', $paies->id) }}" class="btn btn-success btn-xs" title="Effectuer une nouvelle avance" 
                                                                @if($reste == 0) 
                                                                        onclick="return false" data-container="body" data-toggle="popover" data-placement="top" 
                                                                        data-content="Vous ne pouvez plus effectuer de versement car le reste à payer est égal à 0" 
                                                                @endif>
                                                                <i class="fa fa-credit-card"></i>
                                                            </a>
                                                        </li>
                                                @endif
                                                @endforeach
                                                        <li class="mr-3"><a href="{{ route('paiement.edit', $paies->id) }}" class="btn btn-primary btn-xs" title="Modifier un paiement"><i class="fa fa-edit"></i></a></li>
                                                        @can('delete', 'App\Paiement')
                                                            <li>
                                                                <form method="POST" action="{{ route('paiement.destroy', $paies->id)}} ">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-xs" title="Supprimer un paiement"><i class="ti-trash"></i></button>
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
