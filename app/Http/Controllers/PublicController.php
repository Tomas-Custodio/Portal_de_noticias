<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

Use App\Models\Noticia;
Use App\Models\Categoria;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PublicController extends Controller {
    
    public function noticias (){
    
        $noticias = Noticia::where("estado", "Publicado")->orderby('data','asc')->paginate(10);
        return view("Public.Noticias.list",compact('noticias'));
    }

    public function search_noticia(Request $request) {

        $termo = $request->input('search');
        $resultados = Noticia::where('estado', 'Publicado')->where('titulo', 'like', "%{$termo}%")->paginate(10);
        return view('Public.Noticias.search', compact('resultados', 'termo'));
    }

    public function  detalhes ( string $slug ){

        $noticia = Noticia::where('slug', $slug)->where('estado', 'Publicado')->firstOrFail();
        return view('Public.Noticias.detalhes',compact('noticia'));

    }

     public function categorias() {

        $list_categories = Categoria::wherehas('noticias')->paginate(10);
        return view('Public/Categorias/list',compact('list_categories'));
    }


    public function noticia_categoria( int $categoria_id ){

        $noticias_categoria = Noticia::where('categoria_id', $categoria_id)->where('estado','Publicado')->get();
        return view('Public.Categorias.noticias_categoria', compact('noticias_categoria'));
    }

    /* Notícias mais novas (ordem ascendente por data).*/

    public function novas_noticias() {

        $novas_noticias = Noticia::where('estado','Publicado')->orderBy('data', 'asc')->paginate(10);
        return view('Public.Noticias.novas', compact('novas_noticias'));

    }

    /* Notícias mais velhas (ordem descendente por data) */

    public function velhas_noticias() {

        $velhas_noticias = Noticia::where('estado','Publicado')->orderBy('data', 'desc')->paginate(10);
        return view('Public.Noticias.antigas', compact('velhas_noticias'));

    }

    public function create(){

        return view('AuthSys.Register');

    }

    public function save(Request $request) {

            $user_data = $request->validate([

                'nome'     => 'required|string',
                'email'    => 'required|email',
                'password' => 'required|string|min:8',
                'role'     => 'required|string',
            ]);

            $verication_data = $user_data;

        // Forçar role 'user' se a rota for pública
        $user_data['role'] = 'user';
        $user_data['password'] = Hash::make( $user_data['password'] );

        $new_user = User::create($user_data);

        if ( Auth::attempt(  $verication_data) ) {

            $request->session()->regenerate();
            return redirect()->route('home')->with('msg', "Conta criada com êxito! \n E login feito com sucesso.");
        }

        else{

            return redirect()->back()->with('msg','erro, por algum motivo voce nao foi regaistrado ');
        }

      

    
}




}
