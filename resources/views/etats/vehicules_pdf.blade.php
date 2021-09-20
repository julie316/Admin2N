<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Véhicules</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_login.jpg')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <style>
        table{
            border-collapse: collapse;
        }
        th,td{
            border: 1px solid;
            padding: 5px;
            text-align: center;
        }
        .title{
            font-size: 24px;
            font-family: 'Lato', sans-serif;
            text-align: center;
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
    <div style="text-align: center">
        <img src="{{ asset('assets/images/bg_img.png') }}" alt="" style="width: 200px; height: 150px;">
    </div>
    <h4 class="title"><u> Liste des véhicules de tourisme</u></h4>
        <table class="text-center">
            <thead class="text-capitalize">
                <tr>
                    <th>N°</th>
                    <th>Noms du propriétaire</th>
                    <th>Marque</th>
                    <th>Immatriculation</th>
                    <th>Type</th>
                    <th>Capacité du réservoir</th>
                    <th>Type de carburant</th>
                </tr>
            </thead>
            <tbody>
            @php($num = 1)
            @foreach($vehicule as $veh) 
            
                <tr>
                    <td>{{ $num }}</td>
                    <td>{{ $veh->proprietaire->nom_prop }}</td>
                    <td>{{ $veh->marque }}</td>
                    <td>{{ $veh->matricule }}</td>
                    <td>{{ $veh->type_veh }}</td>
                    <td>{{ $veh->litre_huile }} L</td>
                    <td>{{ $veh->nature_carbur }}</td>
                </tr>
            @php($num++)
            @endforeach
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
