@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
   <h1>Modofication d'un Etudiant</h1>
   <form action="{{route('students.update',$student->id)}}" method="POST" class="mt-4">
    @csrf
    @method("PUT")
        <div class="form-group mb-3">
            <input type="text" name="firstname" class="form-control" value="{{$student->firstname}}"> 
            @error('firstname')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class="form-group mb-3">
            <input type="text" name="lastname" class="form-control" value="{{$student->lastname}}"> 
            @error('lastname')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="text" name="email" class="form-control" value="{{$student->email}}"> 
            @error('email')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class="form-group mb-3">
            <input type="text" name="mobile" class="form-control" value="{{$student->mobile}}"> 
            @error('mobile')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>   
        <div class="form-group mb-3">
            <select name="filiere_id" class="form-control">
                @foreach ($filieres as $filiere)
                    <option value="{{$filiere->id}}"
                        @if ($filiere->id == $student->filiere_id)
                            @selected(true)
                        @endif
                        >{{$filiere->name}}</option>
                @endforeach
            </select>
            @error('filiere_id')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
       <button type="submit" class="btn btn-success">Modifier</button>
       <a href="{{route('students.index')}}" class="btn btn-danger">Annuler</a>
   </form>   
</div>
@endsection