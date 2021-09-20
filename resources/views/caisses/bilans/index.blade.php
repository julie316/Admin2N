<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bilan Financier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                        <h4 class="page-title pull-left"><i class="fa fa-line-chart"></i> Bilan Financier</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Primary table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('bilan.print')}}" method="get">
                                    <button class="btn btn-outline-secondary btn-sm mb-3 pull-right" formtarget="_blank"><i class="fa fa-print"></i> Imprimer</button>
                                    <input type="hidden" name="year" id="input" value="">
                                </form>
                                <form action="{{ route('bilan.table')}}" id="form" method="GET">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mr-3 mb-3 pull-right"><i class="fa fa-file-text"></i> Afficher</button>
                                    <div class="col-sm-2 pull-right">
                                        <select name="annee" id="year" class="form-control p-2">
                                            <option value="">Sélectionnez une année</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                </form>
                                
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-secondary text-uppercase">
                                            <tr class="text-white">
                                            <th scope="col">Mois</th>
                                            <th scope="col">Entrées</th>
                                            <th scope="col">Dépenses</th>
                                            <th scope="col">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($data) && !empty($query))
                                            @foreach($data as $donnee)
                                                
                                                <tr>
                                                    @if($donnee->mois == 1)
                                                    <td class="table-primary text-uppercase">Janvier</td>
                                                    @elseif($donnee->mois == 2)
                                                    <td class="table-primary text-uppercase">Février</td>
                                                    @elseif($donnee->mois == 3)
                                                    <td class="table-primary text-uppercase">Mars</td>
                                                    @elseif($donnee->mois == 4)
                                                    <td class="table-primary text-uppercase">Avril</td>
                                                    @elseif($donnee->mois == 5)
                                                    <td class="table-primary text-uppercase">Mai</td>
                                                    @elseif($donnee->mois == 6)
                                                    <td class="table-primary text-uppercase">Juin</td>
                                                    @elseif($donnee->mois == 7)
                                                    <td class="table-primary text-uppercase">Juillet</td>
                                                    @elseif($donnee->mois == 8)
                                                    <td class="table-primary text-uppercase">Août</td>
                                                    @elseif($donnee->mois == 9)
                                                    <td class="table-primary text-uppercase">Septembre</td>
                                                    @elseif($donnee->mois == 10)
                                                    <td class="table-primary text-uppercase">Octobre</td>
                                                    @elseif($donnee->mois == 11)
                                                    <td class="table-primary text-uppercase">Novembre</td>
                                                    @elseif($donnee->mois == 12)
                                                    <td class="table-primary text-uppercase">Décembre</td>
                                                    @endif
                                                    <td>{{$donnee->sum}} FCFA</td>
                                                    @foreach($query as $requete)
                                                        @if($requete->month == $donnee->mois)
                                                        <td>{{$requete->total}} FCFA</td>
                                                        @php($balance = $donnee->sum - $requete->total)
                                                        <td><span style="color: #007bff">{{$balance}} FCFA</span></td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        @endif
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#year").on("change", function(){  // s'activer lorsqu'on change la valeur d'un élément dans le select  
                select = document.getElementById('year');
                choix = select.selectedIndex;
                value = select.options[choix].text;
                document.getElementById('input').value = value;
            });
        });
    </script>
</body>

</html>
