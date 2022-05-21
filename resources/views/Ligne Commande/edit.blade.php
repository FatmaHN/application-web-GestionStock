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
<div class="card">
  <div class="card-header">Modifier Le Ligne De Commande</div>
  <div class="card-body">
      
      <form action="{{ url('/Ligne_commandes/edit/' .$ligne_commande->id) }}" method="post"> <!-- url est le direction aprés le remplissage de formulaire -->
        {!! csrf_field() !!}
        @method("PATCH")
        @csrf
        <input type="hidden" name="id" id="id" value="{{$ligne_commande->designation	}}" id="id" /> <!-- $produits "produits nom de table " -->
        <div class="form-group">
            <label for="produit" class="col-sm-2 control-label">Produit</label>
            <select class="form-control"  id="produit_id" value="" placeholder="Entrer produit" name="produit_id" required>
                @foreach($produits as $produit)
                    <option name="produit" value="{{ $produit->id}}" >{{ $produit->designation}} </option>
                @endforeach
            </select>
        </div>
        <label>Quantité</label></br>
        <input type="text" name="qte" id="qte" value="{{$ligne_commande->qte	}}" class="form-control"></br>
        <input type="submit" value="Modifier" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop