<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use App\Models\Stock;
use App\Models\Fournisseur;
use App\Models\TypeEmballage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    /*public function __construct() {
        $this->middleware([
            'auth','role:admin|gerant'
        ]);
    }*/
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        //
        $listestoks=Stock::all();
        //dd($listestoks);
        return view('stocks.index')->with("listestoks",$listestoks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $depots=Depot::all();
        $fournisseurs=Fournisseur::all();
        $typemballages=TypeEmballage::all();
        //dd($fournisseurs);
        return view('stocks.create')->with([
            "depots"=>$depots,
            "typemballages"=>$typemballages,
            "fournisseurs"=>$fournisseurs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'quantite_stock' => ['required', 'numeric', 'min:0'],
             'id_depot' => 'required',
             'id_type' => 'required',
             'id_fournisseur' => 'required',
         ]);
     
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
     
         // Vérifier si un stock existe avec le même type d'emballage
         $existingStock = Stock::where('id_type', $request->id_type)
             ->where('id_depot', $request->id_depot)->first();
             //->where('id_fournisseur', $request->id_fournisseur);
     
         if ($existingStock) {
             // Mettre à jour la quantité du stock existant en ajoutant la nouvelle quantité
             $existingStock->quantite_stock += $request->quantite_stock;
             $existingStock->save();
         } else {
             // Créer un nouveau stock
            $stock = Stock::create([
                 'id_depot' => $request->id_depot,
                 'id_type' => $request->id_type,
                 'id_fournisseur' => $request->id_fournisseur,
                 'quantite_stock' => $request->quantite_stock,
            ]);
            //$stock->fournisseurs()->attach($request->id_fournisseur);
         }
     
         return redirect()->route('stocks.index');
     }
     

    //  public function store(Request $request)
    //  {
    //     $validator = Validator::make($request->all(), [
    //          'quantite_stock' => ['required', 'numeric', 'min:0'],
    //          'id_depot' => 'required',
    //          'id_type' => 'required',
    //          'id_fournisseur' => 'required',
    //      ]);
     
    //      if ($validator->fails()) {
    //          return redirect()->back()->withErrors($validator)->withInput();
    //      }
     
    //      // Vérifier si un stock existe avec le même type d'emballage
    //     $existingStock = Stock::where('id_type', $request->id_type)
    //          ->where('id_depot', $request->id_depot)
                //->where('id_fournisseur', $request->id_fournisseur)->first();;
     
    //     if ($existingStock) {
    //          // Mettre à jour la quantité du stock existant en ajoutant la nouvelle quantité
    //          $existingStock->quantite_stock += $request->quantite_stock;
    //          $existingStock->save();}
    //     else {
    //          // Créer un nouveau stock
    //          $stock = Stock::create([
    //              'id_depot' => $request->id_depot,
    //              'id_type' => $request->id_type,
    //              'id_fournisseur'=>$request->id_fournisseur,
    //              'quantite_stock' => $request->quantite_stock,
    //          ]);
    //          $stock->fournisseurs()->attach($request->id_fournisseur);
    //      }
     
    //      return redirect()->route('stocks.index');
    //  }
     

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
        $depots=Depot::all();
        $fournisseurs=Fournisseur::all();
        $typemballages=TypeEmballage::all();
        return view('stocks.show',compact('stock'))->with(
            [
                "depots"=>$depots,
                "typemballages"=>$typemballages,
                "fournisseurs"=>$fournisseurs,
            ]
        );
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
        $depots=Depot::all();
        $fournisseurs=Fournisseur::all();
        $typemballages=TypeEmballage::all();
        return view('stocks.edit',compact('stock'))->with([
            "depots"=>$depots,
            "typemballages"=>$typemballages,
            "fournisseurs"=>$fournisseurs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
        $validator = Validator::make($request->all(), [
            'quantite_stock' => ['required', 'numeric', 'min:0'],
            'id_depot' => 'required',
            'id_type' => 'required',
            'id_fournisseur' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $stock->fournisseurs()->detach($request->id_fournisseur);
        $stock->fournisseurs()->attach($request->id_fournisseur);
        $stock->update($request->all());
        return redirect()->route('stocks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
        $stock->delete();
        return redirect()->route('stocks.index');
    }
}
