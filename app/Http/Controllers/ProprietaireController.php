<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proprietaire;
use App\Vehicule;

class ProprietaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('update', Vehicule::class);

        $props = Proprietaire::all();
        return view('proprietaires.index', compact('props'));
    }

    public function create()
    {
        $this->authorize('update', Vehicule::class);

        return view('proprietaires.create');
    }

    public function store(Request $request)
    {
        $this->authorize('update', Vehicule::class);

        $this->validate($request, [
            'nom_prop'=>'required',
            'tel_prop'=>'required|min:9',
            'ville'=>'required',
            'quartier'=>'required'
        ]);

        $prop = new Proprietaire();
        $prop->nom_prop = $request->input('nom_prop');
        $prop->tel_prop = $request->input('tel_prop');
        $prop->tel_num = $request->input('tel_num');
        $prop->email_prop = $request->input('email_prop');
        $prop->ville = $request->input('ville');
        $prop->quartier = $request->input('quartier');
        $prop->save();
        
        return redirect()->route('proprietaire')->with('success','Le nouveau propriétaire a bien été enregistré');
    }

    public function edit(Proprietaire $prop_id)
    {
        $this->authorize('update', Vehicule::class);

        return view('proprietaires.edit', ['prop'=>$prop_id]);
    }

    public function update(Proprietaire $prop_id, Request $request)
    {
        $this->authorize('update', Vehicule::class);

        $this->validate($request, [
            'nom_prop'=>'required',
            'tel_prop'=>'required|min:9',
            'ville'=>'required',
            'quartier'=>'required'
        ]);

        $prop_id->nom_prop = $request->input('nom_prop');
        $prop_id->tel_prop = $request->input('tel_prop');
        $prop_id->tel_num = $request->input('tel_num');
        $prop_id->email_prop = $request->input('email_prop');
        $prop_id->ville = $request->input('ville');
        $prop_id->quartier = $request->input('quartier');
        $prop_id->update();

        return redirect()->route('proprietaire')->with('success','Les données du propriétaire ont été modifiées');
    }

    public function destroy(Proprietaire $prop_id)
    {
        $this->authorize('update', Vehicule::class);

        $prop_id->delete();
        return back()->with('info','Le propriétaire a été supprimé');
    }
}
