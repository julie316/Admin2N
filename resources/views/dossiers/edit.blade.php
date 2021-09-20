<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modifier un dossier</title>
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
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix m-3">
                            <h4 class="page-title pull-left">Modification d'une Pièce</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route ('dossier')}}">Pièce</a></li>
                                <li><span>Formulaire de modification</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row align-items-center">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card" style="margin-left: 200px">
                                    <div class="card-body">
                                        <h4 class="header-title">Modifier une Pièce</h4>
                                        <form method="POST" action="{{ route('dossier.update', $dossier->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                            <div class="form-row align-items-center">
                                                
                                                <div class="col-md-6 my-3">
                                                    <label>Catégorie</label>
                                                    <select name="categorie" id="" class="form-control p-2">
                                                        @foreach($dossier->getCateOption() as $key=>$value )
                                                            <option value="{{$key}}" {{$dossier->categorie == $value ? 'selected' : ''}}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Libellé de la pièce</label>
                                                    <select name="libelle_dos" id="" class="form-control p-2">
                                                        @foreach($dossier->getLibOption() as $key=>$value )
                                                            <option value="{{$key}}" {{$dossier->libelle_dos == $value ? 'selected' : ''}}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if($dossier->vehicule_id != null)
                                                    <div class="col-md-6 my-3" id="vehicule_id">
                                                        <label>Véhicule</label>
                                                        <select name="vehicule_id" id="" class="form-control p-2">
                                                            <option value="">Sélectionner le véhicule correspondant</option>
                                                            @foreach($vehicule as $veh)
                                                                <option value="{{$veh->id}}" {{$dossier->vehicule_id == $veh->id ? 'selected' : ''}}>{{$veh->marque}} {{$veh->matricule}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                                @if($dossier->type_camion != null)
                                                <div class="col-md-6 my-3">
                                                    <label>Type</label>
                                                    <select name="type_camion" id="" class="form-control p-2">
                                                        @foreach($dossier->getTypeOption() as $key=>$value )
                                                            <option value="{{$key}}" {{$dossier->type_camion == $value ? 'selected' : ''}}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if($dossier->matricule_veh != null)
                                                    <div class="col-md-6 my-3">
                                                        <label>Immatriculation</label>
                                                        <input type="text" class="form-control" name="matricule_veh" value="{{ $dossier->matricule_veh }}">
                                                    </div>
                                                @endif
                                                <div class="col-md-6 my-3">
                                                    <label>Date de souscription</label>
                                                    <input type="date" class="form-control" name="date_souscrip" value="{{ $dossier->date_souscrip }}">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Durée (en mois)</label>
                                                    <input type="number" class="form-control" name="duree" value="{{ $dossier->duree }}" placeholder="Entrer la durée de validité de la pièce">
                                                </div>
                                            </div>
                                            <button type="submit" name="save" class="btn btn-primary mt-4 pr-4 pl-4">Modifier</button>
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
