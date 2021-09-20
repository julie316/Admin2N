<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntreeStock;
use App\SortieStock;
use Carbon\Carbon;
use PDF;

class EntreeStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', EntreeStock::class);

        $entree_stock = EntreeStock::all();
        return view('stocks.entrees.index', compact('entree_stock'));
    }

    public function create()
    {
        $this->authorize('view', EntreeStock::class);

        return view('stocks.entrees.create');
    }

    public function store()
    {
        $this->authorize('view', EntreeStock::class);

        $req = request()->validate([
            'acteur_id'=>'required',
            'famille'=>'required',
            'libelle_stock'=>'required',
            'qte_stock'=>'required',
            'date_entree_st'=>'required'
        ]);
        EntreeStock::create($req);
        
        return redirect()->route('entree_stock')->with('success','Le nouveau stock a bien été enregistré');
    }

    public function edit(EntreeStock $sent_id)
    {
        $this->authorize('view', EntreeStock::class);

        return view('stocks.entrees.edit', ['sent'=>$sent_id]);
    }

    public function update(EntreeStock $sent_id)
    {
        $this->authorize('view', EntreeStock::class);

        $req = request()->validate([
            'acteur_id'=>'required',
            'famille'=>'required',
            'libelle_stock'=>'required',
            'qte_stock'=>'required',
            'date_entree_st'=>'required'
        ]);

        $sent_id->update($req);
        return redirect()->route('entree_stock')->with('success','Le stock a été modifié');
    }

    public function addEntrance(EntreeStock $sent_id)
    {
        $this->authorize('view', EntreeStock::class);

        return view('stocks.entrees.add', ['sent'=>$sent_id]);
    }

    public function updateEntrance(EntreeStock $sent_id, Request $request)
    {
        $this->authorize('view', EntreeStock::class);

        $this->validate($request, [
            'acteur_id'=>'required',
            'famille'=>'required',
            'libelle_stock'=>'required',
            'qte_stock'=>'required',
            'date_entree_st'=>'required'
        ]);
        $qte_apk = $request->input('qte_stock');
        $qte_stock_bd = $sent_id['qte_stock'];
        $qte_reste_bd = $sent_id['qte_reste'];
        $new_qte_stock = $qte_stock_bd + $qte_apk;
        $new_qte_reste = $qte_reste_bd + $qte_apk;

        $sent_id->acteur_id = $request->input('acteur_id');
        $sent_id->famille = $request->input('famille');
        $sent_id->libelle_stock = $request->input('libelle_stock');
        $sent_id->qte_stock = $new_qte_stock;
        $sent_id->qte_reste= $new_qte_reste;
        $sent_id->date_entree_st = $request->input('date_entree_st');
        $sent_id->update();
        return redirect()->route('entree_stock')->with('success','La quantité a bien été modifié');
    }

    public function destroy(EntreeStock $sent_id)
    {
        $this->authorize('delete', EntreeStock::class);

        $sent_id->delete();
        return back()->with('info','Le stock a été supprimé');
    }

    public function printStock(Request $request)
    {
        $this->authorize('view', EntreeStock::class);

        $day = Carbon::now('UTC');
        $today = $day->isoFormat('LLLL'); // mettre la date sous le format lundi 02 janvier 12:30
        $val = $request->input('famille');
        $stocks = EntreeStock::where('famille',$val)->get();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                    ->loadView('etats.stock_pdf',compact('stocks', 'val', 'today'));
        return $pdf->stream();
    }
}
