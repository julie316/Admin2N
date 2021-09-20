<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SortieStock;
use App\EntreeStock;
use Carbon\Carbon;
use PDF;

class SortieStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', SortieStock::class);

        $sortie_stock = SortieStock::all();
        $sortie = SortieStock::select('stock_id')->distinct()->get();
        return view('stocks.sorties.index', compact('sortie_stock','sortie'));
    }

    public function create()
    {
        $this->authorize('view', SortieStock::class);

        $entrees = EntreeStock::all();
        return view('stocks.sorties.create', compact('entrees'));
    }

    public function store(Request $request)
    {
        $this->authorize('view', SortieStock::class);

        $this->validate($request,[
            'stock_id'=> 'required',
            'qte_sortie'=> 'required',
            'destinataire'=> 'required',
            'date_sortie_stock'=> 'required'
        ]);
        $sortie = new SortieStock();
        $sortie->stock_id = $request->input('stock_id');
        $sortie->qte_sortie = $request->input('qte_sortie');
        $sortie->destinataire = $request->input('destinataire');
        $sortie->date_sortie_stock = $request->input('date_sortie_stock');
        $sortie->save();
        
        $this->Calcul_Stock();
        return redirect()->route('sortie_stock')->with('success','La sortie de stock a bien été enregistrée');
    }

    public function edit(SortieStock $sort_id)
    { 
        $this->authorize('view', SortieStock::class);

        $entrees = EntreeStock::all();
        return view('stocks.sorties.edit', ['sort'=>$sort_id, 'entrees'=>$entrees]);
    }

    public function update(SortieStock $sort_id, Request $request)
    {
        $this->authorize('view', SortieStock::class);

        $this->validate($request,[
            'stock_id'=> 'required',
            'qte_sortie'=> 'required',
            'destinataire'=> 'required',
            'date_sortie_stock'=> 'required'
        ]);
        $sort_id->stock_id = $request->input('stock_id');
        $sort_id->qte_sortie = $request->input('qte_sortie');
        $sort_id->destinataire = $request->input('destinataire');
        $sort_id->date_sortie_stock = $request->input('date_sortie_stock');
        $sort_id->update();
        
        $this->Calcul_Stock();
        return redirect()->route('sortie_stock')->with('success','La sortie de stock a été modifiée');
    }

    public function destroy(SortieStock $sort_id)
    {
        $this->authorize('delete', $sort_id);

        $sort_id->delete();
        return back()->with('info','La sortie de stock a été supprimée');
    }

    private function Calcul_Stock()
    {
        $qte = SortieStock::select('stock_id')->distinct()->groupBy('stock_id')->selectRaw('sum(qte_sortie) as sortie')->get();
        foreach($qte as $val)
        {
            $entree = EntreeStock::find($val->stock_id);
            $entree->update([ // Mise à jour de la qté restante
                'qte_reste'=>$entree->qte_stock - $val->sortie //Calcule de la qté en stock
            ]);
        }

        
    }

    public function printSortie()
    {
        $this->authorize('view', SortieStock::class);

        $day = Carbon::now('UTC');
        $today = $day->isoFormat('LLLL'); // mettre la date sous le format lundi 02 janvier 12:30
        $sorties = SortieStock::all();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('etats.sortie_stock_pdf',compact('sorties','today'));
        return $pdf->stream();
    }

    public function sortiePdf(Request $request)
    {
        $this->authorize('view', SortieStock::class);

        $date = $request->input('jour');
        // Transformation de la date en carbon
        $date_carbon = new Carbon($date);
        $date_format = $date_carbon->isoFormat('LL');
        //
        $day = Carbon::now('UTC');
        $today = $day->isoFormat('LLLL'); // mettre la date sous le format lundi 02 janvier 12:30
        $sorties = SortieStock::where('date_sortie_stock',$date)->get();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('etats.sortie_pdf',compact('sorties','today','date_format'));
        //return dd($sorties);
        return $pdf->stream();
    }
}