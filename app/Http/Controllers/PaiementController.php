<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paiement;
use App\Technicien;
use App\Versement;
use App\Maintenance;
use Carbon\Carbon;
use PDF;

class PaiementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $this->authorize('view', Paiement::class);

        $paie = Paiement::all();
        $avance = Versement::select('paiement_id')->distinct()->groupBy('paiement_id')->selectRaw('sum(mont_verse) as sum')->get();
        return view('paiements.index',compact('paie','avance'));
    }

    public function show(Paiement $paie_id)
    {
        $this->authorize('view', Paiement::class);

        $avance = versement::where('paiement_id',$paie_id->id)->get();
        return view('paiements.show', ['paie'=>$paie_id, 'avance'=>$avance]);
    }

    public function create()
    {
        $this->authorize('view', Paiement::class);

        $noms = Technicien::all();
        $maint = Maintenance::all();
        return view('paiements.create', compact('noms','maint'));
    }

    public function store(Request $request)
    {
        $this->authorize('view', Paiement::class);

        $this->validate($request,[
            'technicien_id'=> 'required',
            'objet'=> 'required',
            'mont_paie'=> 'required',
            'date_paie'=> 'required',
            'mont_verse'=> 'required',
            'mode_paiement'=> 'required'
        ]);
        $paiement = new Paiement();
        $paiement->technicien_id = $request->input('technicien_id');
        $paiement->objet = $request->input('objet');
        $paiement->mont_paie = $request->input('mont_paie');
        $paiement->date_paie = $request->input('date_paie');
        $paiement->save();

        $this->Avance($paiement,$request);

        return redirect()->route('paiement')->with('success','Le nouveau paiement a bien été enregistré');
    }

    public function edit_Avance(Paiement $paie_id)
    {
        $this->authorize('view', Paiement::class);

        $techs = Technicien::all();
        return view('paiements.edit_avance', ['paie'=>$paie_id, 'techs'=>$techs]);
    }

    public function save_Avance(Request $request)
    {
        $this->authorize('view', Paiement::class);

        $this->validate($request,[
            'paiement_id'=> 'required',
            'mont_verse'=> 'required',
            'date_verse'=> 'required',
            'mode_paiement'=> 'required'
        ]);
        $verse = new Versement();
        $verse->paiement_id = $request->input('paiement_id');
        $verse->mont_verse = $request->input('mont_verse');
        $verse->date_verse = $request->input('date_verse');
        $verse->mode_paiement = $request->input('mode_paiement');
        $verse->save();

        return redirect()->route('paiement')->with('info','Le versement a bien été enregistré');
    }

    public function edit(Paiement $paie_id)
    {
        $this->authorize('view', Paiement::class);

        $techs = Technicien::all();
        return view('paiements.edit', ['paie'=>$paie_id, 'techs'=>$techs]);
    }

    public function update(Paiement $paie_id, Request $request)
    {
        $this->authorize('view', Paiement::class);

        $this->validate($request,[
            'technicien_id'=> 'required',
            'objet'=> 'required',
            'mont_paie'=> 'required',
            'date_paie'=> 'required'
        ]);
        $paie_id->technicien_id = $request->input('technicien_id');
        $paie_id->objet = $request->input('objet');
        $paie_id->mont_paie = $request->input('mont_paie');
        $paie_id->date_paie = $request->input('date_paie');
        $paie_id->update();

        return redirect()->route('paiement')->with('success','Le paiement a été modifié');
    }

    public function destroy(Paiement $paie_id)
    {
        $this->authorize('delete', Paiement::class);

        $verse = Versement::where('paiement_id', $paie_id->id);
        $verse->delete();
        $paie_id->delete();
        
        return redirect()->route('paiement')->with('info','Le paiement et ses versements ont été suprimés');
    }

    private function Avance(Paiement $paiement, Request $request)
    {

        $this->validate($request,[
            'mont_verse'=> 'required',
            'date_paie'=> 'required',
            'mode_paiement'=> 'required'
        ]);
        $verse = new Versement();
        $verse->paiement_id = $paiement->id;
        $verse->mont_verse = request('mont_verse');
        $verse->date_verse = request('date_paie');
        $verse->mode_paiement = request('mode_paiement');
        $verse->save();
    }

    public function loadObjet(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->val;
            $objet = Maintenance::select('libelle_maint')->where('technicien_id',$id)->get();
            return response()->json($objet);
        }
    }

    public function loadMontant(Request $request)
    {
        if ($request->ajax()) {
            $libelle = $request->val;
            $id_tech = $request->id;
            $montant = Maintenance::select('mont_maint')->where('libelle_maint',$libelle)->where('technicien_id',$id_tech)->get();
            return response()->json($montant);
        }
    }

    public function printPdf(Paiement $paie_id)
    {
        $this->authorize('view', Paiement::class);

        $avances = versement::where('paiement_id',$paie_id->id)->get();
        $day = Carbon::now('UTC');
        $today = $day->isoFormat('LLLL');
                            // Pour résoudre le pb "Image not found"
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('etats.paiement_pdf', compact('avances','paie_id', 'today'));
        return $pdf->stream(); // Pour afficher le pdf dans le navigateur
    }
}