<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modifier un utilisateur</title>
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
                            <h4 class="page-title pull-left">Modification d'un Utilisateur</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route ('utilisateur')}}">Utilisateur</a></li>
                                <li><span>Formulaire de modification</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <!-- basic form start -->
                            <div class="col-12 mt-5" style="margin-left: 220px">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Modifier un Utilisateur</h4>
                                        <form method="POST" action="{{ route('utilisateur.update', $user->id) }}">
                                        @csrf
                                        @method('PATCH')
                                            <div class="form-row align-items-center">
                                                <div class="col-md-6 my-3">
                                                    <label>Noms</label>
                                                    <input type="text" class="form-control" name="nom_act" value="{{ $user->nom_act }}" placeholder="Entrer le nom de l'utilisateur">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Prénoms</label>
                                                    <input type="text" class="form-control" name="prenom_act" value="{{ $user->prenom_act }}" placeholder="Entrer le prénom de l'utilisateur">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Téléphone</label>
                                                    <input type="number" class="form-control @error('tel_cat') is-invalid @enderror" name="tel_act" value="{{ $user->tel_act }}" placeholder="Entrer le numéro de téléphone">
                                                    @error('tel_cat')
                                                    <div class="invalid-feedback">
                                                        Le numéro de téléphone est requis et doit être de 9 chiffres
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email_act" value="{{ $user->email_act }}" placeholder="Entrer l'adresse email">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Pseudo</label>
                                                    <input type="text" class="form-control" name="pseudo" value="{{ $user->pseudo }}" placeholder="Entrer le pseudo">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Rôle</label>
                                                    <select name="role" id="" class="form-control p-2">
                                                        @foreach($user->getRoleOption() as $key=>$value)
                                                        <option value="{{$key}}" {{$user->role == $value ? 'selected' : ''}}>{{$value}}</option>
                                                        @endforeach
                                                    </select>    
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Nouveau mot de passe<span style="color: red">*</span></label>
                                                    <input type="password" class="form-control @error('mot_passe') is-invalid @enderror" name="mot_passe" placeholder="Entrer le nouveau mot de passe">
                                                    @error('mot_passe')
                                                    <div class="invalid-feedback">
                                                        Le nouveau mot de passe est requis et doit être de 4 caractères mininmun
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label>Confirmer le nouveau mot de passe<span style="color: red">*</span></label>
                                                    <input type="password" class="form-control @error('mot_passe_confirmation') is-invalid @enderror" name="mot_passe_confirmation" placeholder="Confirmer le nouveau mot de passe">
                                                    @error('mot_passe_confirmation')
                                                    <div class="invalid-feedback">
                                                        Le mot de passe de confirmation est requis et doit être de 4 caractères mininmun
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
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
