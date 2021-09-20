<!--     
<div class="col-lg-4 pull-right">
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you successfully read this important alert message.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
</div>     -->

<style type="text/css">
      .bg-custom{
      background-color:#343942;
      color: white;
      }
      .button-fixed{
      bottom: 10px;
      position: fixed;
      right: 0;
      border-radius: 4px;
      }
      .fas{
      cursor: pointer;
      font-size: 24px;
      }
      p{
      font-size: 14px;
      }
    </style>
    @foreach($alert as $alerte)
        <div class="row">
            <div class="col-md-4 col-sm-12 button-fixed">
                <div class="p-3 pb-4 bg-custom">
                    <div class="row">
                        <div class="col-md-10">
                            <h4><i class="fa fa-exclamation-triangle"></i> Message d'alerte</h4>
                        </div>
                        <div class="col-2 text-center">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <br>
                    <p style="color: white">
                        La pièce {{$alerte->libelle_dos}} du dossier {{$alerte->categorie}} expire dans une (01) semaine. Veuillez la renouvellez avant son expiration.
                    </p>
                    <button type="button" class="btn btn-info w-10" style="margin-left: 44%">OK</button>
                </div>
            </div>
        </div>
    @endforeach