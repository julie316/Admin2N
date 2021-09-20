<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntreeCaisse;
use Carbon\Carbon;

class EntreeCaisseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('update', EntreeCaisse::class);

        $entree = EntreeCaisse::all();
        $test = EntreeCaisse::select('date_ent_cais')->distinct(); // sélectionne les valeurs de la colonne en éliminant les redondances
        $search = $test->groupBy('date_ent_cais')->selectRaw('sum(mont_ent) as sum')->get(); //somme les montants en fonction des dates

        return view('caisses.entrees.index', compact('entree','search'));
    }

    public function liste()
    {
        $this->authorize('update', EntreeCaisse::class);

        $entree = EntreeCaisse::all();
        return view('caisses.entrees.liste_entrees', compact('entree'));
    }

    public function create()
    {
        $this->authorize('update', EntreeCaisse::class);

        return view('caisses.entrees.create');
    }

    public function store(Request $request)
    {
        $this->authorize('update', EntreeCaisse::class);

        $this->validate($request, [
            'acteur_id'=>'required',
            'depositaire'=>'required',
            'libelle_ent_cais'=>'required',
            'date_ent_cais'=>'required',
            'mont_ent'=>'required'
        ]);
        $date_fetch = $request->input('date_ent_cais');
        $date = new Carbon($date_fetch);
        if ($date->isCurrentMonth()) {
            $entree = new EntreeCaisse();
            $entree->acteur_id = $request->input('acteur_id');
            $entree->depositaire = $request->input('depositaire');
            $entree->libelle_ent_cais = $request->input('libelle_ent_cais');
            $entree->date_ent_cais = $date_fetch;
            $entree->mont_ent = $request->input('mont_ent');
            $entree->save();

            return redirect()->route('entree_caisse')->with('success','La nouvelle entrée en caisse a bien été enregistrée');
        }
        else {
            return redirect()->route('entree_caisse')->with('warning','Vous n\'êtes pas autorisés à effectuer cette action car le mois a été clôturé');
        }
        
    }

    public function edit(EntreeCaisse $cent_id)
    {
        $this->authorize('update', EntreeCaisse::class);

        return view('caisses.entrees.edit', ['ent'=>$cent_id]);
    }

    public function update(EntreeCaisse $cent_id, Request $request)
    {
        $this->authorize('update', EntreeCaisse::class);
        
        $this->validate($request, [
            'acteur_id'=>'required',
            'depositaire'=>'required',
            'libelle_ent_cais'=>'required',
            'date_ent_cais'=>'required',
            'mont_ent'=>'required'
        ]);

        $date_fetch = $request->input('date_ent_cais');
        $date = new Carbon($date_fetch);
        if ($date->isCurrentMonth()) {
            $cent_id->acteur_id = $request->input('acteur_id');
            $cent_id->depositaire = $request->input('depositaire');
            $cent_id->libelle_ent_cais = $request->input('libelle_ent_cais');
            $cent_id->date_ent_cais = $date_fetch;
            $cent_id->mont_ent = $request->input('mont_ent');
            $cent_id->update();

            return redirect()->route('entree_caisse.liste')->with('success','L\'entrée en caisse a été modifiée');
        }
        else {
            return back()->with('warning','La date entrée est antérieure au mois courant, veuillez entrer une date correcte!!');
        }
    }

    public function destroy(EntreeCaisse $cent_id)
    {
        $this->authorize('delete', $cent_id);

        $cent_id->delete();
        return back()->with('info','L\'entrée en caisse a été supprimée');
    }
}
