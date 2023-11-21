<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $listfournisseur = Fournisseur::all();
        return view('fournisseurs.index')->with('listfournisseur',$listfournisseur);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_fournisseur' => 'required|string|min:3|max:255',
            'adresse' => 'required|string|max:255',
           
            
        ]);


        $rules = [
            'contact' => 'required|custom_contact_rule|unique:fournisseurs',
        ];
        
        $messages = [
            'custom_contact_rule' => 'Le contact est invalide.',
        ];
        
    $validator = Validator::make($request->all() ,$rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
          //
        $fournisseur=Fournisseur::create([
            'nom_fournisseur'=>$request->nom_fournisseur,
            'contact'=>$request->contact,
            'adresse'=>$request->adresse,  
        ]);
        
        return redirect()->route('fournisseurs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        //
        return view('fournisseurs.show',compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
        return view('fournisseurs.edit',compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
        
        $validator = Validator::make($request->all(), [
            'nom_fournisseur' => 'required|string|min:3|max:255',
            
            'adresse' => 'required|string|max:255',
                            
        ]);
        $rules = [
            'contact' => 'required|custom_contact_rule|unique:fournisseurs',
        ];
        
        $messages = [
            'custom_contact_rule' => 'Le contact incorrect.',
        ];
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fournisseur->update($request->all());
        return redirect()->route('fournisseurs.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
        $fournisseur->delete();
        return redirect()->route('fournisseurs.index');
 
    }
}
