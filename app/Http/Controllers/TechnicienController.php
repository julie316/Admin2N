<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technicien;

class TechnicienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', Technicien::class);

        $tech = Technicien::all();
        return view('techniciens.index', compact('tech'));
    }

    public function show_cni(Technicien $tech_id)
    {
        $this->authorize('view', Technicien::class);

        return view('techniciens.show_cni', ['tech'=>$tech_id]);
    }

    public function show_contrat(Technicien $tech_id)
    {
        $this->authorize('view', Technicien::class);

        return view('techniciens.show_contrat', ['tech'=>$tech_id]);
    }
    
    public function create()
    {
        $this->authorize('view', Technicien::class);

        return view('techniciens.create');
    }
    
    public function store(Request $request)
    {
        $this->authorize('view', Technicien::class);

        $this->validate($request,[
            'nom_tech'=> 'required',
            'tel_tech'=> 'required|min:9',
            'metier'=> 'required',
            'local_atelier'=> 'required',
            'ville'=> 'required',
            'cni'=> 'required'
        ]);
        $cni = $request->file('cni');
        $contrat = $request->file('contrat');
        if ($contrat == null) {
            $result = null;
        }else{
            $result = $contrat->getClientOriginalName();
        }
        
        if ($cni->extension() == "pdf") {

            $technicien = new Technicien();
            $technicien->nom_tech = $request->input('nom_tech');
            $technicien->tel_tech = $request->input('tel_tech');
            $technicien->number = $request->input('number');
            $technicien->email_tech = $request->input('email_tech');
            $technicien->metier = $request->input('metier');
            $technicien->cni = $cni->getClientOriginalName();
            $technicien->local_atelier = $request->input('local_atelier');
            $technicien->ville = $request->input('ville');
            $technicien->contrat = $result;
            $technicien->save();

            $this->upload();
        }
        
        return redirect()->route('technicien')->with('success','Le technicien a bien été enregistré');
    }

    public function edit(Technicien $tech_id)
    {
        $this->authorize('view', Technicien::class);

        return view('techniciens.edit', ['tech'=>$tech_id]);
    }

    public function update(Technicien $tech_id, Request $request)
    {
        $this->authorize('view', Technicien::class);

        $this->validate($request, [
            'nom_tech'=> 'required',
            'tel_tech'=> 'required|min:9',
            'metier'=> 'required',
            'local_atelier'=> 'required',
            'ville'=> 'required'
        ]);
        $tech_id->update([
            'nom_tech' => $request->input('nom_tech'),
            'tel_tech' => $request->input('tel_tech'),
            'number' => $request->input('number'),
            'email_tech' => $request->input('email_tech'),
            'metier' => $request->input('metier'),
            'local_atelier' => $request->input('local_atelier'),
            'ville' => $request->input('ville'),
        ]);
        
        return redirect()->route('technicien')->with('success','Le technicien a été modifié');
    }

    public function destroy(Technicien $tech_id)
    {
        $this->authorize('delete', Technicien::class);

        $tech_id->delete();
        return back()->with('info','Le technicien a été supprimé');
    }

    private function upload()
    {
        $contrat = request()->file('contrat');
        $cni = request()->file('cni');
        if ($contrat != null) {

            $ext = $contrat->extension();
            $name = $contrat->getClientOriginalName();
            
            if ($ext == "pdf") {
                $fichier_contrat = $contrat->storeAs('public', 'contrat-'.$name);
            }
            return [$fichier_contrat];
        }
        if ($cni) {

            $ext = $cni->extension();
            $name = $cni->getClientOriginalName();
            
            if ($ext == "pdf") {
                $fichier_cni = $cni->storeAs('public', 'cni-'.$name);
            }
            return [$fichier_cni];
        }
    }

}
