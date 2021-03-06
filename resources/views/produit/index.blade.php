@extends('layouts.app')
@section('content')
<style>
* {
  box-sizing: border-box;
  
}

/* Style the search field */
form.example input[type=text] {
  
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  floats: left;
  width: 20%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  floats: left;
  width: 10%;
  padding: 10px;
  background: #6211c8;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
    <div class="container">
        <div class="row">
        
            <div class="col-md-100">
                <div class="card">
                    <div class="card-header"><h4>Produits</h4></div>
                        @if ($message = Session :: get ('msgsup')) 
                            <div class="alert alert-success">
                            {{$message}}
                            </div>
                        @endif
                        @if ($message = Session :: get ('msgmod')) 
                            <div class="alert  alert-success">
                            {{$message}}
                            </div>
                        @endif
                        @if ($message = Session :: get ('msgfail')) 
                            <div class="alert  alert-danger">
                            {{$message}}
                            </div>
                        @endif
                        @if ($message = Session :: get ('msgajt')) 
                            <div class="alert alert-success">
                            {{$message}}
                            </div>
                        @endif
                        @if ($message = Session :: get ('message')) 
                            <div class="alert alert-dark">
                            {{$message}}
                            </div>
                        @endif
                    <div class="card-body">
                        <a href="{{ url('/produit/create') }}" class="btn btn-primary" title="Add New produit">
                            <i class="fe fe-plus" aria-hidden="true"></i> Ajouter un nouveau Produit
                        </a>
                        <form action="{{ route('produitSearch') }}" method="POST" class="example" role="search">
                        @csrf
                        <div class="card-body">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="produits" placeholder="Designation, Marque, Prix..."> 
                            <button type="submit" ><i class="fe fe-search">Chercher</i></button>
                        </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr class="text-center table-primary">
                                        <th>#</th>
                                        <th>Designation</th>
                                        <th>Prix</th>
                                        <th>Quantit??</th>
                                        <th>Marque</th>
                                        <th>Categorie</th>
                                        <th>Action</th> 
                                        <th>Disponibilit??</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-striped text-center">
                                    
                                @foreach($produits as $produit)   <!-- $produits est le variables qui se trouve dans la fonction index dans le contr??leur-->
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $produit->designation }}</td>
                                        <td>{{ $produit->prix }} dt</td>
                                        <td>{{ $produit->quantite }}</td>
                                        <td>{{ $produit->marque }}</td>
                                        <td>{{ $produit->categorie->nomcat }}</td> 
                                        <td>
                                            <a href="{{ url('/produit/' . $produit->id) }}" title="Consuler produit"><button class="btn btn-info"><i class="fe fe-eye" aria-hidden="true"> Consulter</i> </button></a>
                                            <a href="{{ url('/produit/' . $produit->id . '/edit') }}" title="Modifier produit"><button class="btn btn-success"><i class="si si-pencil" aria-hidden="true"> Modifier</i> </button></a>
 
                                            <form method="POST" action="{{ url('/produit' . '/' . $produit->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" title="Supprimer produit" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fe fe-trash" aria-hidden="true"> Supprimer</i> </button>
                                            </form>
                                        </td>
                                        <td>
                                             @if($produit->quantite<=5)
                                                <span class="badge  rounded-pill bg-danger">Out Of Stock</span>
                                            @else()
                                                <span class="badge  rounded-pill bg-success">On Stock</span>                                        
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection