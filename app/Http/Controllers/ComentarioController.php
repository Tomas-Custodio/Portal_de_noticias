<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function create (int $noticia_id) {

        $noticia_found = Noticia::where('id',$noticia_id)->first();
        $comentarios = Comentario::where('noticia_id',$noticia_id)->get();

        return view('Public.Noticias.comentarios',compact('noticia_found','comentarios'));

    }

       public function save(Request $request, int $noticia_id)
    {
        // 1. Validar os dados
        $data = $request->validate([
            'user_id'      => 'required|integer|exists:users,id',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'descricao'    => 'required|string|min:2|max:1000',
        ]);

        $noticia = Noticia::findOrFail($noticia_id);

        $new_data = [
            
                     'user_id'      => $data['user_id'],
                     'noticia_id'   => $noticia->id,
                     'categoria_id' => $data['categoria_id'],
                     'descricao'    => $data['descricao'] ];
        // 2. Confirma que a notícia existe (404 se não existir)
        
        // 3. Criar o comentário
        $novo_comentario = Comentario::create($new_data);

        // 4. Redirecionar de volta para a notícia
        return redirect()
            ->route('detalhes', $noticia->slug)->with('msg', 'Comentário adicionado com êxito!');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
