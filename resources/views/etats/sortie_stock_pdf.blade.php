<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_login.jpg')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <title>Inventaire du stock</title>
    <style>
        table{
            border-collapse: collapse;
        }
        .tables{

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
    <p style="float: right">{{$today}}</p>
    <div style="text-align: left">
        <img src="{{ asset('assets/images/bg_img.png') }}" alt="" style="width: 200px; height: 150px;">
    </div>
    <h4 class="title"><u>Inventaire du stock de sortie</u></h4>
    <div class="tables">
        <table class="text-center">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Désignation</th>
                        <th>Quantité Sortie</th>
                        <th>Bénéficiaire</th>
                        <th>Date de Sortie</th>
                        <th>Quantité en Stock</th>
                    </tr>
                </thead>
                <tbody>
                @php($num = 1)
                @foreach($sorties as $sortie) 
                
                    <tr>
                        <td>{{ $num }}</td>
                        <td>{{ $sortie->stock->libelle_stock}}</td>
                        <td>{{ $sortie->qte_sortie }}</td>
                        <td>{{ $sortie->destinataire }}</td>
                        <td>{{ $sortie->date_sortie_stock }}</td>
                        <td>{{ $sortie->stock->qte_reste}}</td>
                    </tr>
                @php($num++)
                @endforeach
                </tbody>
            </table>
    </div>
        
    <!-- footer area start-->
    <footer>
        Page <span class="pagenum"></span>
    </footer>
    <!-- footer area end-->

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>