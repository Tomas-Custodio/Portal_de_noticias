<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller {
    public function index() {

        $categorias = Categoria::count();
        $categorias_noticias = Categoria::wherehas('noticias')->count();
        $categorias_vazias = Categoria::wheredoesnthave('noticias')->count();
        $categorias_recentes = Categoria::whereHas('noticias')->take(5)->get();

        return view('Admin/Categorias/index',compact('categorias','categorias_noticias','categorias_vazias','categorias_recentes'));
    }


    # function that list all categories tho show in..... system views

    public function get_all()
    {
        $list_categories = Categoria::paginate(10);

        return view('Admin/Categorias/list',compact('list_categories'));}


    # Function that send the admin to view to create a new news category.

    public function create(){
        return view('Admin/Categorias/create');
    }


    # Function that create a new category to news system.

    public function save(Request $request)
    {
        $categoria_data = $request->validate([
            'nome' => 'required|string',
        ]);

        #dd($categoria_data);


        # verifying if the current category already exists in the system before create

        if (Categoria::where('nome', $categoria_data['nome'])->exists()) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'msg',
                    "Essa categoria já existe no sistema,
                    para evitar duplicidades, é melhor mudar de nome"
                );
        }

        else{
            $new_categoria = Categoria::create($categoria_data);
            
            return redirect()
            ->back()
            ->with(
                'msg',
                'Nova Categoria adicionada ao sistema com exito!'
            );
        }

    }

    # Function to delete categories in the system.

    public function delete(int $id_categoria)
    {
        $categoria_found = Categoria::findOrFail($id_categoria);

          if ( $categoria_found->noticias()->exists()){

             return redirect()->back()->with('msg',"essa categoria nao pode ser eliminada pois uma noticia depende dela.");
            }

        else{
            
        $categoria_found->delete();

        return redirect()->back()
            ->with(
                'msg',
                'Essa categoria já não existe nesse sistema
                [categoria deletada com exito]'
            );
        
        }

        
    }

    # Function to redirect the admin to the room to edit categories info

    public function edit_view(int $id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);

        return view(
            'Admin/Categorias/edit',
            compact('categoria')
        );
    }

    # Function that update category information in the system.

    public function update(Request $request, int $id_categoria)
    {
        $categoria_data = $request->validate([
            'nome' => 'required|string',
        ]);


        # verifying if another category already has the same name

        if (
            Categoria::where('nome', $categoria_data['nome'])
                ->where('id', '!=', $id_categoria)
                ->exists()
        ) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'msg',
                    "Essa categoria já existe no sistema,
                    para evitar duplicidades, é melhor mudar de nome"
                );
        }

        $categoria_found = Categoria::findOrFail($id_categoria);

            $categoria_found->update($categoria_data);


            return redirect()
                ->route('categorias.list')
                ->with(
                    'msg',
                    'Categoria actualizada com exito!'
                );
    }
}