<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modifier une entrée en caisse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_login.jpg')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!-- preloader area start -->
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
                    <div class="col-sm-8">
                        <div class="breadcrumbs-area clearfix m-3">
                            <h4 class="page-title pull-left">Modification d'une entrée en caisse</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route ('entree_caisse.liste')}}">Entrée-Caisse</a></li>
                                <li><span>Formulaire de modification</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <!-- basic form start -->
                            <div class="col-12 mt-5" style="margin-left: 300px">
                            @include('layouts.flash_message')
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Modifier une entrée en caisse</h4>
                                        <form method="POST" action="{{ route('entree_caisse.update', $ent->id) }}">
                                        @csrf
                                        @method('PATCH')
                                            <div class="form-row align-items-center">
                                                <div class="col-md-12 my-3">
                                                    <label>Dépositaire</label>
                                                    <input type="text" class="form-control" name="depositaire" value="{{ $ent->depositaire }}" placeholder="Entrer le nom du dépositaire">
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>Motif</label>
                                                    <input type="text" class="form-control" name="libelle_ent_cais" value="{{ $ent->libelle_ent_cais }}" placeholder="Entrer le libellé">
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>Montant Déposé</label>
                                                    <input type="number" class="form-control" name="mont_ent" value="{{$ent->mont_ent}}" placaholder="Entrer le montant à déposer">
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>Date de dépôt</label>
                                                    <input type="date" class="form-control" name="date_ent_cais" value="{{$ent->date_ent_cais}}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="acteur_id" value="{{Auth::user()->id}}">
                                            <button type="submit" name="save" class="btn btn-primary btn-sm mt-4 pr-4 pl-4">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                        </div>
                    </div>
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
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- others plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>
