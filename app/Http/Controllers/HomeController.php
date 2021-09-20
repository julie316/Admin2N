<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DossierMail;
use App\Vehicule;
use App\Acteur;
use App\Dossier;
use App\Maintenance;
use App\Paiement;
use App\Versement;
use Carbon\Carbon;
use App\EntreeCaisse;
use App\SortieCaisse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Véhicules
        $veh = Vehicule::all();
        $nb_veh = count($veh);
        // Utilisateurs
        $user = Acteur::all();
        $nb_user = count($user);
        // Maintenances
        $maint = Maintenance::all();
        $nb_maint = count($maint);
        // Paiements
        $nb_paie = $this->NumberPayment();
        // Dossiers
        $nb_dos = $this->NumberFile();
        $this->mail();
        // Enregistrement de la balance dans les entrées
        $this->SaveBalance();

        // $alert = $this->Banner();

        return view('dashboard', compact('nb_veh','nb_user','nb_maint','nb_paie','nb_dos'));
    }

    private function mail()
    {
        $dates = Dossier::select('date_expire')->get();
        
        foreach ($dates as $date) {
            $date_fetch = $date['date_expire'];
            $date_rappel = new Carbon($date_fetch);
            $date_rappel->subWeeks(1);
            $date_rappel->toDateString();

            if ($date_rappel->isCurrentDay()) {
                $query = Dossier::where('date_expire', $date_fetch)->get();
                foreach (['julieeboa7@gmail.com'] as $adresse) {
                    Mail::to($adresse)->send(new DossierMail($query));
                }
               
            }
        }
        // $query = Dossier::where('id', 4)->get();
        // return view('emails.dossier-form', compact('query'));
    }

    // private function Banner()
    // {
    //     $dossier = Dossier::select('date_expire')->get();
    //     $date_now = Carbon::now();
    //     $date_now->toDateString();
    //     $nb_dos = 0;
    //     foreach ($dossier as $dos) {
    //         $date_fetch = $dos['date_expire'];
    //         $date_rappel = new Carbon($date_fetch);
    //         $date_rappel->subWeeks(1);
    //         $date_rappel->toDateString();

    //         if ($date_rappel->isCurrentDay()) {
    //             $query = Dossier::where('date_expire', $date_fetch)->get();
    //         }
    //     }

    //     return $query;
    // }

    private function NumberFile()
    {
        $dossier = Dossier::select('date_expire')->get();
        $date_now = Carbon::now();
        $date_now->toDateString();
        $nb_dos = 0;
        foreach ($dossier as $dos) {
            $date_fetch = $dos['date_expire'];
            $date_rappel = new Carbon($date_fetch);
            $date_rappel->subWeeks(1);
            $date_rappel->toDateString();

            if ($date_rappel->isCurrentDay()) {
               $nb_dos = $nb_dos + 1;
            }
        }

        return $nb_dos;
    }

    private function NumberPayment()
    {
        $paie = Paiement::all();
        $avance = Versement::select('paiement_id')->distinct()->groupBy('paiement_id')->selectRaw('sum(mont_verse) as sum')->get();
        $nb_paie = 0;
        foreach($paie as $paies)
        {
            foreach($avance as $ava)
            {
                if ($paies->id == $ava->paiement_id && $paies->mont_paie > $ava->sum) {
                    $nb_paie = $nb_paie + 1; 
                }
            }
        }

        return $nb_paie;
    }

    private function SaveBalance()
    {
        $currentYear = new Carbon();
        $year = $currentYear->isoformat('Y'); // Récuperer l'année courante 

        $nextMonth = new Carbon(' first day of next month'); // 1er jour du prochain mois
        $nextMonth->toDateString();

        $lastDay = new Carbon('last day of this month'); // dernier jour du mois courant
        $last = $lastDay->isoFormat('M');
        $monthName = $lastDay->isoFormat('MMMM');

        // Entrées
        $data = EntreeCaisse::whereYear('date_ent_cais','=', $year)
                            ->selectRaw('sum(mont_ent) as sum, MONTH(date_ent_cais) as mois')
                            ->groupBy('mois')
                            ->get();
        // Sorties/ Dépenses
        $query = SortieCaisse::whereYear('date_sort_cais','=', $year)
                            ->selectRaw('sum(mont_sort) as total, MONTH(date_sort_cais) as month')
                            ->groupBy('month')
                            ->get();
        $searchEntree = EntreeCaisse::where('depositaire','Système')->where('date_ent_cais', $nextMonth)->get();
        foreach ($data as $key) {
            $entree = $key['sum'];
            
            $row = $searchEntree->count();
            if(intval($last) == $key['mois'] && $lastDay->isCurrentDay() && $row == 0)
            {
                foreach ($query as $value) {
                    $depense = $value['total'];
                    if ($key['mois'] == $value['month']) {
                        $balance = $entree - $depense;

                        $record = new EntreeCaisse();
                        $record->acteur_id = 1;
                        $record->depositaire = "Système";
                        $record->libelle_ent_cais = "Balance de ".$monthName;
                        $record->date_ent_cais = $nextMonth;
                        $record->mont_ent = $balance;
                        $record->save();
                    }
                }
            }
            else {
                foreach($searchEntree as $update)
                {
                    foreach ($query as $value) {
                        $depense = $value['total'];
                        if ($key['mois'] == $value['month']) {
                            $balance = $entree - $depense;

                            $record = EntreeCaisse::find($update['id']);
                            $record->acteur_id = 1;
                            $record->depositaire = "Système";
                            $record->libelle_ent_cais = "Balance de ".$monthName;
                            $record->date_ent_cais = $nextMonth;
                            $record->mont_ent = $balance;
                            $record->update();
                        }
                    }
                }
            }
                
        }
        
        return;
    }
}
