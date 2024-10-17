@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-5">
        <h1 class="mb-3">Liste des Cours</h1>
        <a href="{{route('courses.create')}}" class="btn btn-info">Ajouter</a>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
                <div class="alert alert-success text-center my-2">
                     {{session()->get('success')}}
                </div>
            @endif
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach ($courses as $course)
            <tr>
                <td>{{$course->id}}</td>
                <td>{{$course->name}}</td>
                <td>{{$course->description}}</td>
                <td>
                    <a href="{{route("courses.edit",$course->id)}}" class="btn btn-info"><span class="fa fa-pencil"></span></a>
                    
                    <form  action="{{route('courses.destroy', $course->id)}}" method="post" class="d-inline">
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