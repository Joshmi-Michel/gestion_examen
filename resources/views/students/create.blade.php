@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
   <h1>Ajout d'un Etudiant</h1>
   <form action="{{route('students.store')}}" method="POST" class="mt-4">
    @csrf
        <div class="form-group mb-3">
            <input type="text" name="firstname" class="form-control" placeholder="Prénom de l'étudiant"> 
            @error('firstname')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class="form-group mb-3">
            <input type="text" name="lastname" class="form-control" placeholder="Nom de l' étudiant"> 
            @error('lastname')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="E-mail"> 
            @error('email')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class="form-group mb-3">
            <input type="text" name="mobile" class="form-control" placeholder="Téléphone"> 
            @error('mobile')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>   
        <div class="form-group mb-3">
            <select name="filiere_id" class="form-control">
                <option value="">--- Filière ---</option>
                @foreach ($filieres as $filiere)
                    <option value="{{$filiere->id}}">{{$filiere->name}}</option>
                @endforeach
            </select>
            @error('filiere_id')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
       <button type="submit" class="btn btn-success">Ajouter</button>
       <a href="{{route('students.index')}}" class="btn btn-danger">Annuler</a>
   </form>   
</div>
@endsection