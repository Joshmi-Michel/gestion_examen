@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
   <h1>Ajout d'un Examen</h1>
   <form action="{{route('examens.store')}}" method="POST" class="mt-4">
    @csrf
        <div class="form-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="Titre de l'examen"> 
            @error('title')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class="form-group mb-3">
            <input type="datetime-local" name="date" class="form-control" placeholder="date de l'examen"> 
            @error('date')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <select name="course_id" class="form-control">
                <option value="">--- Cours ---</option>
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            @error('course_id')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
       <button type="submit" class="btn btn-success">Ajouter</button>
       <a href="{{route('examens.index')}}" class="btn btn-danger">Annuler</a>
   </form>   
</div>
@endsection