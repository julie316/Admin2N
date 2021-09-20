<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubrique;

class RubriqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', Rubrique::class);

        $rub = Rubrique::all();
        return view('rubriques.index',['rub'=>$rub]);
    }

    public function create()
    {
        $this->authorize('view', Rubrique::class);

        return view('rubriques.create');
    }

    public function store()
    {
        $this->authorize('view', Rubrique::class);

        $req = request()->validate([
            'libelle_rub'=>'required',
            'couleur'=>'required'
        ]);
        Rubrique::create($req);
        return redirect()->route('rubrique')->with('success','La nouvelle rubrique a bien été enregistrée');
    }

    public function edit(Rubrique $rub_id)
    {
        $this->authorize('view', Rubrique::class);

        return view('rubriques.edit', ['rub'=>$rub_id]);
    }

    public function update(Rubrique $rub_id)
    {
        $this->authorize('view', Rubrique::class);

        $req = request()->validate([
            'libelle_rub'=>'required',
            'couleur'=>'required'
        ]);
        $rub_id->update($req);
        return redirect()->route('rubrique')->with('success','La rubrique a été modifiée');
    }

    public function destroy(Rubrique $rub_id)
    {
        $this->authorize('delete', $rub_id);

        $rub_id->delete();
        return back()->with('success','La rubrique a été suprimée');
    }
}
