@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>Commande fournisseur</h4></div>
                        @if ($message = Session :: get ('msg')) 
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    <div class="text-center card-body">
                        <a href="{{ url('/bon_commande_frs/create') }}" class="text-center fs-5 btn btn-success btn-sm" title="Ajouter une commande">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            Créer une nouvelle commande fournisseur
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>Description </th>
                                        <th>Date de création</th>
                                        <th>Date d'expiration</th>
                                        <th>statut</th>                                  
                                        <th>Fournisseur</th>                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-striped">
                                @foreach($bon_commande_frs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>{{ $item->dat_com }}</td>
                                        <td>{{ $item->dat_exp }}</td>
                                        <td><h5><span id="{{$item->id}}" class="badge rounded-pill text-dark">{{$item->statut}}</span></h5></td>
                                        <td>{{ $item->fournisseur->nom_prenom }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="m-1 col">
                                                    <a href="{{ url('/bon_commande_frs/' . $item->id) }}" >
                                                        <button class="btn btn-info btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                            </svg>
                                                            Consulter
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="m-1 col">
                                                    <a href="{{ url('/Lignes_commandes/' . $item->id) }}">
                                                        <button class="px-4 btn btn-primary btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                                              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                                            </svg> 
                                                            Suivre
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="m-1 col">
                                                    <a href="{{ url('/bon_commande_frs/' . $item->id . '/edit') }}">
                                                        <button class="px-3 btn btn-primary btn-sm"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                            </svg>
                                                            Modifier
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="m-1 col">
                                                    <form method="POST" action="{{ url('/bon_commande_frs' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Commande" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg> 
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
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
    <script>
        $(document).ready(function () {
            const colorState = {
                'Envoyée' : 'bg-warning',
                'Acceptée' : 'bg-success',
                'En préparation' : 'bg-primary',
                'Refusée': 'bg-danger'};

            var state = $('.badge');
            $.each(state, function (indexInArray, valueOfElement) { 
                var id= valueOfElement['id']
                var data = $('#'+id).text();
                $('#'+id).addClass(colorState[data]);
            });
            console.log(typeof(state));
            $('#status').addClass(className);     
        });
    </script>
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush
@endsection