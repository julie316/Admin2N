<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acteur;
use Illuminate\Support\Facades\Hash;

class ActeurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('create', Acteur::class);

        $user = acteur::all();
        return view('acteurs.index', ['user'=>$user]);
    }

    public function show_profile(Acteur $user_id)
    {
        $this->authorize('create', Acteur::class);

        return view('acteurs.profil', ['user'=>$user_id]);
    }

    public function updateProfile(Acteur $user_id, Request $request)
    {
        $this->authorize('create', Acteur::class);
        
        $this->validate($request, [
            'nom_act'=>'required',
            'prenom_act'=>'required',
            'tel_act'=>'required|min:9',
            'email_act'=>'required|email',
            'pseudo'=>'required',
            'mot_passe'=>'required|confirmed|min:4',
            'mot_passe_confirmation'=>'required|min:4'
        ]);

        $mdp = $request['mot_passe'];
        $user_id->nom_act = $request->input('nom_act');
        $user_id->prenom_act = $request->input('prenom_act');
        $user_id->tel_act = $request->input('tel_act');
        $user_id->email_act = $request->input('email_act');
        $user_id->pseudo = $request->input('pseudo');
        $user_id->mot_passe = Hash::make($mdp);
        $user_id->update();

        return back()->with('success','Les données de l\'utilisateur ont été modifiées');
    }
    
    public function create()
    {
        $this->authorize('create', Acteur::class);

        return view('acteurs.create');
    }

    public function store()
    {
        $this->authorize('create', Acteur::class);

        $req = request()->validate([
            'nom_act'=>'required',
            'prenom_act'=>'required',
            'tel_act'=>'required|min:9',
            'email_act'=>'required|email',
            'pseudo'=>'required',
            'mot_passe'=>'required|confirmed|min:4',
            'mot_passe_confirmation'=>'required|min:4',
            'role'=>'required',
        ]);

        $mdp = $req['mot_passe'];
        $user = new Acteur();
        $user->nom_act = $req['nom_act'];
        $user->prenom_act = $req['prenom_act'];
        $user->tel_act = $req['tel_act'];
        $user->email_act = $req['email_act'];
        $user->pseudo = $req['pseudo'];
        $user->mot_passe = Hash::make($mdp);
        $user->role = $req['role'];
        $user->save();

        return redirect()->route('utilisateur')->with('success','L\'utilisateur a bien été enregistré');
    }

    public function edit(Acteur $user_id)
    {
        return view('acteurs.edit',['user'=>$user_id]);
    }

    public function update(Acteur $user_id)
    {
        $req = request()->validate([
            'nom_act'=>'required',
            'prenom_act'=>'required',
            'tel_act'=>'required|min:9',
            'email_act'=>'required|email',
            'pseudo'=>'required',
            'mot_passe'=>'required|confirmed|min:4',
            'mot_passe_confirmation'=>'required|min:4',
            'role'=>'required',
        ]);

        $mdp = $req['mot_passe'];
        $user_id->nom_act = $req['nom_act'];
        $user_id->prenom_act = $req['prenom_act'];
        $user_id->tel_act = $req['tel_act'];
        $user_id->email_act = $req['email_act'];
        $user_id->pseudo = $req['pseudo'];
        $user_id->mot_passe = Hash::make($mdp);
        $user_id->role = $req['role'];
        $user_id->save();

        return redirect()->route('utilisateur')->with('success','L\'utilisateur a bien été modifié');
    }

    public function destroy(Acteur $user_id)
    {
        $this->authorize('delete', Acteur::class);

        $user_id->delete();
        return redirect()->route('utilisateur')->with('success','L\'utilisateur a été supprimé');
    }
}
