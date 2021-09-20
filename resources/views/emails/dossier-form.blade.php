<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renouvellement des dossiers</title>
<!--     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    
    -->
    <style>
        body{
            font-family: "Arial";
        }
    </style>
</head>
<body>
    <div >
        <div class="card">
            <div class="card-header">
            <h3>MESSAGE D'ALERTE </h3>
            </div>
            <div class="card-body">
            @foreach($query as $quer)
                <p>La pièce <b> {{$quer->libelle_dos}} </b> du dossier <b>{{$quer->categorie}} {{$quer->matricule_veh}}</b> expire dans une (01) semaine. 
                Pensez à la renouveller avant sa date d'expiration.</p>
                <p>Date de souscription : {{$quer->date_souscrip}}</p>
                <p>Durée de validité: {{$quer->duree}} mois</p>
                <p>Date d'expiration : <span style="color: red">{{$quer->date_expire}}</span></p>
            @endforeach
            </div>
        </div>
    </div>
</body>
</html>