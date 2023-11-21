<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listclient=Client::all();
        return view('clients.index')->with('listclient',$listclient);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha|min:3|max:255',
            'prenom' => 'required|alpha|min:3|max:255',
            'adresse'=> 'required|string|max:255',
            
        ]);
        $rules = [
            'contact' => 'required|custom_contact_rule|unique:clients',
        ];
        
        $messages = [
            'custom_contact_rule' => 'Le contact est invalide.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //Creation d'une instance de resta
        $client=Client::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'contact'=>$request->contact,
            'adresse'=>$request->adresse,
            
        ]);
        //echo 'enrégistrement réussi';
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //

        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $validator = Validator::make($request->all(), [

            'nom' => 'required|alpha|min:3|max:255',
            'prenom' => 'required|alpha|min:3|max:255',
            'adresse'=> 'required|string|max:255',
            
        ]);
        $rules = [
            'contact' => 'required|custom_contact_rule|unique:clients',
        ];
        
        $messages = [
            'custom_contact_rule' => 'Le contact incorrect.',
        ];
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $client->update($request->all());
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        return redirect()->route('clients.index');
    }
}
