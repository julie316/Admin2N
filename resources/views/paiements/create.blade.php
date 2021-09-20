<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Enregistrer un paiement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                            <h4 class="page-title pull-left">Nouveau Paiement</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route ('paiement')}}">Paiement</a></li>
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
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Enregistrer un Paiement</h4>
                                        <label>Tous les champs possédant l'étoile rouge(<span style="color: red">*</span>) sont obligatoires</label>
                                        <form method="POST" action="{{ route('paiement.store') }}">
                                        @csrf
                                            <div class="form-row align-items-center">
                                                <div class="col-md-6 my-3">
                                                    <label>Noms du Technicien<span style="color: red">*</span></label>
                                                    <select name="technicien_id" id="technicien" class="form-control p-2 @error('technicien_id') is-invalid @enderror">
                                                        <option value="">Sélectionner le nom du technicien</option>
                                                        @foreach($noms as $nom)
                                                            <option value="{{$nom->id}}">{{$nom->nom_tech}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('technicien_id')
                                                    <div class="invalid-feedback">
                                                        Le nom du technicien est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Mode de paiement<span style="color: red">*</span></label>
                                                    <select name="mode_paiement" id="" class="form-control p-2 @error('mode_paiement') is-invalid @enderror">
                                                        <option value="">Sélectionner le mode de paiement</option>
                                                        <option value="1">Orange Money</option>
                                                        <option value="2">Mobile Money (MTN)</option>
                                                        <option value="3">Espèce (Cash)</option>
                                                    </select>
                                                    @error('mode_paiement')
                                                    <div class="invalid-feedback">
                                                        Le mode de paiement est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Objet<span style="color: red">*</span></label>
                                                    <select name="objet" id="objet" class="form-control p-2 @error('objet') is-invalid @enderror">
                                                        <option value="">Sélectionner l'objet du paiement</option>
                                                    </select>
                                                    @error('objet')
                                                    <div class="invalid-feedback">
                                                        L'objet du paiement est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Montant</label>
                                                    <input type="number" class="form-control" name="mont_paie" id="montant" value="" placeholder="Montant à payer" readonly>
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Avance<span style="color: red">*</span></label>
                                                    <input type="number" class="form-control @error('mont_verse') is-invalid @enderror" name="mont_verse" placeholder="Entrer le montant versé">
                                                    @error('mont_verse')
                                                    <div class="invalid-feedback">
                                                        Le montant versé est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Date de paiement<span style="color: red">*</span></label>
                                                    <input type="date" class="form-control @error('date_paie') is-invalid @enderror" name="date_paie" placeholder="Sélectionner la date de versement">
                                                    @error('date_paie')
                                                    <div class="invalid-feedback">
                                                        La date est requise
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" name="save" id="save" class="btn btn-primary btn-sm mt-4 pr-4 pl-4">Enregistrer</button>
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
    <script>
        $(document).ready(function(){
            $("#technicien").on("change",function(){
                var tech = $(this).children("option:selected").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('paiement.loadObjet') }}",
                    type: "POST",
                    data : {val: tech},
                    dataType: "json",
                    success: function(data){
                        
                    }
                }).done(function(data) {
                    // Charger les données dans la liste déroulante Objet
                    $.each(data[0], function(value,index) { 
                        $('#objet').append($('<option>', {value:index, text:index})); 
                    });
                });
            });

            $("#objet").on("change",function(){
                var lib = $(this).children("option:selected").text();
                var tech = $("#technicien").children("option:selected").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('paiement.loadMontant') }}",
                    type: "POST",
                    data : {val: lib, id:tech},
                    dataType: "json",
                    success: function(data){
                    }
                }).done(function(data) {
                    // Afficher le montant à payer
                    $.each(data[0], function(value,index) { 
                        $("#montant").attr("value", index);
                    });
                    var mont = $("#montant").attr("value");
                });
            });
        });
    </script>
</body>

</html>
