@extends('layout')
@section('content')
    <main class="sing-up">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Se connecter</h3>
                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success text-center my-2">
                             {{session()->get('success')}}
                        </div>
                        @endif
                        <form action="{{route("login.user")}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" name="email" placeholder="E-mail">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Mot de passe">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid max-auto">
                                <button type="submit" class="btn btn-info btn-blobk">S'identifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection