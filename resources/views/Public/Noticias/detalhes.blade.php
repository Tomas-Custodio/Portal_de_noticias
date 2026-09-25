@extends('Layouts/public')

@section('nome')
    {{ $noticia->titulo }}
@endsection

@section('conteudo')

    <div class="max-w-3xl mx-auto px-4 py-10">

        <a href="{{ route('noticias') }}" class="text-sm text-blue-600 hover:underline mb-6 inline-block">
            ← Voltar às notícias
        </a>

        <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full mb-4">

           Categoria : {{ $noticia->categoria?->nome }}

        </span>

        <h1 class="text-3xl font-bold text-gray-900 mb-3 leading-tight"> {{ $noticia->titulo }} </h1>

        <div class="text-sm text-gray-500 mb-6">

            Publicado por: {{ $noticia->usuario?->nome}} em : {{ $noticia?->data}}

        </div>


        <img src="{{ asset('storage/' . $noticia->img) }}" alt="{{ $noticia->titulo }}" class="w-full h-auto rounded-xl mb-8 object-cover">

        <section class="flex flex-col gap-2">

            <h2 class="bg-slate-300 p-1 rounded-md px-2">Conteudo completo : </h2>

            <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">

                {{ ($noticia->conteudo) }}

            </div>

            <h2 class="bg-slate-300 p-1 rounded-md px-2">resumo : </h2>
            
            <p>{{ ($noticia->resumo) }}</p>

        </section>

    </div>

@endsection