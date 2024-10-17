@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <h1 class="mb-3">Liste des Filières</h1>
        <a href="{{route('filieres.create')}}" class="btn btn-info">Ajouter</a>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
                <div class="alert alert-success text-center my-2">
                     {{session()->get('success')}}
                </div>
            @endif
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            @foreach ($filieres as $filiere)
            <tr>
                <td>{{$filiere->id}}</td>
                <td>{{$filiere->name}}</td>
                <td>
                    <a href="{{route("filieres.edit",$filiere->id)}}" class="btn btn-info"><span class="fa fa-pencil"></span></a>
                    
                    <form  action="{{route('filieres.destroy', $filiere->id)}}" method="post" class="d-inline">
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