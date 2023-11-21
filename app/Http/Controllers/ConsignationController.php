<?php

namespace App\Http\Controllers;

use App\Models\Consignation;
use App\Models\Fournisseur;
use App\Models\TypeEmballage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsignationController extends Controller
{
    /*public function __construct() {
        $this->middleware([
            'auth','role:admin|gerant'
        ]);
    }*/
    /**
     * Display a listing of the resource.
     */
   
        //
    public function index()
    {
        $listconsignations = Consignation::all();
        return view('consignations.index', compact('listconsignations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $listefournisseurs=Fournisseur::all();
        $listemballages=TypeEmballage::all();
        //dd($fournisseurs);
        return view('consignations.create')->with([
        
            "listemballages"=>$listemballages,
            "listefournisseurs"=>$listefournisseurs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dump($request->id_depots);
        $validator = Validator::make($request->all(), [
            'id_type'=> 'required',
            'id_fournisseur'=> 'required',
            'quantite_consigne' => 'required|numeric|min:1',
            

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $consignation = Consignation::create([
            'id_type' => $request->id_type_emballage,
            'id_fournisseur' => $request->id_fournisseur,
            'quantite_consigne' => $request->quantite_consigne,
        ]);
        return redirect()->route('consignations.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Consignation $consignation)
    {
        //
        
        $listefournisseurs=Fournisseur::all();
        $listemballages=TypeEmballage::all();
        return view('consignations.show',compact('consignation'))->with(
            [
                "listemballages"=>$listemballages,
                "listefournisseurs"=>$listefournisseurs,
            ]
        );
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consignation $consignation)
    {
        //
       
        $listefournisseurs=Fournisseur::all();
        $listemballages=TypeEmballage::all();
        return view('consignations.edit',compact('consignation'))->with([
            
            "listemballages"=>$listemballages,
            "listefournisseurs"=>$listefournisseurs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consignation $consignation)
    {
        //s
        $validator = Validator::make($request->all(), [
            'id_type'=> 'required',
            'id_fournisseur'=> 'required',
            'quantite_consigne' => 'required|numeric|min:1',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $consignation->update($request->all());
        return redirect()->route('consignations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consignation $consignation)
    {
        //
        $consignation->delete();
        return redirect()->route('consignations.index');
    }
}
