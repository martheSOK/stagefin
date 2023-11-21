<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Depot;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listeachats= Achat::all();
        return view('achats.index', compact('listeachats'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listestocks= Stock::all();
        return view('achats.create', compact('listestocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'quantite_achat' => 'required',
            'quantite_retourne' => 'required',
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $achat = Achat::create([
            'id_stock' => $request->id_stock,
            'quantite_achat' => $request->quantite_achat,
            'quantite_retourne' => $request->quantite_retourne,
            // Ne spécifiez pas de date ici.   
        ]);
        $achat->stocks->quantite_stock=$achat->stocks->quantite_stock+$achat->quantite_achat;
        $stock_menagere=Stock::where('designation','MENAGERE')->first();
        $stock_menagere->quantite_stock=$stock_menagere->quantite_stock-$achat->quantite_retourne;
        //dd($stock_menagere);
        $achat->stocks->save();
        //$stock_menagere->save();
        return redirect()->route('achats.index');
        
    }*/

    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'quantite_achat' => 'required',
        'quantite_retourne' => 'required',
        'id_stock' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $achat = Achat::create([
        'id_stock' => $request->id_stock,
        'quantite_achat' => $request->quantite_achat,
        'quantite_retourne' => $request->quantite_retourne,
        
    ]);

    // Récupération du type d'emballage du dépôt acheteur
    $typeEmballageDepot = $achat->stocks->type_emballages;

    // Ajout de la quantité d'achat au dépôt en fonction du type d'emballage
    $achat->stocks->quantite_stock += $achat->quantite_achat;
    $achat->stocks->save();

    // Soustraction de la quantité de retour au dépôt ménager de même type d'emballage
    $depots=Depot::all();
    $stockMenagere = $depots->stocks->where('id_type',$achat->stocks->id_type)->first()->quantite_stock;

    if ($stockMenagere) {
        $stockMenagere->quantite_stock -= $achat->quantite_retourne;
        $stockMenagere->save();
    }

    return redirect()->route('achats.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Achat $achat)
    {
        //
        $listestocks=Stock::all();
        return view('achats.show' ,compact('achat','listestocks'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achat $achat)
    {
        //
        $listestocks=Stock::all();
        //dd($depot);
        return view('achats.edit' ,compact('achat','listestocks'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achat $achat)
    {
        //
        $validator = Validator::make($request->all(), [
            'quantite_achat' => 'required',
            'quantite_retourne' => 'required',
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $achat-> id_stock = $request->id_stock;
        $achat->quantite_achat = $request->quantite_achat;
        $achat->quantite_retourne = $request->quantite_retourne;
        $achat->save();
        return redirect()->route('achats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achat $achat)
    {
        //
        $achat->delete();
        return redirect()->route('achats.index');
    }
}
