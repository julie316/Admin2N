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
            margin-left: 13%;
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
    @if($val == 1)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Autres"</em></u></h4>
    @elseif($val == 2)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Electricité"</em></u></h4>
    @elseif($val == 3)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Electroménager"</em></u></h4>
    @elseif($val == 4)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Informatique"</em></u></h4>
    @elseif($val == 5)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Luminaires"</em></u></h4>
    @elseif($val == 6)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Maçonnerie"</em></u></h4>
    @elseif($val == 7)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Matériel de Bureau"</em></u></h4>
    @elseif($val == 8)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Matériel Entretien"</em></u></h4>
    @elseif($val == 9)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Peinture"</em></u></h4>
    @elseif($val == 10)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Pièce Camion"</em></u></h4>
    @elseif($val == 11)
    <h4 class="title"><u> Inventaire du stock d'entrée - Catégorie: <em> "Plomberie"</em></u></h4>
    @endif
    <div class="tables">
        <table class="text-center">
                <thead class="text-capitalize">
                    <tr>
                        <th>N°</th>
                        <th>Désignation</th>
                        <th>Quantité Entrée</th>
                        <th>Date dernière entrée</th>
                        <th>Quantité en Stock</th>
                    </tr>
                </thead>
                <tbody>
                @php($num = 1)
                @foreach($stocks as $stock) 
                
                    <tr>
                        <td>{{ $num }}</td>
                        <td>{{ $stock->libelle_stock}}</td>
                        <td>{{ $stock->qte_stock }}</td>
                        <td>{{ $stock->date_entree_st }}</td>
                        @if($stock->qte_reste == '0')
                            <td><span style="color: #dc3545">{{ $stock->qte_reste }}</span></td>
                        @endif
                        @if($stock->qte_reste != null)
                            <td>{{ $stock->qte_reste }}</td>
                        @endif
                        @if(is_null($stock->qte_reste))
                            <td>{{ $stock->qte_stock }}</td>
                        @endif
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