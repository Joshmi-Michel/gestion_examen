@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-5">
        <h1 class="mb-3">Liste des Examens</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{route("examens.create")}}" class="btn btn-info">Ajouter</a>
            <a href="{{route("examens.results.create")}}" class="btn btn-warning">Enregistrer les notes</a>
        </div>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
                <div class="alert alert-success text-center my-2">
                     {{session()->get('success')}}
                </div>
            @endif
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Date d'examen</th>
                <th>Cours</th>
                <th>Actions</th>
            </tr>
            @foreach ($examens as $examen)
            <tr>
                <td>{{$examen->id}}</td>
                <td>{{$examen->title}}</td>
                <td>{{$examen->date}}</td>
                <td>{{$examen->course->name}}</td>
                <td>
                    <a href="{{route("examens.edit",$examen->id)}}" class="btn btn-info"><span class="fa fa-pencil"></span></a>
                    
                    <form  action="{{route('examens.destroy',$examen->id)}}" method="post" class="d-inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection