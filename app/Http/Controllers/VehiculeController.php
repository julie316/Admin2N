<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Vehicule;
use App\Proprietaire;
use App\Dossier;
use PDF;

class VehiculeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('update', Vehicule::class);

        $vehicule = Vehicule::all();
        return view('vehicules.index', compact('vehicule'));
    }

    public function show(Vehicule $veh_id)
    {
        // $collect = collect($veh_id['dossier_id'])->implode('-');
        // $test = explode('-', $collect);
        // $int = array_map('intval', $test);
        // $n = count($int);

        // for ($i=0; $i <$n ; $i++) { 
        //     $query = Dossier::where('id', $int[$i])->get(); 
        // }
        $this->authorize('update', Vehicule::class);

        $id = $veh_id['id'];
        $query = Dossier::where('vehicule_id',$id)->get();

        return view('vehicules.show', ['veh'=>$veh_id, 'query'=>$query]);
    }

    public function create()
    {
        $this->authorize('update', Vehicule::class);

        $noms = Proprietaire::all();
        return view('vehicules.create', compact('noms'));
    }

    public function store(Request $request)
    {
        $this->authorize('update', Vehicule::class);

        $this->validate($request,[
            'proprietaire_id'=> 'required',
            'marque'=> 'required',
            'matricule'=> 'required',
            'type_veh'=> 'required',
            'litre_huile'=> 'required',
            'nature_carbur'=> 'required'
        ]);
        // $dos_id = request('dossier_id');
        // $search = Dossier::select('id')->where('matricule_veh', $dos_id)->get();
        // $tab = array();
        // foreach ($search as $key) {
        //     $tab[] = $key->id;
        // }
        // $collect = collect($tab);
        $id = Auth()->user()->id;

        $vehicule = new Vehicule();
        $vehicule->proprietaire_id = $request->input('proprietaire_id');
        $vehicule->acteur_id = $id;
        $vehicule->marque = $request->input('marque');
        $vehicule->matricule = $request->input('matricule');
        $vehicule->type_veh = $request->input('type_veh');
        $vehicule->litre_huile = $request->input('litre_huile');
        $vehicule->nature_carbur = $request->input('nature_carbur');
        $vehicule->save();

        return redirect()->route('vehicule')->with('success','Le véhicule a bien été enregistré');
    }
            
    public function edit(Vehicule $veh_id)
    {
        $this->authorize('update', Vehicule::class);

        $nom = Proprietaire::all();
        return view('vehicules.edit', ['veh'=>$veh_id, 'noms'=>$nom]);
    }

    public function update(Vehicule $veh_id, Request $request)
    {
        $this->authorize('update', Vehicule::class);

        $this->validate($request,[
            'proprietaire_id'=> 'required',
            'marque'=> 'required',
            'matricule'=> 'required',
            'type_veh'=> 'required',
            'litre_huile'=> 'required',
            'nature_carbur'=> 'required'
        ]);
        $veh_id->proprietaire_id = $request->input('proprietaire_id');
        $veh_id->acteur_id = $request->input('acteur_id');
        $veh_id->marque = $request->input('marque');
        $veh_id->matricule = $request->input('matricule');
        $veh_id->type_veh = $request->input('type_veh');
        $veh_id->litre_huile = $request->input('litre_huile');
        $veh_id->nature_carbur = $request->input('nature_carbur');
        $veh_id->update();

        return redirect()->route('vehicule')->with('success','Le véhicule a été modifié');
    }

    public function destroy(Vehicule $veh_id)
    {
        $this->authorize('update', Vehicule::class);
        
        $veh_id->delete();
        return back()->with('info','Le véhicule a été supprimé');
    }

    public function ConvertPdf()
    {
        $this->authorize('update', Vehicule::class);

        $vehicule = Vehicule::all();
                            // Pour résoudre le pb "Image not found"
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('etats.vehicules_pdf', compact('vehicule'));
        return $pdf->stream(); // Pour afficher le pdf dans le navigateur
    }

}
