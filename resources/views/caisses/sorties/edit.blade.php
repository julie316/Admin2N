<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modifier une sortie</title>
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
                            <h4 class="page-title pull-left">Modification d'une Sortie de Caisse</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route ('sortie_caisse.liste')}}">Sortie-Caisse</a></li>
                                <li><span>Formulaire d'enregistrement</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5" style="margin-left: 220px">
                            @include('layouts.flash_message')
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Modifier une sortie de caisse</h4>
                                        <form method="POST" action="{{ route('sortie_caisse.update', $sort->id) }}">
                                        @csrf
                                        @method('PATCH')
                                            <div class="form-row align-items-center">
                                                <div class="col-md-6 my-3">
                                                    <label>Rubrique</label>
                                                    <select name="rubrique_id" id="" class="form-control p-2">
                                                        <option value="">Sélectionner une rubrique</option>
                                                        @foreach($rubs as $rub)
                                                            <option value="{{$rub->id}}" {{$sort->rubrique_id == $rub->id ? 'selected' : ''}}>{{$rub->libelle_rub}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Objet de la sortie</label>
                                                    <input type="text" class="form-control" name="libelle_sort_cais" value="{{$sort->libelle_sort_cais}}" placeholder="Entrer l'objet de la sortie">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Décaissé par</label>
                                                    <input type="text" class="form-control" name="beneficiaire" value="{{$sort->beneficiaire}}" placeholder="Entrer le nom de la personne qui décaisse">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Date de Sortie</label>
                                                    <input type="date" class="form-control" name="date_sort_cais" value="{{$sort->date_sort_cais}}">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Montant</label>
                                                    <input type="number" class="form-control" name="mont_sort" value="{{$sort->mont_sort}}" placeholder="Entrer le montant de la sortie">
                                                </div>
                                            </div>
                                            <input type="hidden" name="acteur_id" value="{{ Auth::user()->id}}">
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
