@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
   <h1>Modification d'un Examen</h1>
   <form action="{{route('examens.update', $examen->id)}}" method="POST" class="mt-4">
    @csrf
    @method("PUT")
        <div class="form-group mb-3">
            <input type="text" name="title" class="form-control" value="{{$examen->title}}"> 
            @error('title')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class="form-group mb-3">
            <input type="datetime-local" name="date" class="form-control" value="{{$examen->date}}"> 
            @error('date')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <select name="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{$course->id}}"
                        @if ($course->id == $examen->course_id)
                            @selected(true)
                        @endif
                        >{{$course->name}}</option>
                @endforeach
            </select>
            @error('course_id')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div> 
       <button type="submit" class="btn btn-success">Modifier</button>
       <a href="{{route('examens.index')}}" class="btn btn-danger">Annuler</a>
   </form>   
</div>
@endsection