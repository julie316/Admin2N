<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\EntreeCaisse;
use App\SortieCaisse;
use PDF;

class BilanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('caisses.bilans.index');
    }

    public function loadData(Request $request)
    {
        $an = $request->input('annee');
        // Entrées
        $data = EntreeCaisse::whereYear('date_ent_cais','=', $an)
                            ->selectRaw('sum(mont_ent) as sum, MONTH(date_ent_cais) as mois')
                            ->groupBy('mois')
                            ->get();
        // Sorties/ Dépenses
        $query = SortieCaisse::whereYear('date_sort_cais','=', $an)
                            ->selectRaw('sum(mont_sort) as total, MONTH(date_sort_cais) as month')
                            ->groupBy('month')
                            ->get();
        return view('caisses.bilans.index', compact('data','query'));
    }

    public function printData(Request $request)
    {
        $annee = $request->input('year');
        // Entrées
        $data = EntreeCaisse::whereYear('date_ent_cais','=', $annee)
                            ->selectRaw('sum(mont_ent) as sum, MONTH(date_ent_cais) as mois')
                            ->groupBy('mois')
                            ->get();
        // Sorties/ Dépenses
        $query = SortieCaisse::whereYear('date_sort_cais','=', $annee)
                            ->selectRaw('sum(mont_sort) as total, MONTH(date_sort_cais) as month')
                            ->groupBy('month')
                            ->get();
        $day = Carbon::now('UTC');
        $today = $day->isoFormat('LLLL'); // mettre la date sous le format lundi 02 janvier 12:30

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('etats.bilan_pdf',compact('data','query','today','annee'));
        return $pdf->stream();
    }
}
