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
        $fournisseur = Fournisseur::find($bon_commande_frs['fournisseur_id']);
        // dd($bon_commande_frs->lignes_commandes[0]->produit);
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
        if (($produit['quantite']-$input['qte'])<0){
            return back()->with('msgfail', 'La quantité est superieur a la quantité en stock!!');
        }
        LigneCommande::create($input);
        return back();
    }
    // public function store(Request $request)
    // {
        // $req = $request->all();
        // Input::create($req);
        // return redirect('/add/'.$req["produit_id"]);
    // }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ligne_commande = LigneCommande::find($id);
        $produits=Produit::all();
        return view('Ligne Commande/edit' , compact('produits'),compact('ligne_commande'));
    }
    public function update(Request $request, $id)
    {
        $ligne_commande = LigneCommande ::find($id); // produit  est le nom de model
        $input = $request->all();
        $produit=Produit::find($input['produit_id']);
        $input['designation'] = $produit['designation'];
        $input['pu'] = $produit['prix'];
        $input['mont_Ht']= $input['pu']*$input['qte'];
        $ligne_commande->update($input);
        return redirect('/Lignes_commandes/'.$ligne_commande->bon_commande_frs_id)->with('msgmod', 'Lignes de commandes modifié !!');  //cette fonction faire la modification ajouter dans la tabel puis redirection au page index
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