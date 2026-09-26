<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Noticia>
 */
class NoticiaFactory extends Factory
{
    public function definition(): array
    {
        $titulo = fake()->sentence(8);

        return [
            'data' => fake()->date(),
            'img' => fake()->imageUrl(),
            'slug' => Str::slug($titulo) . '-' . fake()->unique()->numberBetween(1, 99999),
            'titulo' => $titulo,
            'conteudo' => fake()->paragraphs(5, true),
            'resumo' => fake()->paragraph(2),
            'user_id' => User::factory(),
            'categoria_id' => Categoria::factory(),
            'estado' => fake()->randomElement([
                'Publicado',
                'Despublicado',
                'Rascunho',
            ]),
        ];
    }
}