<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maintenance;
use App\Technicien;
use App\Vehicule;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', Maintenance::class);

        $mains = Maintenance::all();
        return view('maintenances.index', compact('mains'));
    }

    public function show(Maintenance $maint_id)
    {
        $this->authorize('view', Maintenance::class);

        return view('maintenances.show', ['maint'=>$maint_id]);
    }

    public function create()
    {
        $this->authorize('view', Maintenance::class);

        $techs = Technicien::all();
        $vehs = Vehicule::all();
        return view('maintenances.create', compact('techs', 'vehs'));
    }

    public function store(Request $request)
    {
        $this->authorize('view', Maintenance::class);

        $this->validate($request,[
            'technicien_id'=> 'required',
            'acteur_id'=> 'required',
            'libelle_maint'=> 'required',
            'date_debut'=> 'required',
            'date_fin'=> 'required',
            'facture'=> 'required',
            'mont_maint'=> 'required'
        ]);
        $file = $request->file('facture');

        if($file->extension() == "pdf")
        {
            $maintien = new Maintenance();
            $maintien->technicien_id = $request->input('technicien_id');
            $maintien->acteur_id = $request->input('acteur_id');
            $maintien->vehicule_id = $request->input('vehicule_id');
            $maintien->type_maint = $request->input('type_maint');
            $maintien->libelle_maint = $request->input('libelle_maint');
            $maintien->date_debut = $request->input('date_debut');
            $maintien->date_fin = $request->input('date_fin');
            $maintien->mont_maint = $request->input('mont_maint');
            $maintien->observation = $request->input('observation');
            $maintien->facture = $file->getClientOriginalName();
            $maintien->save();

            $this->upload();
        }

        return redirect()->route('maintenance')->with('success','La nouvelle maintenance a bien été enregistrée');
    }

    public function edit(Maintenance $maint_id)
    {
        $this->authorize('view', Maintenance::class);

        $vehs = Vehicule::all();
        $techs = Technicien::all();
        return view('maintenances.edit', ['vehs'=>$vehs, 'techs'=>$techs, 'maint'=>$maint_id]);
    }

    public function update(Maintenance $maint_id, Request $request)
    {
        $this->authorize('view', Maintenance::class);

        $this->validate($request,[
            'technicien_id'=> 'required',
            'acteur_id'=> 'required',
            'libelle_maint'=> 'required',
            'date_debut'=> 'required',
            'date_fin'=> 'required',
            'mont_maint'=> 'required'
        ]);
        $maint_id->technicien_id = $request->input('technicien_id');
        $maint_id->acteur_id = $request->input('acteur_id');
        $maint_id->vehicule_id = $request->input('vehicule_id');
        $maint_id->type_maint = $request->input('type_maint');
        $maint_id->libelle_maint = $request->input('libelle_maint');
        $maint_id->date_debut = $request->input('date_debut');
        $maint_id->date_fin = $request->input('date_fin');
        $maint_id->mont_maint = $request->input('mont_maint');
        $maint_id->observation = $request->input('observation');
        $maint_id->update();

        return redirect()->route('maintenance')->with('success','La maintenance a été modifiée');
    }

    public function destroy(Maintenance $maint_id)
    {
        $this->authorize('delete', Maintenance::class);

        $maint_id->delete();
        return back()->with('info','La maintenance a été supprimée');
    }

    private function upload()
    {
        $facture = request()->file('facture');
        
        if ($facture) {

            $ext = $facture->extension();
            $name = $facture->getClientOriginalName();
            
            if ($ext == "pdf") {
                $file = $facture->storeAs('public', 'Facture-'.$name);
            }
        }
    }

}
