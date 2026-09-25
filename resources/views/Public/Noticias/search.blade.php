@extends('Layouts/public')

@section('nome')
    Pesquisa de Notícias
@endsection

@section('conteudo')

    <section class="max-w-6xl mx-auto px-4 py-10">

        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800">
                Resultados para: <span class="text-blue-600">"{{ $termo }}"</span>
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                {{ $resultados->total() }} {{ $resultados->total() == 1 ? 'resultado encontrado' : 'resultados encontrados' }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($resultados as $noticia)

                <a href="{{ route('detalhes', $noticia->slug) }}" class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden flex flex-col">

                    <img
                        src="{{ asset('storage/' . $noticia->img) }}"
                        alt="{{ $noticia->titulo }}"
                        class="w-full h-48 object-cover"
                    >

                    <div class="p-4 flex flex-col flex-1">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                            {{ $noticia->titulo }}
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3 flex-1">
                            {{ $noticia->resumo }}
                        </p>
                    </div>

                    <p class="text-center p-1 bg-blue-600 text-white"> clique aqui para ler mais</p>

                </a>

                <!-- verifying if the searched request doest exits in the sistem --->

            @empty
                <div class="col-span-full text-center py-16">
                    <p class="text-gray-500 text-lg">
                        Nenhuma notícia encontrada para "{{ $termo }}".
                    </p>
                    <a href="{{ route('noticias') }}" class="text-blue-600 hover:underline text-sm mt-3 inline-block">
                        ← Voltar às notícias
                    </a>
                </div>
            @endforelse

    

        </div>

       

        @if ($resultados->count() > 0)
            <div class="mt-10">
                {{ $resultados->links() }}
            </div>
        @endif

    </section>

@endsection