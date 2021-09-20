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
        caption{
            font-size: 18px;
            color: #185784;
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
    <h4 class="title"><u> Aperçu des paiements de {{$paie_id->technicien->nom_tech}}</u></h4>
        <table class="text-center">
        <caption> &nbsp;&nbsp;&nbsp;&nbsp; Objet du paiement:&nbsp;&nbsp; {{$paie_id->objet}} 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Montant Initial: &nbsp;&nbsp;{{$paie_id->mont_paie}} FCFA</caption>
                   
            @php($num = 1)
            @foreach($avances as $avance) 
            
                <tr>
                    <td><span> Avance N°{{$num}}: &nbsp;&nbsp;{{$avance->mont_verse}} FCFA</span></td>
                    <td><span> Date de versement: &nbsp;&nbsp;{{$avance->date_verse}}</span></td> 
                    <td><span> Mode de Paiement: &nbsp;&nbsp;{{$avance->mode_paiement}}</span></td>
                </tr>
            @php($num++)
            @endforeach
        </table>
    <!-- footer area start-->
    <footer>
        Page <span class="pagenum"></span>
    </footer>
    <!-- footer area end-->

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
