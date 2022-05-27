

@extends('layouts.app') <!-- Nom de dossier qui contients les vues et le nom de fichier layout -->
@section('content') 
  <div class="card">
    <div class="mt-5 p-3 fs-3 mx-5 bg-secondary">
      <div class=" text-center">
        Détails Pour Notre Fournisseur
      </div>
    </div>
  </div>
  <div class="mx-2 row">
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Code de Fournisseur
          </div>
          <div class="card-body"> 
            <h5 class="card-title">{{ $fournisseurs->id}}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Nom De Fournisseur
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $fournisseurs->nom_prenom}}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Adresse
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $fournisseurs->adresse }}</h5>
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
            <h5 class="card-title">{{ $fournisseurs->num_tel }}</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center">
          <div class="fs-6 text-primary card-header">
            Compte Gmail
          </div>
          <div class="card-body">
            <h5 class="card-title" >{{ $fournisseurs->email }}</h5>
          </div>
        </div>
      </div>
  </div>
@endsection