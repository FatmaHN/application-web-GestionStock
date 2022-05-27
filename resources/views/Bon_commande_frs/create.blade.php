@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ajouter une commande fournisseur</h3>
            </div>
            <div class="card-body">
                <form id="submission" class="row g-2 needs-validation"  action="{{ url('/bon_commande_frs') }}" method="post" >
                    @csrf
                    <div class="my-3 row">
                        <div class="col">
                            <label for="desc" class="form-label">Description</label>
                            <input type="text" name="desc" id="desc" class="form-control" required></br>
                           <!--  <input type="text" name="desc" id="desc" class="form-control "  required>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="col">
                            <label for="fournisseur_id" class="form-label">Fournisseur</label>
                            <select class="form-control @error('fournisseur_id') is-invalid @enderror" id="fournisseur_id" name="fournisseur_id" required="">
                                @foreach($fournisseurs as $fournisseur)
                                        value="{"{$fournisseur->id}}"
                                    <option value="{{$fournisseur->id}}" >{{$fournisseur->id}} - {{ $fournisseur->nom_prenom }}</option>
                                @endforeach
                            </select>
                            @error('fournisseur_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="my-3 row">
                        <div class="col">
                            <label for="dat_com" class="form-label">Date de création</label>
                            <input type="date" name="dat_com" id="dat_com" class="form-control @error('dat_com') is-invalid @enderror" required>
                            @error('dat_com')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="col">
                            <label for="dat_exp" class="form-label">Date d'expiration</label>
                            <input type="date" name="dat_exp" id="dat_exp" class="form-control @error('dat_exp') is-invalid @enderror" required="">
                            @error('dat_exp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div id="err" style="display:none" class="text-center mb-2 invalid-feedback">S'il vous plait choisissez des dates valides</div>
                    <button class="btn btn-primary" type="submit">Ajouter un bon de commande</button>          
                </form>
            </div>
        </div>
	</div>
 </div>
 <script>
         $(document).ready(function () {
             const prud ="La durée entre les deux dates doit etre au maximum 20 jours !";
             // To compare arrays directly
             const equals = (a,b) => JSON.stringify(a) === JSON.stringify(b)
             // To format date and month 
             function conversionArray(array){
                 nouveauTab = []
                 array.forEach(element =>{
                     nouveauTab.push(parseInt(element));
                 });
                 return nouveauTab; 
             };           
             const currentDate = new Date();
             const currentDay = currentDate.getUTCDate();
             const currentMonth = (currentDate.getMonth() + 1); // He count from 0
             const currentYear = currentDate.getFullYear();

             console.log($("#dat_com").val());
             var actualDate = [currentYear,currentMonth,currentDay]   
             $("#alert").hide();
             $("#dat_com").click(function (e) { 
                 e.preventDefault();
                 $("#err").hide();
             });
             $("#dat_exp").click(function (e) { 
                 e.preventDefault();
                 $("#err").hide();
             });
             //tester la durée entre la date de confirmation et la date d'expiration
             $("#submission").submit(function (e) {
                 e.preventDefault();
                 var form_url = $(this).attr('action');
                 var form_method = $(this).attr('method');
                 var form_data = $(this).serialize();
                 var date_exp = $("#dat_exp").val().split('-');
                 var date_com = $("#dat_com").val().split('-');
                 console.log(equals(conversionArray(date_com),actualDate));
                 var con1 = date_com[0] == date_exp[0];
                 var diff = date_exp[1] - date_com[1]
                 var con2 = diff < 2 && diff >= 0;
                 if (date_com.length == 1 || date_exp.length == 1 || !con1 || !con2 || !equals(conversionArray(date_com),actualDate)) {
                     $("#err").show();
                     return 
                 }
                 if ((diff == 0 && (dat_exp[2]-date_com[2]) > 20) || (diff == 1 && (date_exp[2] - date_com[2] + 30 ) > 20) ) {
                     $("#err").text(prud);
                     $("#err").show();
                     return
                 }
                 $.ajax({
                     url : form_url,
                     type: form_method,
                     data: form_data
                 }).done(function(response){
                     window.location.href ='/bon_commande_frs';
                 })
             });
         });
    </script>
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush
@endsection