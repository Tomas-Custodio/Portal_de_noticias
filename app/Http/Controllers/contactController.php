<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller {
    public function view(){

        return view('Email.write_email');
    }

    public function send(Request $request){

        $dados = $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email',
            'titulo' => 'required|max:150',
            'mensagem' => 'required',
        ]);

        Mail::to('tomascustodio2004@gmail.com')->send( new contact($dados));
      
        return back()->with('sucesso', 'Email enviado com sucesso!');
    }



}