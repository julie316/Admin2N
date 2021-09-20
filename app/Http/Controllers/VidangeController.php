<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vidange;
use App\Vehicule;

class VidangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('update', Vehicule::class);

        $vide = Vidange::all();
        return view('vidanges.index', compact('vide'));
    }

    public function create()
    {
        $this->authorize('update', Vehicule::class);
        
        $vehs = Vehicule::all();
        return view('vidanges.create', compact('vehs'));
    }

    public function store(Request $request)
    {
        $this->authorize('update', Vehicule::class);

        $this->validate($request,[
            'vehicule_id'=> 'required',
            'date_vid'=> 'required',
            'type_huile'=> 'required',
            'km_fixe'=> 'required',
            'km_actuel'=> 'required'
        ]);
        $km_fixe = $request->input('km_fixe');
        $km_actuel = $request->input('km_actuel');
        $km_futur = $km_fixe + $km_actuel;

        $vidange = new Vidange();
        $vidange->vehicule_id = $request->input('vehicule_id');
        $vidange->date_vid = $request->input('date_vid');
        $vidange->type_huile = $request->input('type_huile');
        $vidange->km_fixe = $km_fixe;
        $vidange->km_actuel = $km_actuel;
        $vidange->km_futur = $km_futur;
        $vidange->save();

        return redirect()->route('vidange')->with('success','La vidange a bien été enregistrée');
    }

    public function edit(Vidange $vid_id)
    {
        $this->authorize('update', Vehicule::class);

        $vehs = Vehicule::all();
        return view('vidanges.edit', ['vid'=>$vid_id, 'vehs'=>$vehs]);
    }

    public function update(Vidange $vid_id, Request $request)
    {
        $this->authorize('update', Vehicule::class);

        $this->validate($request,[
            'vehicule_id'=> 'required',
            'date_vid'=> 'required',
            'type_huile'=> 'required',
            'km_fixe'=> 'required',
            'km_actuel'=> 'required'
        ]);
        $km_fixe = $request->input('km_fixe');
        $km_actuel = $request->input('km_actuel');
        $km_futur = $km_fixe + $km_actuel;

        $vid_id->vehicule_id = $request->input('vehicule_id');
        $vid_id->date_vid = $request->input('date_vid');
        $vid_id->type_huile = $request->input('type_huile');
        $vid_id->km_fixe = $km_fixe;
        $vid_id->km_actuel = $km_actuel;
        $vid_id->km_futur = $km_futur;
        $vid_id->update();

        return redirect()->route('vidange')->with('success','La vidange a été modifiée');
    }

    public function destroy(Vidange $vid_id)
    {
        $this->authorize('update', Vehicule::class);

        $vid_id->delete();
        return back()->with('info','La vidange a été supprimée');
    }
}
