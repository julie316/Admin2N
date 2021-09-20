<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SortieCaisse;
use App\EntreeCaisse;
use App\Rubrique;
use Carbon\Carbon;

class SortieCaisseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', SortieCaisse::class);

        $sortie = SortieCaisse::all();
        $test = SortieCaisse::select('date_sort_cais')->distinct(); // sélectionne les valeurs de la colonne en éliminant les redondances
        $search = $test->groupBy('date_sort_cais')->selectRaw('sum(mont_sort) as sum')->get(); //somme les montants en fonction des dates
       
        return view('caisses.sorties.index', compact('sortie','search'));  
    }

    public function liste()
    {
        $this->authorize('view', SortieCaisse::class);

        $sortie = SortieCaisse::all();
        return view('caisses.sorties.liste', compact('sortie'));
    }

    public function create()
    {
        $this->authorize('view', SortieCaisse::class);

        $rubs = Rubrique::all();
        return view('caisses.sorties.create', compact('rubs'));
    }

    public function store(Request $request)
    {
        $this->authorize('view', SortieCaisse::class);

        $this->validate($request, [
            'acteur_id'=>'required',
            'rubrique_id'=>'required',
            'libelle_sort_cais'=>'required',
            'date_sort_cais'=>'required',
            'beneficiaire'=>'required',
            'mont_sort'=>'required',
        ]);
        
        $date_fetch = $request->input('date_sort_cais');
        $date = new Carbon($date_fetch);
        if($date->isCurrentMonth()){
            $sortie = new SortieCaisse();
            $sortie->acteur_id = $request->input('acteur_id');
            $sortie->rubrique_id = $request->input('rubrique_id');
            $sortie->libelle_sort_cais = $request->input('libelle_sort_cais');
            $sortie->date_sort_cais = $date_fetch;
            $sortie->beneficiaire = $request->input('beneficiaire');
            $sortie->mont_sort = $request->input('mont_sort');
            $sortie->save();

            return redirect()->route('sortie_caisse')->with('success','Le décaissement a bien été enregistré');
        }
        else {
            return redirect()->route('sortie_caisse')->with('warning','Vous n\'êtes pas autorisés à effectuer cette action car le mois a été clôturé');
        }    
    }

    public function edit(SortieCaisse $cort_id)
    {
        $this->authorize('view', SortieCaisse::class);

        $rubs = Rubrique::all();
        return view('caisses.sorties.edit', ['rubs'=>$rubs, 'sort'=>$cort_id]);
    }

    public function update(SortieCaisse $cort_id, Request $request)
    {
        $this->authorize('view', SortieCaisse::class);

        $this->validate($request, [
            'acteur_id'=>'required',
            'rubrique_id'=>'required',
            'libelle_sort_cais'=>'required',
            'date_sort_cais'=>'required',
            'beneficiaire'=>'required',
            'mont_sort'=>'required',
        ]);

        $date_fetch = $request->input('date_sort_cais');
        $date = new Carbon($date_fetch);
        if($date->isCurrentMonth()){
            $cort_id->acteur_id = $request->input('acteur_id');
            $cort_id->rubrique_id = $request->input('rubrique_id');
            $cort_id->libelle_sort_cais = $request->input('libelle_sort_cais');
            $cort_id->date_sort_cais = $date_fetch;
            $cort_id->beneficiaire = $request->input('beneficiaire');
            $cort_id->mont_sort = $request->input('mont_sort');
            $cort_id->update();

            return redirect()->route('sortie_caisse.liste')->with('success','Le décaissement a été modifié');
        }
        else {
            return back()->with('warning','La date entrée est antérieure au mois courant, veuillez entrer une date correcte!!');
        }
    }

    public function destroy(SortieCaisse $cort_id)
    {
        $this->authorize('delete', $cort_id);

        $cort_id->delete();
        return back()->with('info','Le décaissement a été supprimé');
    }
}
