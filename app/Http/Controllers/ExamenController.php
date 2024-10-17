<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Examen;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamenController extends Controller{
    //
    public function index(){
        $examens = Examen::with("course")->get();
        return view("examens.index", compact('examens'));
    }

    public function create(){
        $courses = Course::all();
        return view("examens.create",compact('courses'));
    }
    public function store(Request $request){
        $validateData = $request->validate([
            "title"     => "required",
            "date"      => "required | date",
            "course_id" => "required | exists:courses,id"
        ]);
        Examen::create($validateData);
        return redirect()->route("examens.index")->with("success", "Examen créé avec succès !");
    }

    public function edit(Examen $examen){
        $courses = Course::all();

        return view("examens.edit", compact("examen","courses"));
    }
    public function update(Request $request, int $id){
        $validateData = $request->validate([
            "title"     => "required",
            "date"      => "required | date",
            "course_id" => "required | exists:courses,id"
        ]);
        Examen::where("id",$id)->update($validateData);
        return redirect()->route("examens.index")->with("success", "Examen modifié avec succès !");
    }

    public function destroy(Examen $examen){
        $result = $examen->delete();
        if ($result) {
            return redirect()->route('examens.index')->with('success',"Examen supprimé avec succès !");
        }else{
            return redirect()->route('examens.index')->with('error',"Echec de suppression!");
        }
    }
     //recuperation etudian et examen
    public function createNote(){
        $students = Student::all();
        $examens  = Examen::all();
        
        return view("examens.store_note", compact("students","examens"));
    }

    public function storeResult(Request $request){
        $validateData = $request->validate([
           "note"       => "required",
           "student_id" => "required | exists:students,id",
           "examen_id"  => "required | exists:examens,id"
        ]);

        $note    = $request->note;
        $mention = "nulle";

        if ($note <= 5) {
           $mention = "nulle";
        }elseif ($note <= 7) {
            $mention = "Faible";
        }elseif ($note <= 9) {
            $mention = "Insuffisant";
        }elseif ($note<= 11) {
            $mention = "Passable";
        }elseif ($note <= 13) {
            $mention = "Assez-bien";
        }elseif ($note <= 15) {
            $mention = "Bien";
        }elseif ($note <= 17) {
            $mention = "Très-bien";
        }elseif ($note <= 19) {
            $mention = "Excéllente";
        }elseif ($note <= 20) {
            $mention = "Honorable";
        }
        Result::create([
           "note"       => $validateData['note'],
           "student_id" => $validateData['student_id'],
           "examen_id"  => $validateData['examen_id'],
           "mention"    =>$mention
        ]);
        return redirect()->route('examens.index')->with("success","Note ou résultat enregistré avec succèes! ");
    }

    public function showresult(){
        $results = Result::all();
        return view("examens.show_result", compact("results"));
    }
}
