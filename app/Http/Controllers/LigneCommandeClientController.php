<?php

namespace App\Http\Controllers;

use App\Models\BoncommandeClient;
use App\Models\Client;
use App\Models\lignecommandeclient;
use Illuminate\Http\Request;
use App\Models\Produit;

class LigneCommandeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $produit = Produit::find($input['produit_id']);
        $input['designation'] = $produit['designation'];
        $input['pu'] = $produit['prix'];
        $input['mont_Ht']= $input['pu']*$input['qte'];
        if (($produit['quantite']-$input['qte'])<0){
            return back()->with('msgfail', 'La quantité est superieur a la quantité en stock!!');
        }
        lignecommandeclient::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $boncommandeclient = BoncommandeClient::find($id);
        $produits = Produit::all();
        //dd($boncommandeclient->client);
        $client = Client::find($boncommandeclient['client_id']);
        return view('lignecommandeclient.lignecommande', compact('boncommandeclient'),compact('produits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lignecommandeclient = lignecommandeclient::find($id);
        $produits=Produit::all();
        return view('lignecommandeclient.edit' , compact('produits'),compact('lignecommandeclient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lignecommandeclient = lignecommandeclient ::find($id); // produit  est le nom de model
        $input = $request->all();
        $produit=Produit::find($input['produit_id']);
        $input['designation'] = $produit['designation'];
        $input['pu'] = $produit['prix'];
        $input['mont_Ht']= $input['pu']*$input['qte'];
        if (($produit['quantite']-$input['qte'])<0){
            return back()->with('msgfail', 'La quantité est superieur a la quantité en stock!!');
        }
        $lignecommandeclient->update($input);
        return redirect('/lignecommandeclient/'.$lignecommandeclient->Boncommande_client_id)->with('msgmod', 'Lignes de commandes modifié !!');  //cette fonction faire la modification ajouter dans la tabel puis redirection au page index
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        lignecommandeclient::where('id',$request->id)->delete();
        return back()->with('msg','ligne à supprimer');
    }
}
