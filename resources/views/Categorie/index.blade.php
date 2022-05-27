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
 
            <div class="col-md-12">
                <div class="card">
                <div><br></div>
                @if ($message = Session :: get ('msg')) 
                    <div class="alert alert-dark">
                    {{$message}}
                    </div>
                @endif
                
                    <div class="card-header"><h4>Catégories</h4></div>
                    <div class="card-body">
                        <a href="{{ url('/categorie/create') }}" class="btn btn-primary" title="Add New categorie">
                            <i class="fe fe-plus" aria-hidden="true"></i> Ajouter un nouveau Catégorie
                        </a>
                        <form action="{{ route('categorieSearch') }}" method="POST" class="example" role="search">
                        @csrf
                            <div class="card-body">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                                <input type="text" name="categories"  placeholder="categories"> 
                                <button type="submit" ><i class="fe fe-search">Chercher</i></button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr class="text-center table-primary">
                                        <th>#</th>
                                        <th>Nom de catégorie</th>
                                        <th>Description</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody class="table-striped text-center">
                                @foreach($categories as $categories)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $categories->nomcat}}</td>
                                        <td>{{ $categories->desccat }}</td>
 
                                        <td>
                                            <a href="{{ url('/categorie/' . $categories->id) }}" title="View Categorie"><button class="btn btn-info"><i class="fe fe-eye" aria-hidden="true"> Consulter</i></button></a>
                                            <a href="{{ url('/categorie/' . $categories->id . '/edit') }}" title="Edit Categorie"><button class="btn btn-success"><i class="si si-pencil" aria-hidden="true"> Modifier</i></button></a>
 
                                            <form method="POST" action="{{ url('/categorie' . '/' . $categories->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" title="Delete categorie" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fe fe-trash" aria-hidden="true"> Supprimer</i></button>
                                            </form>
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