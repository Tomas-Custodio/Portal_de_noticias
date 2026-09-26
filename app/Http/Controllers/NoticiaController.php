<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Noticia;
use App\Models\Categoria;

class NoticiaController extends Controller
{
     
public function index(){

    $noticias = Noticia::paginate(10);

    $rascunhos = Noticia::where('estado','Rascunho')->count();
    $despublicadas = Noticia::where('estado','Despublicado')->count();
    $publicadas = Noticia::where('estado','Publicado')->count();

    return view('Admin/Noticias/index',compact('noticias','despublicadas','rascunhos','publicadas'));
}

/**
 * Pesquisa notícias por título.
 */
public function search(Request $request)
{
    $termo = $request->input('search', '');

    $resultado = null;

    if (!empty($termo)) {

        $resultado = Noticia::with(['categoria', 'usuario'])
            ->where('titulo', 'like', "%{$termo}%")
            ->orderBy('data', 'desc')
            ->paginate(15);

    }

    return view('Admin.Noticias.search', compact('termo', 'resultado'));
}




public function  detalhes ( string $slug ){

    $noticia = Noticia::where('slug', $slug)
        ->where('estado', 'aberto')
        ->firstOrFail();

    return view('Admin/Noticias/detalhes',compact('noticia'));

}

    # function to list all notices that exist in the system

    public function list_noticias()
    {
        $list_noticias = Noticia::where('estado','Publicado')->paginate(10);

        return view('Admin/Noticias/list',compact('list_noticias')
        );
    }


    # function to show the form to create a new notice
    public function create()
    {
        $categorias = Categoria::all();
        $users = User::all();
        return view('Admin/Noticias/create',compact('categorias','users'));
    }


    # function to save a new notice
    public function save(Request $request)
    {

      $noticias_date = $request->validate([

            "img"      => "required|file",
            "data"     => "required|date",
            "estado"   => "required|string",
            "resumo"   => "required|string",
            "titulo"   => "required|string",
            "conteudo" => "required|string",
            "estado"   => "required|string",

            "user_id" => "required|integer",
            "categoria_id" => "required|integer",
        ]);

        $sluged_titulo = Str::slug($noticias_date['titulo']);

        $img = $noticias_date['img'];
        $img_storage = $img->store('noticias', 'public'); 

        $noticias_date['img'] = $img_storage;
    
        $org_noticia = [

                "img"     =>  $noticias_date['img'],
                "data"    =>  $noticias_date['data'],
                "slug"    =>  $sluged_titulo,
                "estado"  =>  $noticias_date['estado'],
                "resumo"  =>  $noticias_date['resumo'],
                'titulo'  =>  $noticias_date["titulo"],
                "conteudo" =>  $noticias_date['conteudo'],
                "estado" =>  $noticias_date['estado'],

                "user_id" =>  $noticias_date['user_id'],
                "categoria_id" => $noticias_date['categoria_id'], ];

        $new_noticia = Noticia::create($org_noticia);



        return redirect()->back()->with("msg", "Essa noticia foi criada com exito !");

    }


    # function to show the edit form
    public function view_edit(int $id_noticia)
    {
        $noticia_found = Noticia::findOrFail( $id_noticia);

        $categorias =Categoria::all('id','nome');
        $users = User::all('id','nome');

        return view(
            'Admin/Noticias/edit',
            compact('noticia_found','categorias','users')
        );
    }


    # function to save the edited notice
    public function save_edit(
        Request $request,
        int $id_noticia
    ) {

        $noticias_data = $request->validate([

            'img' => 'nullable|image',

            'data' => 'required|date',

            'estado' => 'required|string',

            'resumo' => 'required|string',

            'titulo' => 'required|string',

            'conteudo' => 'required|string',

            'user_id' => 'required|integer|exists:users,id',

            'categoria_id' => 'required|integer|exists:categorias,id',

        ]);


        $noticia_found = Noticia::findOrFail($id_noticia);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $sluged_titulo = Str::slug($noticias_data['titulo']);

        $slug = $sluged_titulo;

        $contador = 1;


        while (
            Noticia::where('slug', $slug)
                ->where('id', '!=', $id_noticia)
                ->exists()
        ) {

            $slug = $sluged_titulo . '-' . $contador;

            $contador++;
        }


        /*
        |--------------------------------------------------------------------------
        | Dados para atualizar
        |--------------------------------------------------------------------------
        */

        $noticia_found->titulo = $noticias_data['titulo'];

        $noticia_found->slug = $slug;

        $noticia_found->data = $noticias_data['data'];

        $noticia_found->estado = $noticias_data['estado'];

        $noticia_found->resumo = $noticias_data['resumo'];

        $noticia_found->conteudo = $noticias_data['conteudo'];

        $noticia_found->user_id = $noticias_data['user_id'];

        $noticia_found->categoria_id = $noticias_data['categoria_id'];


        /*
        |--------------------------------------------------------------------------
        | Nova imagem
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('img')) {

            $img_path = $request->file('img')->store('noticias', 'public');$noticia_found->img = $img_path;
        }

        $noticia_found->save();
        return redirect()->route('noticias.list')->with('msg','A notícia foi actualizada com êxito!');
    }

    # function that allows an admin to delete any notice

    public function delete(int $id_noticia){

        $noticia_found = Noticia::findOrFail($id_noticia);
        $noticia_found->delete();
        return redirect()->back()->with('msg','Essa notícia foi deletada do sistema com êxito!');
    }

    /**
     * Lista de rascunhos (admin).
     */
    public function rascunhos(){

        $rascunhos = Noticia::where('estado', 'Rascunho')->orderBy('data', 'asc')->paginate(10);
        return view('Admin.Noticias.rascunhos', compact('rascunhos'));

    }

    /* Notícias despublicadas (admin) — neste sistema = rascunhos.*/

    public function despublicados(){

        $despublicados = Noticia::where('estado', 'Despublicado')->orderBy('data', 'asc')->paginate(10);
        return view('Admin.Noticias.despublicados', compact('despublicados'));
        
    }

}