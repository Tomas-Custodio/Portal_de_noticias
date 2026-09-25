<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Noticia;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     */

    public function Home(){

        $noticias= Noticia::where('estado',"Publicado")->orderby('data','asc')->paginate(10);

        return view('Public.index',compact('noticias'));
    }

    

}

 