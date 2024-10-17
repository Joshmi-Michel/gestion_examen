@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
    <h1>Enregistrer une note</h1>
    <form action="{{route('examens.results.store')}}" class="mt-4" method="POST">
    @csrf
        <div class="form-group mb-3">
            <select name="student_id" id="" class="form-control">
                <option value="">--- etudiant ---</option>
                @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->firstname.' '.$student->lastname}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <select name="examen_id" id="" class="form-control">
                <option value="">--- examen ---</option>
                @foreach ($examens as $examen)
                    <option value="{{ $examen->id }}">{{ $examen->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <input type="number" name="note" id="" placeholder="La note" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{route('examens.index')}}" class="btn btn-danger">Annuler</a>
    </form>
</div>
@endsection