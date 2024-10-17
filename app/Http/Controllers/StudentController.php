<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller{
    //
    public function index(){
        $students = Student::with("filiere")->get();
        return view('students.index', compact("students"));
    }

    //Get formulaire etudiant
    public function create(){
        $filieres = Filiere::all();
        return view('students.create', compact('filieres')); // création liste déroulante
    }
    public function store(Request $request){
        $validateData = $request->validate([
            "firstname"  => "required",
            "lastname"   => "required",
            "email"      => "required | email",
            "mobile"     => "required | min:10",  
            "filiere_id" => "required | exists:filieres,id"
        ]);
        Student::create($validateData);
        return redirect()->route('students.index')->with('success', "Etudiant créé avec succèes !");
    }

    public function edit(Student $student){
        $filieres = Filiere::all();
        return view('students.edit', compact("student","filieres"));
    }
    public function update(Request $request, int $id){
        $validateData = $request->validate([
            "firstname"  => "required",
            "lastname"   => "required",
            "email"      => "required | email",
            "mobile"     => "required | min:10",  
            "filiere_id" => "required | exists:filieres,id"
        ]);
        Student::where('id', $id)->update($validateData);
        return redirect()->route('students.index')->with('success',"Etudiant modifié avec succès !");
    }

    public function destroy(Student $student){
        $result = $student->delete();
        if ($result) {
            return redirect()->route('students.index')->with('success',"Etudiant supprimé avec succès !");
        }else{
            return redirect()->route('students.index')->with('error',"Echec de suppression!");
        }
    }
}
