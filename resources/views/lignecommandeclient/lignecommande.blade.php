<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@extends('layouts.app')
@section('content')
<body>
<div class="container mt-2">
  <form method="get" action="/generateclient/{{$boncommandeclient->id}}">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h4>Lignes de commandes</h4>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
          <a href="{{ url('/boncommandeclient') }}" class="btn btn-secondary" title="retour">
                Retour
          </a>
        </div>
        <div><br><div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewProd" class="btn btn-primary">Ajouter</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Produit</th>
                  <th scope="col">Prix unitaire</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Montant hors taxe</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($boncommandeclient->lignecommandeclients  as $ligne)
                <tr>
                    <td>{{ $ligne->designation }}</td>
                    <td quantity="{{ $ligne->qte }}" class = "price">{{ $ligne->pu }}</td>
                    <td>{{ $ligne->qte }}</td>
                    <td>{{ $ligne->mont_Ht }}</td>
                    <td>
                      <a href="{{ url('/delete_Ligne_commandes/' . $ligne->id . '') }}" class="btn btn-danger delete" ><i class="fe fe-trash" aria-hidden="true"> Supprimer</i></a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success edition" data-id="{{$ligne->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="si si-pencil" aria-hidden="true"> Modifier</i></button>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th>Total Hors Taxe</th>
                  <th>TVA</th>
                  <th>Totale TTC</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td id = "THT"></td>
                    <td id = "TVA"></td>
                    <td id = "TTC"></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-secondary btn-lg ">Voir La Commande</button>    
    <a href='/generateWithEnvoiClient/{{$boncommandeclient->id}}' id="envoimail" class="btn btn-secondary btn-lg ">Envoyer La Commande</a>    
    </div>
  </form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Changer un produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  action="{{'/lignecommandeclient/change'}}" method="POST" class="form-horizontal" >
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="produit" class="col-sm-2 control-label">Produit</label>
            <select class="form-control"  id="produit_id" value="" placeholder="Entrer produit" name="produit_id" required>
              @foreach($produits as $produit)
                <option name="produit_id" value="{{ $produit->id}}" >{{ $produit->designation}} </option>
              @endforeach
            </select>
          </div>
          <input style="display:none" name="ligne_id" id="ligne_id" >
          <div class="form-group">
            <label class="col-sm-2 control-label">Quantité</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="qte" name="qte" placeholder="Entrer quantité" value="" required="">
            </div>
          </div>
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" id="btn-save" >Enregister les chamgements</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<!-- boostrap model -->
    <div class="modal fade" id="ajax-prod-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxProdModel"></h4>
          </div>
          <div class="modal-body">
            <form id="ajout" action="/lignecommandeclient" class="form-horizontal" method="POST">
              @csrf
              <div class="form-group">
                <label for="produit" class="col-sm-2 control-label">Produit</label>
                <select class="form-control"  id="produit_id" value="" placeholder="Entrer produit" name="produit_id" required>
                  @foreach($produits as $produit)
                    <option name="produit" value="{{ $produit->id}}" >{{ $produit->designation}} ({{$produit->quantite}})</option>
                  @endforeach
                </select>
              </div>
              <input style="display:none" name="boncommande_client_id" id="boncommande_client_id" value="{{$boncommandeclient->id}}" >
              <div class="form-group">
                <label class="col-sm-2 control-label">Quantité</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="qte" name="qte" placeholder="Entrer quantité" value="" required="">
                </div>
              </div>
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewProd">Enregistrer </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->

<script type="text/javascript">
    //calcul du THT, TVA et TTC
    function calcul(obj){
      var result = [];
      var S = 0; 
      Array.from(obj).forEach(element => {
        S += parseInt(element.innerHTML)*element.getAttribute('quantity');
      })
      result.push(S);
      result.push(S*(19/100));
      result.push(result[0] + result[1]);
      return result;
    }
    function updateTotales() {
      let objCollection = document.getElementsByClassName('price');
      totales = calcul(objCollection);   
      $("#TVA").text(totales[1]);
      $("#THT").text(totales[0]);
      $("#TTC").text(totales[2]);
    }
    updateTotales();
    $("#ajout").submit(function (e) { 
      updateTotales();
    });
    $('#addNewProd').click(function () {
       $('#ajaxProdModel').html("Ajouter un produit");
       $('#ajax-prod-model').modal('show');
    });
    $(".edition").click(function (e) { 
      e.preventDefault();
      $("#ligne_id").val($(this).attr('data-id'));
      console.log($(this).attr('data-id'));
    });
</script>
@endsection