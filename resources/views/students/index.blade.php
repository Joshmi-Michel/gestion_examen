@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-5">
        <h1 class="mb-3">Liste des Etudiants</h1>
        <a href="{{route('students.create')}}" class="btn btn-info">Ajouter</a>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
                <div class="alert alert-success text-center my-2">
                     {{session()->get('success')}}
                </div>
            @endif
            <tr>
                <th>#</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Téléphone</th>
                <th>Filière</th>
                <th>Action</th>
            </tr>
            @foreach ($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->firstname}}</td>
                <td>{{$student->lastname}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->mobile}}</td>
                <td>{{$student->filiere->name}}</td>
                <td>
                    <a href="{{route("students.edit",$student->id)}}" class="btn btn-info"><span class="fa fa-pencil"></span></a>
                    
                    <form  action="{{route('students.destroy', $student->id)}}" method="post" class="d-inline">
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