<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bilan-Financier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_login.jpg')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <style>
        table{
            border-collapse: collapse;
            margin-left: 18px;
        }
        th,td{
            border: 1px solid;
            padding: 7 30 7 30;
            text-align: center;
        }
        .title{
            font-size: 24px;
            font-family: 'Lato', sans-serif;
            text-align: center;
            text-transform: capitalize;
            margin-bottom: 30px; 
        }
        footer { 
            position: fixed; 
            left: 0px; 
            bottom: -50px; 
            right: 0px; 
            height: 50px;
            float: right;
        }
        footer .pagenum:before { 
            content: counter(page); 
        }
    </style>
</head>

<body> 
    <p style="float: right">{{$today}}</p>
    <div style="text-align: left">
        <img src="{{ asset('assets/images/bg_img.png') }}" alt="" style="width: 200px; height: 150px;">
    </div>
    <h4 class="title"><u> Bilan financier de l'année {{$annee}}</u></h4>
    <table class="text-center">
        <thead class="text-capitalize">
            <tr>
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
                    <td class="table-primary">Janvier</td>
                    @elseif($donnee->mois == 2)
                    <td class="table-primary">Février</td>
                    @elseif($donnee->mois == 3)
                    <td class="table-primary">Mars</td>
                    @elseif($donnee->mois == 4)
                    <td class="table-primary">Avril</td>
                    @elseif($donnee->mois == 5)
                    <td class="table-primary">Mai</td>
                    @elseif($donnee->mois == 6)
                    <td class="table-primary">Juin</td>
                    @elseif($donnee->mois == 7)
                    <td class="table-primary">Juillet</td>
                    @elseif($donnee->mois == 8)
                    <td class="table-primary">Août</td>
                    @elseif($donnee->mois == 9)
                    <td class="table-primary">Septembre</td>
                    @elseif($donnee->mois == 10)
                    <td class="table-primary">Octobre</td>
                    @elseif($donnee->mois == 11)
                    <td class="table-primary">Novembre</td>
                    @elseif($donnee->mois == 12)
                    <td class="table-primary">Décembre</td>
                    @endif
                    <td>{{$donnee->sum}} FCFA</td>
                    @foreach($query as $requete)
                        @if($requete->month == $donnee->mois)
                        <td>{{$requete->total}} FCFA</td>
                        @php($balance = $donnee->sum - $requete->total)
                        <td>{{$balance}} FCFA</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <!-- footer area start-->
    <footer>
        Page <span class="pagenum"></span>
    </footer>
    <!-- footer area end-->

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
