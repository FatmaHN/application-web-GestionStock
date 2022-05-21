<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@extends('layouts.app')
@section('content')
@if ($message = Session :: get ('msgfail')) 
                            <div class="alert  alert-danger">
                            {{$message}}
                            </div>
                        @endif
                        @if ($message = Session :: get ('msgmod')) 
                            <div class="alert  alert-success">
                            {{$message}}
                            </div>
                        @endif
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
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewProd" class="btn btn-primary">Ajouter</button>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        <div class="col-md-12">
            <table class="table table-hover table-striped ">
              <thead>
                <tr class="text-center table-primary">
                  <th scope="col">Produit</th>
                  <th scope="col">Prix unitaire</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Montant hors taxe</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="table-striped"> 
                @foreach ($boncommandeclient->lignecommandeclients  as $ligne)
                <tr class="text-center">
                    

                    <td>{{ $ligne->designation }}</td>
                    <td quantity="{{ $ligne->qte }}" class = "price">{{ $ligne->pu }}</td>
                    <td>{{ $ligne->qte }}</td>
                    <td>{{ $ligne->mont_Ht }}</td>
                    <td>
                      <!--<a href="{{ url('/lignecommandeclient/' . $ligne->id . '/edit') }}" class="btn btn-success edit" data-id="{{ $ligne->id }}"><i class="si si-pencil" aria-hidden="true"> Modifier</i></a> --> 
                      
                      <a href="{{ url('/lignecommandeclient/' . $ligne->id . '') }}" class="btn btn-danger delete" ><i class="fe fe-trash" aria-hidden="true"> Supprimer</i></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <thead class="text-center">
                <tr>
                  <th></th>
                  <th>Total Hors Taxe</th>
                  <th>TVA</th>
                  <th> % De Fidelité</th>
                  <th>Totale TTC</th>
                 <!--  <th></th>
                  <th></th> -->
                </tr>
              </thead>
                <tbody class="text-center">
                  <tr>
                    <!-- <td></td>
                    <td></td> -->
                    <td></td>
                    <td id = "THT"></td>
                    <td id = "TVA"></td>
                    @if ($boncommandeclient->client['type_de_client']=='fidele')
                      <td >10%</td>
                      <td id = "TTF"></td>
                      @else 
                      <td >0%</td>
                      <td id = "TTC"></td>
                    @endif
                    
                    
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    
   
    <div class="text-center">
    <button type="submit" class="btn-secondary btn-lg">Voir La Commande</button>&nbsp;
   
    <a href='/generateWithEnvoiClient/{{$boncommandeclient->id}}' id="envoimail" class="btn btn-secondary btn-lg">Envoyer La Commande</a>    
    </div>
  </form>
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
                    <option name="produit" value="{{ $produit->id}}" >{{ $produit->designation}}</option>
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
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewProd">Enregister</button>
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
    const  baseUrl = '/Ligne_commandes/'; 
    $('.editCommandLigne').click(function (e) {
      e.preventDefault();
       var idEdit =   $(this).attr('data-id');
       var fullUrl = baseUrl + idEdit;
       $('#edit').attr("action",fullUrl);
       console.log(fullUrl);
       console.log($('#edit').attr("action"));
       $('#ajaxLigneModel').html("Ajouter un nouveau produit");
       $('#ajax-ligne-model').modal('show');
    });
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
      result.push((result[0] + result[1])*(9/10));
      return result;
    }
    function updateTotales() {
      let objCollection = document.getElementsByClassName('price');
      totales = calcul(objCollection);   
      $("#TVA").text(totales[1]);
      $("#THT").text(totales[0]);
      $("#TTC").text(totales[2]);
      $("#TTF").text(totales[3]);
    }
    updateTotales();
    $("#ajout").submit(function (e) { 
      updateTotales();
    });
    $('#addNewProd').click(function () {
       $('#ajaxProdModel').html("Ajouter un nouveau produit");
       $('#ajax-prod-model').modal('show');
    });
</script>
@endsection