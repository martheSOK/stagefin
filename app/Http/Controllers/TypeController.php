<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeEmballage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listemballage=TypeEmballage::all();
        return view('emballages.index')->with('listemballage',$listemballage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('emballages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        //

        $request->validate([

            'libelle'=>'required|string|min:3',
            
        ]);

        $emballage=TypeEmballage::create([
            'libelle'=>$request->libelle,
            
             
        ]);
        
        return redirect()->route('emballages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeEmballage $emballage)
    {
        //
        return view('emballages.show',compact('emballage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeEmballage $emballage)
    {
        //
        return view('emballages.edite', compact('emballage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeEmballage $emballage)
    {
        //
        $request->validate([

            'libelle'=>'required|string|min:3',
            
        ]);

        $emballage->update($request->all());
        return redirect()->route('emballages.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeEmballage $emballage)
    {
        //
        $emballage->delete();
        return redirect()->route('emballages.index');

    }
}