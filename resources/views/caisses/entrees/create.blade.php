<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Enregistrer une entrée en caisse</title>
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
                            <h4 class="page-title pull-left">Nouvelle Entrée en caisse</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route ('entree_caisse')}}">Entrée-Caisse</a></li>
                                <li><span>Formulaire d'enregistrement</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5" style="margin-left: 300px">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Enregistrer une entrée en caisse</h4>
                                        <label>Tous les champs possédant l'étoile rouge(<span style="color: red">*</span>) sont obligatoires</label>
                                        <form method="POST" action="{{ route('entree_caisse.store') }}">
                                        @csrf
                                            <div class="form-row align-items-center">
                                                <div class="col-md-12 my-3">
                                                    <label>Dépositaire<span style="color: red">*</span></label>
                                                    <input type="text" class="form-control @error('depositaire') is-invalid @enderror" name="depositaire" placeholder="Entrer le nom de la personne qui fait le dépôt">
                                                     @error('depositaire')
                                                    <div class="invalid-feedback">
                                                        Le nom du dépositaire est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>Motif<span style="color: red">*</span></label>
                                                    <input type="text" class="form-control @error('libelle_ent_cais') is-invalid @enderror" name="libelle_ent_cais" placeholder="Entrer le motif">
                                                     @error('libelle_ent_cais')
                                                    <div class="invalid-feedback">
                                                        Le motif est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>Montant Déposé<span style="color: red">*</span></label>
                                                    <input type="number" class="form-control @error('mont_ent') is-invalid @enderror" name="mont_ent" placaholder="Entrer le montant à déposer">
                                                     @error('mont_ent')
                                                    <div class="invalid-feedback">
                                                        Le montant est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>Date de dépôt<span style="color: red">*</span></label>
                                                    <input type="date" class="form-control @error('date_ent_cais') is-invalid @enderror" name="date_ent_cais">
                                                     @error('date_ent_cais')
                                                    <div class="invalid-feedback">
                                                        La date est requise
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" name="acteur_id" value="{{ Auth::user()->id }}">
                                            <button type="submit" name="save" class="btn btn-primary btn-sm mt-4 pr-4 pl-4">Enregistrer</button>
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