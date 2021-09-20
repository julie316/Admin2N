<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Enregistrer un dossier</title>
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
                            <h4 class="page-title pull-left">Nouvelle Pièce</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route ('dossier')}}">Pièce</a></li>
                                <li><span>Formulaire d'enregistrement</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5" style="position: center">
                                <div class="card" style="margin-left: 200px">
                                    <div class="card-body">
                                        <h4 class="header-title">Enregistrer une Pièce</h4>
                                        <label>Tous les champs possédant l'étoile rouge(<span style="color: red">*</span>) sont obligatoires</label>
                                        <form method="POST" action="{{ route('dossier.store') }}" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-6 my-3">
                                                    <label>Catégorie<span style="color: red">*</span></label>
                                                    <select name="categorie" id="" class="form-control p-2 @error('categorie') is-invalid @enderror">
                                                        <option value="">Sélectionner la catégorie de la pièce</option>
                                                        <option value="1">Administration</option>
                                                        <option value="2">Camion</option>
                                                        <option value="3">Véhicule de Tourisme</option>
                                                    </select>
                                                    @error('categorie')
                                                    <div class="invalid-feedback">
                                                        La catégorie est requise
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label>Libellé de la pièce<span style="color: red">*</span></label>
                                                    <select name="libelle_dos" id="" class="form-control p-2 @error('libelle_dos') is-invalid @enderror">
                                                        <option value="">Sélectionner le libellé correspondant</option>
                                                        <option value="1">Assurance</option>
                                                        <option value="2">Attestation de Non-Redevance</option>
                                                        <option value="3">Carte Bleu</option>
                                                        <option value="4">Carte de Contribuable</option>
                                                        <option value="5">Carte Grise</option>
                                                        <option value="6">Licence Transport</option>
                                                        <option value="7">Plan de Localisation</option>
                                                        <option value="8">Registre de Commerce</option>
                                                        <option value="9">Stationnement</option>
                                                        <option value="10">Taxe Foncière</option>
                                                        <option value="11">Taxe à l'Essieu</option>
                                                        <option value="12">Visite Technique</option>
                                                    </select>
                                                     @error('libelle_dos')
                                                    <div class="invalid-feedback">
                                                        Le libellé de la pièce est requis
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3" id="vehicule_id">
                                                    <label>Véhicule</label>
                                                    <select name="vehicule_id" id="" class="form-control p-2">
                                                        <option value="">Sélectionner le véhicule correspondant</option>
                                                        @foreach($vehicule as $veh)
                                                            <option value="{{$veh->id}}">{{$veh->marque}} {{$veh->matricule}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 my-3" id="type_camion">
                                                    <label>Type</label>
                                                    <select name="type_camion" id="" class="form-control p-2">
                                                        <option value="">Sélectionner le type correspondant</option>
                                                            <option value="0">Remorque</option>
                                                            <option value="1">Tracteur</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 my-3" id="matricule_veh">
                                                    <label>Immatriculation du Camion</label>
                                                    <input type="text" class="form-control" name="matricule_veh" placeholder="Entrer l'immatriculation du camion">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Date de souscription<span style="color: red">*</span></label>
                                                    <input type="date" class="form-control @error('date_souscrip') is-invalid @enderror" name="date_souscrip">
                                                     @error('date_souscrip')
                                                    <div class="invalid-feedback">
                                                        La date est requise
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Durée (en mois)<span style="color: red">*</span></label>
                                                    <input type="number" class="form-control @error('duree') is-invalid @enderror" name="duree" placeholder="Entrer la durée de validation de la pièce">
                                                     @error('duree')
                                                    <div class="invalid-feedback">
                                                        La durée de validité est requise
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <div class="custom-file" style="margin-top: 32px">
                                                        <input type="file" name="document" class="custom-file-input @error('document') is-invalid @enderror">
                                                        <label class="custom-file-label">Choisir un fichier PDF<span style="color: red">*</span></label>
                                                        @error('document')
                                                        <div class="invalid-feedback">
                                                            Le fichier PDF est requis
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="save" class="btn btn-primary mt-4 pr-4 pl-4">Enregistrer</button>
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

    <!-- fonction permettant d'afficher et de cacher le champ immatriculation -->
    <script>
        $(document).ready(function() {
            // on cache les champ par défaut
            $('#matricule_veh').hide(); 
            $('#vehicule_id').hide(); 
            $('#type_camion').hide();

            $('select[name="categorie"]').change(function() { // lorsqu'on change de valeur dans la liste
            var valeur = $(this).val(); // valeur sélectionnée
            
                if(valeur != '') { // si non vide
                    if(valeur == '3') { // si valeur = 3
                        $('#vehicule_id').show();
                    } else {
                        $('#vehicule_id').hide();           
                    }

                    if(valeur == '2') { // si valeur = 2
                        $('#matricule_veh').show();
                        $('#type_camion').show();
                    } else {
                        $('#matricule_veh').hide();    
                        $('#type_camion').hide();       
                    }
                }
            });

        });
    </script>
</body>

</html>
