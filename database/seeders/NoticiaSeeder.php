<?php

namespace Database\Seeders;

use App\Models\Noticia;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categorias = Categoria::all();

        Noticia::factory(50)->create([
            'user_id' => fn () => $users->random()->id,
            'categoria_id' => fn () => $categorias->random()->id,
        ]);
    }
}