<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\BonCommandeFrs;
use App\Models\Fournisseur;
use App\Models\Produit;

class LigneCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ligne_commandes['lignes_commandes'] = LigneCommande::orderBy('id','desc')->paginate(4);
        return view('Ligne Commande/LigneCommande',$ligne_commandes);
    }
    public function show($id)
    {
        $bon_commande_frs = BonCommandeFrs::find($id);
        $produits = Produit::all();
        return view('Ligne Commande/LigneCommande', compact('bon_commande_frs'),compact('produits'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input = $request->all();
        $produit = Produit ::find($input['produit_id']);
        $input['designation'] = $produit['designation'];
        $input['pu'] = $produit['prix'];
        $input['mont_Ht']= $input['pu']*$input['qte'];
        LigneCommande::create($input);
        return back();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {   
        $input = $request->all();
        $LigneCommandeTable = LigneCommande::find($input['ligne_id']); 
        $ValidateInput = [];
        foreach ($input as $key => $value) {
            if ($value != null) {
                $ValidateInput[$key] = $value;
            };
        }
        $nouvelleProduit = Produit::find($input['produit_id']);
        $ValidateInput['designation'] = $nouvelleProduit->designation;
        $ValidateInput['pu'] = $nouvelleProduit->prix;
        $ValidateInput['mont_Ht'] = $nouvelleProduit->prix * $input['qte']; 
        $LigneCommandeTable->update($ValidateInput);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        LigneCommande::where('id',$request->id)->delete();
        return back();
    }
}