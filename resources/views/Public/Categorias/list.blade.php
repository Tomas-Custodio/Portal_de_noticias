@extends('Layouts/public')

@section('name', 'Categorias — PortalNotice')

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

    <div class="mx-auto max-w-7xl px-6 py-10 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-10 flex flex-col justify-between gap-5 md:flex-row md:items-end">

            <div>

                <div class="mb-3 flex items-center gap-2 text-sm text-slate-500">
                    <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                    <span>/</span>
                    <span class="font-medium text-slate-700">Categorias</span>
                </div>

                <p class="mb-2 text-sm font-semibold text-blue-600">
                    Organização do portal
                </p>

                <h1 class="text-3xl font-bold tracking-tight">
                    Todas as categorias
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Explore as categorias e encontre as notícias que mais lhe interessam.
                </p>

            </div>


            {{-- CONTADOR --}}
            <span class="inline-flex self-start rounded-full bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-wider text-blue-600 md:self-auto">
                {{ $list_categories->total() }} {{ $list_categories->total() === 1 ? 'categoria' : 'categorias' }}
            </span>

        </div>


        {{-- GRID DE CATEGORIAS --}}
        @if($list_categories->isEmpty())

            <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center">

                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    </svg>
                </div>

                <h2 class="text-lg font-bold text-slate-900">
                    Sem categorias
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Ainda não existem categorias registadas.
                </p>

                <a href="{{ route('home') }}"
                   class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white hover:bg-blue-700">
                    Voltar à home
                </a>

            </div>

        @else

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($list_categories as $categoria)

                    <article class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl">

                        {{-- ÍCONE DA CATEGORIA --}}
                        <div class="flex items-center justify-between">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-xl font-black text-blue-600 transition duration-300 group-hover:bg-blue-600 group-hover:text-white">
                                {{ strtoupper(substr($categoria->nome, 0, 1)) }}
                            </div>

                            <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                #{{ $categoria->id }}
                            </span>

                        </div>


                        {{-- NOME --}}
                        <h3 class="mt-5 text-xl font-bold leading-snug text-slate-900 transition group-hover:text-blue-600">
                            {{ $categoria->nome }}
                        </h3>

                        <p class="mt-2 flex-1 text-sm leading-6 text-slate-500">
                            Explore as notícias publicadas nesta categoria.
                        </p>


                        {{-- CONTAGEM DE NOTÍCIAS --}}
                        <div class="mt-4 flex items-center gap-2 text-xs font-medium text-slate-500">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                                <path d="M19 6h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"/>
                                <path d="M8 8h7"/>
                                <path d="M8 12h7"/>
                                <path d="M8 16h4"/>
                            </svg>

                            {{ $categoria->noticias_count ?? 0 }}
                            {{ ($categoria->noticias_count ?? 0) === 1 ? 'notícia' : 'notícias' }}

                        </div>


                        {{-- LINK --}}
                        <a href="{{ route('noticia_categoria',$categoria->id) }}"

                           class="mt-5 inline-flex items-center justify-between border-t border-slate-100 pt-4 text-sm font-bold text-blue-600 transition hover:text-blue-700">

                            <span>Ver notícias</span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m13 6 6 6-6 6"/>
                            </svg>

                        </a>

                    </article>

                @endforeach

            </div>


            {{-- PAGINAÇÃO --}}
            @if($list_categories->hasPages())
                <div class="mt-12">
                    {{ $list_categories->links() }}
                </div>
            @endif

        @endif

    </div>

</div>

@endsection