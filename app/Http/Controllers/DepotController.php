<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use Illuminate\Http\Request;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listdepot=Depot::all();
        return view('depots.index',compact('listdepot'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Affichage de la vue de creation d'un depotDa 
        return view('depots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Creation d'une instance d'un depot
        $depot=Depot::create([
            'designation'=>$request->designation,
        ]);
        //echo 'enrégistrement réussi';
        return redirect()->route('depots.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Depot $depot){
        //
        return view('depots.show',compact('depot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depot $depot)
    {
        //
        return view('depots.edit',compact('depot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depot $depot)
    {
        //
        $request->validate([

            'designation' => 'required',
        ]);

        $depot->update($request->all());
        return redirect()->route('depots.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depot $depot)
    {
        //
        $depot->delete();
        return redirect()->route('depots.index');
    }
}
