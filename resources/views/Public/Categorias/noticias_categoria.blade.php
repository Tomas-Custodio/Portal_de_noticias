@extends('Layouts/public')

@section('name', 'Notícias da categoria — PortalNotice')

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

    <div class="mx-auto max-w-7xl px-6 py-10 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-10">

            <div class="mb-5 flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-slate-400 hover:text-blue-600">Home</a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('categorias') }}" class="text-slate-400 hover:text-blue-600">Categorias</a>
                <span class="text-slate-300">/</span>
                <span class="font-medium text-slate-700">
                    {{ $noticias_categoria->first()->categoria->nome ?? 'Categoria' }}
                </span>
            </div>


            <div class="flex flex-col justify-between gap-5 md:flex-row md:items-end">

                <div>

                    <div class="mb-3 flex items-center gap-3">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-600/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            </svg>
                        </div>

                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-blue-600">
                            Categoria
                        </span>

                    </div>


                    <h1 class="text-3xl font-black tracking-tighter text-slate-950 sm:text-4xl">
                        {{ $noticias_categoria->first()->categoria->nome ?? 'Notícias' }}
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                        Todas as notícias publicadas nesta categoria.
                    </p>

                </div>


                <span class="inline-flex self-start rounded-full bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-wider text-blue-600 md:self-auto">
                    {{ $noticias_categoria->count() }}
                    {{ $noticias_categoria->count() === 1 ? 'notícia' : 'notícias' }}
                </span>

            </div>

        </div>


        {{-- LISTA --}}
        @if($noticias_categoria->isEmpty())

            <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center">

                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                        <path d="M19 6h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"/>
                        <path d="M8 8h7"/>
                        <path d="M8 12h7"/>
                        <path d="M8 16h4"/>
                    </svg>
                </div>

                <h2 class="text-lg font-bold text-slate-900">
                    Sem notícias nesta categoria
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Ainda não há notícias publicadas nesta categoria.
                </p>

                <a href="{{ route('categorias') }}"
                   class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white hover:bg-blue-700">
                    Voltar às categorias
                </a>

            </div>

        @else

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($noticias_categoria as $noticia)

                    <article class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl">

                        {{-- IMAGEM --}}
                        <div class="relative overflow-hidden">

                            @if($noticia->img)
                                <img src="{{ asset('storage/' . $noticia->img) }}"
                                     alt="{{ $noticia->titulo }}"
                                     class="h-48 w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-48 w-full items-center justify-center bg-slate-100 text-xs text-slate-400">
                                    Sem imagem
                                </div>
                            @endif

                            <div class="absolute inset-x-0 top-0 flex items-center justify-between p-3">

                                <span class="rounded-lg bg-white/90 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-blue-600 backdrop-blur">
                                    {{ $noticia->categoria->nome ?? 'Notícia' }}
                                </span>

                                <span class="rounded-lg bg-slate-950/70 px-2.5 py-1 text-[10px] font-medium text-white backdrop-blur">
                                    {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                </span>

                            </div>

                        </div>


                        {{-- CONTEÚDO --}}
                        <div class="flex flex-1 flex-col p-5">

                            <h3 class="text-lg font-bold leading-snug text-slate-900 line-clamp-2 transition group-hover:text-blue-600">
                                {{ $noticia->titulo }}
                            </h3>

                            <p class="mt-2 flex-1 text-sm leading-6 text-slate-500 line-clamp-3">
                                {{ $noticia->resumo }}
                            </p>


                            {{-- META --}}
                            <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-4 text-xs text-slate-400">

                                <span class="inline-flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path d="M12 7v5l3 2"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($noticia->data)->diffForHumans() }}
                                </span>

                                <span class="inline-flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                    {{ $noticia->user->nome ?? 'Redação' }}
                                </span>

                            </div>


                            {{-- LINK --}}
                            <a href="{{ route('detalhes', $noticia->slug) }}"
                               class="mt-4 inline-flex items-center gap-1.5 text-sm font-bold text-blue-600 transition hover:text-blue-700">
                                Ler notícia
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        @endif


        {{-- VOLTAR --}}
        
        <div class="mt-12 border-t border-slate-200 pt-8">
            <a href="{{ route('categorias') }}"
               class="group inline-flex items-center gap-2 text-sm font-bold text-blue-600 transition hover:text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition group-hover:-translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5"/>
                    <path d="m12 19-7-7 7-7"/>
                </svg>
                Voltar às categorias
            </a>
        </div>

    </div>

</div>

@endsection