@extends('Layouts/public')

@section('nome', $noticia->titulo)

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">

        {{-- BOTÃO VOLTAR --}}
        <a
            href="{{ route('noticias') }}"
            class="group mb-8 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 transition hover:text-blue-700"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition group-hover:-translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5"/>
                <path d="m12 19-7-7 7-7"/>
            </svg>
            Voltar às notícias
        </a>


        {{-- =========================================================
            GRID: ESQUERDA (FIXA) + DIREITA (SCROLL)
        ========================================================== --}}
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-[340px_1fr] lg:gap-12">


            {{-- =====================================================
                COLUNA ESQUERDA — FIXA
            ====================================================== --}}
            <aside class="lg:sticky lg:top-6 lg:self-start">

                {{-- TÍTULO COM "SOBRE" EMBUTIDO --}}
                <h3 class="text-2xl font-black leading-tight tracking-tight text-black sm:text-4xl">

                    <span class="font-black text-black">
                        Sobre:
                    </span>

                    {{ $noticia->titulo }}

                </h3>


                {{-- IMAGEM DE CAPA --}}
                @if($noticia->img)

                    <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-slate-100 shadow-lg shadow-slate-200/60">

                        <div class="aspect-cinema w-full">

                            <img
                                src="{{ asset('storage/' . $noticia->img) }}"
                                alt="{{ $noticia->titulo }}"
                                class="h-full w-full object-contain"
                                loading="lazy"
                            >

                        </div>

                    </div>

                @endif


                {{-- CATEGORIA + PUBLICADO POR --}}
                <div class="mt-5 flex flex-col gap-2 border-t border-slate-200 pt-4">


                    {{-- CATEGORIA (SEM ÍCONE) --}}

                    @if($noticia->categoria)

                        <span class="inline-flex w-fit items-center rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-blue-600">

                            Categoria : {{ $noticia->categoria->nome }}

                        </span>

                    @endif


                    {{-- PUBLICADO POR --}}
                    <p class="text-xs text-slate-700 bg-blue-300 rounded-full p-1">

                        Publicado por

                        <span class="font-semibold text-slate-700">
                            {{ $noticia->usuario?->nome }}
                        </span>

                        em

                        <span class="font-semibold text-slate-700">
                            {{ \Carbon\Carbon::parse($noticia->data)->locale('pt')->translatedFormat('d \d\e F \d\e Y') }}
                        </span>

                    </p>

                </div>

            </aside>


            {{-- =====================================================
                COLUNA DIREITA — CONTEÚDO COM SCROLL
            ====================================================== --}}
            <main
                class="lg:max-h-[calc(100vh-6rem)] lg:overflow-y-auto lg:pr-4
                    [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-transparent
                    [&::-webkit-scrollbar-thumb]:rounded-full
                    [&::-webkit-scrollbar-thumb]:bg-slate-300
                    hover:[&::-webkit-scrollbar-thumb]:bg-slate-400"
            >

                {{-- CONTEÚDO --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                    <div class="whitespace-pre-line text-justify text-base leading-8 text-slate-700 sm:text-lg sm:leading-9">
                        {{ $noticia->conteudo }}
                    </div>

                </div>


                {{-- RESUMO --}}
                @if($noticia->resumo)

                    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <p class="mb-3 text-xs font-bold uppercase tracking-widest text-slate-400">
                            Resumo
                        </p>

                        <p class="text-justify text-base leading-8 text-slate-700 sm:text-lg sm:leading-9">
                            {{ $noticia->resumo }}
                        </p>

                    </div>

                @endif


                

            </main>

        </div>

    </div>

</div>

@endsection