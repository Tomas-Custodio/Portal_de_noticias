@extends('Layouts/admin')

@section('title', 'Categorias')
@section('page_title', 'Categorias')

@section('conteudo')

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        <header class="mb-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                {{-- TÍTULO --}}
                <div>

                    <div class="mb-2 flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-indigo-600"></span>

                        <span class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            Administração
                        </span>

                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">
                        Categorias
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Gerencie as categorias utilizadas para organizar,
                        classificar e estruturar as notícias do portal.
                    </p>

                </div>


                {{-- AÇÕES --}}
                <div class="flex w-full flex-col gap-2 sm:w-auto sm:flex-row">

                    {{-- NOVA CATEGORIA --}}
                    <a
                        href="{{ route('categoria.create') }}"
                        class="group flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/20 sm:w-auto"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>
                        </svg>

                        Nova categoria

                    </a>

                </div>

            </div>

        </header>


        {{-- =========================================================
            MENSAGEM
        ========================================================== --}}
        @if(session('msg'))

            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-emerald-900">
                            Operação realizada
                        </p>

                        <p class="text-sm text-emerald-700">
                            {{ session('msg') }}
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================================================
            3 CARDS DE ESTATÍSTICAS
        ========================================================== --}}
        <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">


            {{-- TOTAL DE CATEGORIAS --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Total categorias
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $categorias }}
                        </p>

                    </div>


                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-indigo-500">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>

                    </div>

                </div>

            </div>


            {{-- COM NOTÍCIAS --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Com notícias
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $categorias_noticias }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-500">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>

                    </div>

                </div>

            </div>


            {{-- SEM NOTÍCIAS --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Sem notícias
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $categorias_vazias }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-500">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 7v5l3 2"/>
                        </svg>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            ÚLTIMAS CATEGORIAS
        ========================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- CABEÇALHO --}}
            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h2 class="text-base font-bold text-slate-900 sm:text-lg">
                            Últimas categorias
                        </h2>

                        <p class="mt-1 text-xs text-slate-400">
                            Categorias com notícias mais recentes no sistema
                        </p>

                    </div>


                    {{-- PESQUISA --}}
                    <form
                        action="{{ route('categorias.search') }}"
                        method="Post"
                        class="flex w-full items-center gap-2 sm:w-auto"
                    >

                        {{-- INPUT DE PESQUISA --}}
                        <div class="group/search relative flex-1 sm:w-72">

                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 transition group-focus-within/search:text-indigo-600">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="7"/>
                                    <path d="m21 21-4.3-4.3"/>
                                </svg>

                            </div>


                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Pesquisar categoria..."
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                            >

                        </div>


                        {{-- BOTÃO PESQUISAR --}}
                        <button
                            type="submit"
                            class="group inline-flex shrink-0 items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-[0.98]"
                        >

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3"/>
                            </svg>

                            <span class="hidden sm:inline">Pesquisar</span>

                        </button>

                    </form>

                </div>

            </div>


            {{-- LISTA --}}
            @if($categorias_recentes->count())

                <div class="divide-y divide-slate-100">

                    @foreach($categorias_recentes as $categoria)

                        @php
                            $total = $categoria->noticias_count ?? $categoria->noticias()->count();
                        @endphp

                        <div class="group flex flex-col gap-4 p-5 transition hover:bg-slate-50 sm:flex-row sm:items-center sm:justify-between sm:px-6">

                            <div class="flex min-w-0 items-center gap-4">

                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 text-base font-bold text-indigo-600 transition-colors group-hover:bg-indigo-600 group-hover:text-white">
                                    {{ strtoupper(substr($categoria->nome, 0, 1)) }}
                                </div>

                                <div class="min-w-0">

                                    <p class="truncate text-sm font-bold text-slate-900">
                                        {{ $categoria->nome }}
                                    </p>

                                    <p class="mt-0.5 text-xs text-slate-400">
                                        #{{ $categoria->id }} • {{ $total }} {{ $total === 1 ? 'notícia' : 'notícias' }}
                                    </p>

                                </div>

                            </div>


                            <div class="flex flex-wrap items-center gap-2">

                                @if($total > 0)

                                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Ativa
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-amber-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Vazia
                                    </span>

                                @endif


                                {{-- EDITAR --}}
                                <a
                                    href="{{ route('categoria.edit', $categoria->id) }}"
                                    title="Editar categoria"
                                    class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-all hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                    </svg>
                                </a>


                                {{-- ELIMINAR --}}
                                <form
                                    action="{{ route('categoria.delete', $categoria->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Remover esta categoria?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        title="Eliminar categoria"
                                        class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-all hover:border-red-200 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/10"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                        </svg>
                                    </button>
                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="px-6 py-16 text-center">

                    @if(request('search'))

                        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3"/>
                            </svg>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Sem resultados
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Não encontrámos categorias com "<span class="font-semibold text-indigo-600">{{ request('search') }}</span>".
                        </p>

                        <a
                            href="{{ route('categorias.home') }}"
                            class="mt-5 inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 12H5"/>
                                <path d="m12 19-7-7 7-7"/>
                            </svg>
                            Limpar pesquisa
                        </a>

                    @else

                        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            </svg>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Sem categorias com notícias
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Ainda não há categorias associadas a notícias.
                        </p>

                        <a
                            href="{{ route('categorias.list') }}"
                            class="mt-5 inline-flex rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white hover:bg-indigo-700"
                        >
                            Ver todas as categorias
                        </a>

                    @endif

                </div>

            @endif

        </section>

    </div>

</div>

@endsection