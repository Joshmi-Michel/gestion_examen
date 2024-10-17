<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller{
    //
    public function index(){
        return view("auth.login");
    }

    public function customLogin(Request $request){
        $request->validate([
           "email"    => "required | email",
           "password" => "required | min:6"
        ]);
        $credentials = $request->only("email","password");
        if (Auth::attempt($credentials)) {
            return redirect()->intended("students")
                             ->withSuccess("Vous-êtes connecté");
        }
        return redirect('login')->withErrors("Login ou password non valide!");
    }

    public function registration(){
        return view("auth.registration");
    }
    public function customRegistration(Request $request){
        $request->validate([
            "name"     => "required",
            "email"    => "required |email | unique:users",
            "password" => "required | min:6"
        ]);
        $data = $request->all();
        $check = User::create([
           "name"     => $data['name'],
           "email"    => $data['email'],
           "password" => Hash::make($data['password'])
        ]);

        if ($check) {
            return redirect()->route("login")->withSuccess("Création compte réussi ! . Veuillez s'identifier");
        }
         return redirect()->route("register")->withSuccess("Echec d'enregistrement ");
    }

    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
