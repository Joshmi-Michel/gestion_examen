<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller{
    //
    public function index(){
        $courses = Course::all();
        return view("courses.index",compact("courses"));
    }
        //Get formulaire ajout
    public function create(){
        return view("courses.create");
    }
    public function store(Request $request){
        $validateData = $request->validate([
             "name"        => 'required',
             "description" => 'required'
        ]);
        Course::create($validateData);

        return redirect()->route('courses.index')->with('success', 'Cours enregistré avec succèes !');
    }
       //Get formulaire Edit
    public function edit(Course $course){
        return view("courses.edit",compact('course'));
    }
    public function update(Request $request, int $id){
        $validateData = $request->validate([
            'name'        => "required",
            'description' => "required"
        ]);
        Course::where('id', $id)->update($validateData);
        return redirect()->route('courses.index')->with('success',"Le cours a été modifiée avec succèes !");
    }

    public function destroy(Course $course){
        $result = $course->delete();
        if ($result) {
            return redirect()->route('courses.index')->with('success',"Le cours a été supprimée avec succèes !");
        }else{
            return redirect()->route('courses.index')->with('error',"Echec de suppression!");
        }
    }
}
