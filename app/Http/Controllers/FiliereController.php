<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller{
    //liste de toutes les filières
    public function index(){
        $filieres  = Filiere::all();
        return view("filieres.index", compact('filieres'));
    }
    // Get formulaire ajout
    public function create(){
        return view("filieres.create");
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => "required"
        ]);
        Filiere::create($validateData);
        return redirect()->route('filieres.index')->with('success',"Filière ajouté avec succèes !");
    }
        //Get formulaire edit
    public function edit(Filiere $filiere){
        return view('filieres.edit',compact('filiere'));
    }
    public function update(Request $request, int $id){
        $validateData = $request->validate([
            'name' => "required"
        ]);
        Filiere::where('id', $id)->update($validateData);
        return redirect()->route('filieres.index')->with('success',"Filière modifiée avec succèes !");
    }

    public function destroy(Filiere $filiere){
        $result = $filiere->delete();
        if ($result) {
            return redirect()->route('filieres.index')->with('success',"Filière supprimée avec succèes !");
        }else{
            return redirect()->route('filieres.index')->with('error',"Echec de suppression!");
        }
    }
}
