<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\DossierMail;
use Carbon\Carbon;
use App\Dossier;
use App\Vehicule;

class DossierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $this->authorize('view', Dossier::class);
      
        $dossier = Dossier::orderBy('date_expire', 'desc')->get();
        // $this->Mail_expire();
        return view('dossiers.index', compact('dossier'));
    }

    public function show(Dossier $dos_id)
    {
        $this->authorize('view', Dossier::class);

        return view('dossiers.show', ['dossier'=>$dos_id]);
    }

    public function create()
    {
        $this->authorize('view', Dossier::class);

        $vehicule = Vehicule::all();
        return view('dossiers.create', compact('vehicule'));
    }

    public function store(Request $request)
    {
        $this->authorize('view', Dossier::class);

        $this->validate($request,[
            'categorie'=> 'required',
            'libelle_dos'=> 'required',
            'date_souscrip'=> 'required',
            'duree'=> 'required',
            'document'=> 'required'
        ]);

        $date = $request->input('date_souscrip');
        $duree = $request->input('duree');
        // détermination de la date d'expiration
        $calcul = new Carbon($date);
        $calcul->addMonths($duree);
        $calcul->toDateString();

        $file = $request->file('document');

        if ($file->extension() == "pdf") {
            $dossier = new Dossier();
            $dossier->vehicule_id = $request->input('vehicule_id');
            $dossier->categorie = $request->input('categorie');
            $dossier->libelle_dos = $request->input('libelle_dos');
            $dossier->date_souscrip = $date;
            $dossier->duree = $duree;
            $dossier->date_expire = $calcul;
            $dossier->document = $file->getClientOriginalName();
            $dossier->matricule_veh = $request->input('matricule_veh');
            $dossier->type_camion = $request->input('type_camion');
            $dossier->save();

            $this->upload($dossier);
        }

        return redirect()->route('dossier')->with('success','La nouvelle pièce a bien été enregistrée');    
    }

    public function edit(Dossier $dos_id)
    {
        $this->authorize('view', Dossier::class);

        $vehicule = Vehicule::all();
        return view('dossiers.edit', ['dossier'=>$dos_id, 'vehicule'=>$vehicule]);
    }

    public function update(Dossier $dos_id, Request $request)
    {
        $this->authorize('view', Dossier::class);

        $this->validate($request,[
            'categorie'=> 'required',
            'libelle_dos'=> 'required',
            'date_souscrip'=> 'required',
            'duree'=> 'required'
        ]);
        $date = $request->input('date_souscrip');
        $duree = $request->input('duree');
        // détermination de la date d'expiration
        $calcul = new Carbon($date);
        $calcul->addMonths($duree);
        $calcul->toDateString();

        $dos_id->update([
            'vehicule_id' => $request->input('vehicule_id'),
            'categorie' => $request->input('categorie'),
            'libelle_dos' => $request->input('libelle_dos'),
            'date_souscrip' => $date,
            'duree' => $duree,
            'date_expire' => $calcul,
            'matricule_veh' =>$request->input('matricule_veh'),
            'type_camion' =>$request->input('type_camion')
        ]);
        
        return redirect()->route('dossier')->with('success','La pièce a été modifiée');
    }

    public function destroy(Dossier $dos_id)
    {
        $this->authorize('delete', Dossier::class);

        $dos_id->delete();
        return back()->with('info','La pièce a été supprimée');
    }

    private function upload(Dossier $dossier)
    {
        $file = request()->file('document');
        if ($file) {

            // $url = $file->path();
            $ext = $file->extension();
            $name = $file->getClientOriginalName();
            // $original= Str::before($name, ".");
            
            if ($ext == "pdf") {
                if ($dossier['categorie'] == "Administration") {
                    $document = $file->storeAs('public', 'Administration-'.$name);                    
                }
                if ($dossier['categorie'] == "Camion") {
                    $document = $file->storeAs('public', 'Camion-'.$name);                    
                }
                if ($dossier['categorie'] == "Véhicule de Tourisme") {
                    $document = $file->storeAs('public', 'Véhicule de Tourisme-'.$name);                    
                }
            }
        }

    }

    // private function Mail_expire()
    // {
    //     $dates = Dossier::select('date_expire')->get();
        
    //     foreach ($dates as $date) {
    //         $date_fetch = $date['date_expire'];
    //         $date_rappel = new Carbon($date_fetch);
    //         $date_rappel->subWeeks(1);
    //         $date_rappel->toDateString();

    //         if ($date_rappel->isCurrentDay()) {
    //             $query = Dossier::where('date_expire', $date_fetch)->get();
    //             Mail::to('julieeboa7@gmail.com')->send(new DossierMail($query));
    //         }
    //     }
        
    // }
}
