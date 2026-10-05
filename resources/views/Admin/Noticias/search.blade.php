@extends('Layouts/admin')

@section('title', 'Pesquisa de notícias')
@section('page_title', 'Pesquisa de notícias')

@section('conteudo')

<div class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 sm:py-8 lg:px-8">

    {{-- ==================== BANNER DE PESQUISA ==================== --}}
    <section class="relative overflow-hidden rounded-3xl bg-slate-900 px-6 py-10 sm:px-12 sm:py-14">

        {{-- brilho decorativo --}}
        <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-indigo-500/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 left-1/4 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>

        <div class="relative mx-auto max-w-2xl text-center">

            <h1 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                O que procura hoje?
            </h1>
            <p class="mt-3 text-sm text-slate-300 sm:text-base">
                Pesquise pelo título para encontrar, editar ou eliminar uma notícia.
            </p>

            <form action="{{ route('noticias.search') }}" method="POST" class="mt-8">
                @csrf

                <label for="search" class="sr-only">Título da notícia</label>

                <div class="flex flex-col gap-2 rounded-2xl bg-white p-2 shadow-2xl shadow-black/30 sm:flex-row sm:items-center">

                    <div class="flex flex-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 h-5 w-5 shrink-0 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m21 21-4.3-4.3"/>
                        </svg>

                        <input
                            id="search"
                            type="text"
                            name="search"
                            value="{{ $termo ?? '' }}"
                            placeholder="Título da notícia"
                            autocomplete="off"
                            autofocus
                            class="w-full border-0 bg-transparent px-3 py-3 text-base text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-0"
                        >
                    </div>

                    <button type="submit"
                            class="rounded-xl bg-indigo-600 px-7 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 active:scale-[0.98]">
                        Pesquisar
                    </button>

                </div>
            </form>

            <a href="{{ route('noticias.home') }}"
               class="mt-6 inline-flex items-center gap-2 text-sm font-medium text-slate-300 transition hover:text-white focus:outline-none focus-visible:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5"/>
                    <path d="m12 19-7-7 7-7"/>
                </svg>
                Voltar à lista
            </a>

        </div>

    </section>


    {{-- ==================== RESULTADOS ==================== --}}
    @isset($resultado)

        <div class="mb-5 mt-10 flex items-baseline justify-between gap-4" aria-live="polite">
            <h2 class="text-lg font-bold text-slate-900">
                {{ $resultado->total() }}
                {{ $resultado->total() === 1 ? 'resultado' : 'resultados' }}
            </h2>
            <p class="truncate text-sm text-slate-500">
                para <span class="font-semibold text-indigo-600">"{{ $termo }}"</span>
            </p>
        </div>

        @if($resultado->total() > 0)

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($resultado as $noticia)

                    @php
                        $estado = strtolower($noticia->estado);
                        $publicado = in_array($estado, ['publicado', 'aberto']);
                    @endphp

                    <article class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white transition duration-200 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/70">

                        {{-- IMAGEM --}}
                        <div class="relative aspect-[16/9] overflow-hidden bg-slate-100">

                            @if($noticia->img)
                                <img src="{{ asset('storage/' . $noticia->img) }}"
                                     alt="{{ $noticia->titulo }}"
                                     loading="lazy"
                                     class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full items-center justify-center text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                                        <circle cx="9" cy="9" r="2"/>
                                        <path d="m21 15-3.1-3.1a2 2 0 0 0-2.8 0L6 21"/>
                                    </svg>
                                </div>
                            @endif

                            {{-- ESTADO sobre a imagem --}}
                            <div class="absolute left-3 top-3">
                                @if($publicado)
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-2.5 py-1 text-xs font-semibold text-emerald-700 shadow-sm">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Publicado
                                    </span>
                                @elseif($estado === 'rascunho')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-2.5 py-1 text-xs font-semibold text-amber-700 shadow-sm">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Rascunho
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-2.5 py-1 text-xs font-semibold text-slate-600 shadow-sm">
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                        {{ ucfirst($noticia->estado) }}
                                    </span>
                                @endif
                            </div>

                        </div>


                        {{-- CONTEÚDO --}}
                        <div class="flex flex-1 flex-col p-5">

                            <p class="text-xs text-slate-500">
                                <span class="font-semibold text-indigo-600">{{ $noticia->categoria->nome ?? 'Sem categoria' }}</span>
                                <span class="mx-1 text-slate-300">|</span>
                                {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                            </p>

                            <h3 class="mt-2 line-clamp-2 text-base font-bold leading-snug text-slate-900">
                                <a href="{{ route('noticias.edit', $noticia->id) }}"
                                   class="transition hover:text-indigo-600 focus:outline-none focus-visible:underline">
                                    {{ $noticia->titulo }}
                                </a>
                            </h3>

                            <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-slate-500">
                                {{ $noticia->resumo }}
                            </p>

                            {{-- AÇÕES --}}
                            <div class="mt-auto flex items-center gap-2 border-t border-slate-100 pt-4">

                                <a href="{{ route('noticias.edit', $noticia->id) }}"
                                   class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                    </svg>
                                    Editar
                                </a>

                                <form action="{{ route('noticias.delete', $noticia->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Remover esta notícia?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Eliminar notícia"
                                            aria-label="Eliminar notícia"
                                            class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                        </svg>
                                    </button>
                                </form>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>


            {{-- PAGINAÇÃO --}}
            @if($resultado->hasPages())
                <div class="mt-8">
                    {{ $resultado->links() }}
                </div>
            @endif

        @else

            {{-- ==================== SEM RESULTADOS ==================== --}}
            <section class="rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Nenhuma notícia encontrada</h3>
                <p class="mx-auto mt-1 max-w-sm text-sm text-slate-500">
                    Não há títulos com "{{ $termo }}". Verifique a escrita ou tente uma palavra mais curta.
                </p>
            </section>

        @endif

    @endisset

</div>

@endsection