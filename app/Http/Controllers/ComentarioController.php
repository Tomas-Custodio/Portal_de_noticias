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
        return view('Public.Comentarios.create',compact('noticia_found','comentarios'));

    }

       public function save(Request $request, int $noticia_id){


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
            return redirect()->route('comentario.create', $novo_comentario->noticia->id)
                ->with('msg', 'Comentário adicionado com êxito!');
    }
   
    
            public function edit(int $comentario_id){

                $comentario_found = Comentario::findOrFail($comentario_id);
                return view('Public.Comentarios.edit', compact('comentario_found'));
            }

        public function update(Request $request, string $comentario_id) {

            $comentario_found = Comentario::findOrFail($comentario_id);

            $comentario_data = $request->validate(['descricao' => 'required|string']);
            $comentario_found->update($comentario_data);

            return redirect()->route('comentario.create',$comentario_found->noticia_id)->with('success', 'Comentário atualizado com sucesso.');}

        public function delete(string $comentario_id){

            $comentario_found = Comentario::findOrFail($comentario_id);
            $comentario_found->delete();

            return redirect()->back()->with('success', 'Comentário eliminado com sucesso.');
        }
}
