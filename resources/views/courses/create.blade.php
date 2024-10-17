@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
   <h1>Ajout d'un Cours</h1>
   <form action="{{route('courses.store')}}" method="POST" class="mt-4">
    @csrf
       <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nom du cours"> 
            @error('name')
              <div class="text-danger">{{$message}}</div>
            @enderror
       </div> 
       <div class="form-group mb-3">
        <textarea name="description" placeholder="Description du cours" class="form-control"></textarea>
        @error('description')
          <div class="text-danger">{{$message}}</div>
        @enderror
   </div> 
       <button type="submit" class="btn btn-success">Ajouter</button>
       <a href="{{route('courses.index')}}" class="btn btn-danger">Annuler</a>
   </form>   
</div>
@endsection