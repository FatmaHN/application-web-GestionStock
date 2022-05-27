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
        // dd($boncommandeclient->lignecommandeclients);
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $LigneCommandeTable = lignecommandeclient::find($input['ligne_id']); 
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lignecommandeclient::destroy($id);
        return back();
    }
}