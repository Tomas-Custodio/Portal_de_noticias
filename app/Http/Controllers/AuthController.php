<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
      public function view (){

        return view("AuthSys.Login");

    }
    public function login_post( Request $request) {

        $dados = $request->validate([
            'email' => "required|string",
            "password" =>'required|string'
        ]);

       if ( Auth::attempt($dados) ) {

            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {

                return redirect()->route('users.home')->with('msg', 'Logado no sistema');
            }

            else{

                 return redirect()->route('home')->with('msg', 'Login realizado com sucesso');

            }

}
    }

    public function logout(Request $request) {
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('msg', 'Sessão terminada com êxito!');
    }


}
