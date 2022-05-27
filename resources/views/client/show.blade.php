



@extends('layouts.app') <!-- Nom de dossier qui contients les vues et le nom de fichier layout -->
@section('content') 
  <div class="card">
    <div class="mt-5 p-3 fs-3 mx-5 bg-secondary">
      <div class=" text-center">
        Détails Pour Notre Client
      </div>
    </div>
  </div>
  <div class="mx-2 row">
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Code de Client
          </div>
          <div class="card-body"> 
            <h5 class="card-title">{{ $clients->id}}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Nom De Client
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $clients->Nom_Prenom}}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Adresse
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $clients->adresse_cli }}</h5>
          </div>
        </div>
      </div>
  </div>
  <div class="row mx-2">
  <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Numéro de Téléphone
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $clients->num_tel }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Compte Gmail
          </div>
          <div class="card-body">
            <h5 class="card-title" >{{ $clients->email_cli  }}</h5>
          </div>
        </div>
      </div>
  </div>
@endsection