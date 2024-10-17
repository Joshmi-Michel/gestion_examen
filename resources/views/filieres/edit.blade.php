@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
   <h1>Modification de la filière</h1>
   <form action="{{route('filieres.update', $filiere->id)}}" method="POST" class="mt-4">
    @csrf
    @method("PUT")
       <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" value="{{$filiere->name}}"> 
            @error('name')
              <div class="text-danger">{{$message}}</div>
            @enderror
       </div> 
       <button type="submit" class="btn btn-success">Modifier</button>
       <a href="{{route('filieres.index')}}" class="btn btn-danger">Annuler</a>
   </form>   
</div>
@endsection