@extends('Layouts/admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('conteudo')

<div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 sm:pb-16">

    {{-- HEADER --}}
    <div class="mb-8 sm:mb-10">

        <div class="mb-4 flex flex-wrap items-center gap-2 text-xs text-slate-400 sm:mb-5 sm:text-sm">
            <span class="font-medium">Administração</span>
            <span class="text-slate-300">/</span>
            <span class="font-medium text-slate-600">Dashboard</span>
        </div>


        <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

            <div class="min-w-0">

                <div class="mb-3 flex flex-wrap items-center gap-2 sm:mb-4 sm:gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20 sm:h-12 sm:w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="9" rx="1.5"/>
                            <rect x="14" y="3" width="7" height="5" rx="1.5"/>
                            <rect x="14" y="12" width="7" height="9" rx="1.5"/>
                            <rect x="3" y="16" width="7" height="5" rx="1.5"/>
                        </svg>
                    </div>

                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-indigo-600 sm:py-1.5 sm:text-xs">
                        Visão geral
                    </span>

                </div>


                <h1 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl lg:text-4xl">
                    Dashboard
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500 sm:mt-3">
                    Bem-vindo de volta! Aqui tens um resumo do estado atual do portal.
                </p>

            </div>


            <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:gap-3">

                <a
                    href="{{ route('noticias.create') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/25 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-[0.98] sm:w-auto sm:px-5 sm:py-3"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>
                    </svg>
                    Nova notícia
                </a>


                <a
                    href="{{ route('categoria.create') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition duration-200 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 active:scale-[0.98] sm:w-auto sm:px-5 sm:py-3"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>
                    </svg>
                    Nova categoria
                </a>


                <a
                    href="{{ route('users.create') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition duration-200 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 active:scale-[0.98] sm:w-auto sm:px-5 sm:py-3"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>
                    </svg>
                    Novo usuário
                </a>

            </div>

        </div>

    </div>


    {{-- NOTÍCIAS --}}
    <div class="mb-4 flex items-center gap-3 sm:mb-5">
        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                <path d="M19 6h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"/>
            </svg>
        </div>
        <div>
            <h2 class="text-sm font-bold text-slate-900 sm:text-base">Notícias</h2>
            <p class="text-xs text-slate-500">Estado das notícias no portal</p>
        </div>
    </div>


    <div class="mb-6 grid gap-3 sm:mb-8 sm:grid-cols-2 sm:gap-4 lg:grid-cols-4">

        <a href="{{ route('noticias.home') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Total de notícias</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $total_noticias }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">{{ $noticias_mes }} criadas este mês</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 transition duration-300 group-hover:bg-indigo-600 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                        <path d="M19 6h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"/>
                        <path d="M8 8h7"/>
                        <path d="M8 12h7"/>
                        <path d="M8 16h4"/>
                    </svg>
                </div>
            </div>
        </a>


        <div class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Notícias publicadas</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $noticias_publicadas }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">visíveis no portal</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 transition duration-300 group-hover:bg-emerald-600 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>
                </div>
            </div>
        </div>


        <a href="{{ route('noticias.despublicados') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-red-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Notícias despublicadas</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $noticias_despublicadas ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">retiradas do portal</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600 transition duration-300 group-hover:bg-red-500 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                        <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                        <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                        <line x1="2" x2="22" y1="2" y2="22"/>
                    </svg>
                </div>
            </div>
        </a>


        <a href="{{ route('noticias.rascunhos') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Notícias em rascunho</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $noticias_rascunhos }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">ainda por publicar</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600 transition duration-300 group-hover:bg-amber-500 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                    </svg>
                </div>
            </div>
        </a>

    </div>


    {{-- ORGANIZAÇÃO --}}
    <div class="mb-4 flex items-center gap-3 sm:mb-5">
        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
            </svg>
        </div>
        <div>
            <h2 class="text-sm font-bold text-slate-900 sm:text-base">Organização e acessos</h2>
            <p class="text-xs text-slate-500">Categorias e utilizadores do sistema</p>
        </div>
    </div>


    <div class="mb-6 grid gap-3 sm:mb-8 sm:grid-cols-2 sm:gap-4">

        <a href="{{ route('categorias.home') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Total de categorias</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $total_categorias }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">organizando as notícias</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600 transition duration-300 group-hover:bg-slate-800 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    </svg>
                </div>
            </div>
        </a>


        <a href="{{ route('users.home') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-purple-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Total de utilizadores</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $total_users }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">com acesso ao painel</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-purple-50 text-purple-600 transition duration-300 group-hover:bg-purple-600 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
            </div>
        </a>

    </div>


    {{-- PESQUISA --}}
    <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:mb-8 sm:rounded-3xl sm:p-7">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-start gap-3 sm:gap-4">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 sm:h-11 sm:w-11 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="text-base font-bold text-slate-900 sm:text-lg">Pesquisa rápida</h2>
                    <p class="mt-0.5 text-xs leading-5 text-slate-500 sm:mt-1 sm:text-sm sm:leading-6">
                        Encontra rapidamente notícias pelo título.
                    </p>
                </div>
            </div>

            <form action="{{ route('noticias.search') }}" method="GET" class="w-full lg:w-auto">
                <div class="flex w-full flex-col gap-3 sm:flex-row sm:items-center lg:w-auto">
                    <div class="group/search relative flex-1 lg:w-96">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 transition duration-200 group-focus-within/search:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3"/>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Pesquisar notícia por título..."
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-10 pr-4 text-sm text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">
                    </div>

                    <button type="submit"
                            class="group inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/25 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-[0.98]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m21 21-4.3-4.3"/>
                        </svg>
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>


    {{-- LINHA PRINCIPAL --}}
    <div class="grid gap-4 sm:gap-6 lg:grid-cols-3">


        {{-- ÚLTIMAS NOTÍCIAS --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:rounded-3xl sm:p-7 lg:col-span-2">

            <div class="flex items-start justify-between gap-3">
                <div class="flex min-w-0 items-start gap-3 sm:gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 sm:h-11 sm:w-11 sm:rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 7v5l3 2"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h2 class="truncate font-bold text-slate-900 sm:text-base">Últimas notícias publicadas</h2>
                        <p class="mt-0.5 text-xs leading-5 text-slate-500 sm:mt-1 sm:text-sm sm:leading-6">
                            As 5 notícias mais recentes no portal.
                        </p>
                    </div>
                </div>

                <a href="{{ route('noticias.home') }}"
                   class="group hidden shrink-0 items-center gap-1 text-xs font-semibold text-indigo-600 hover:text-indigo-700 sm:inline-flex sm:text-sm">
                    Ver todas
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transition group-hover:translate-x-0.5 sm:h-4 sm:w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>
                </a>
            </div>


            @if($ultimas_noticias->count())

                {{-- ✅ CONTAINER COM OVERFLOW-X CORRETO --}}
                <div class="mt-4 overflow-x-auto pb-2 sm:mt-6">

                    <div class="min-w-[640px] divide-y divide-slate-100 sm:min-w-full">

                        @foreach($ultimas_noticias as $noticia)

                            <div class="flex items-center justify-between gap-3 py-3 sm:gap-4">

                                <div class="flex min-w-0 items-center gap-3">

                                    <div class="h-10 w-14 shrink-0 overflow-hidden rounded-lg bg-slate-100 sm:h-12 sm:w-16 sm:rounded-xl">

                                        @if($noticia->img)
                                            <img src="{{ asset('storage/' . $noticia->img) }}"
                                                 alt="{{ $noticia->titulo }}"
                                                 class="h-full w-full object-cover">
                                        @else
                                            <div class="flex h-full items-center justify-center text-[9px] text-slate-400 sm:text-[10px]">
                                                Sem img
                                            </div>
                                        @endif

                                    </div>

                                    <div class="min-w-0">
                                        <p class="truncate text-xs font-semibold text-slate-800 sm:text-sm">
                                            {{ $noticia->titulo }}
                                        </p>
                                        <p class="mt-0.5 truncate text-[10px] text-slate-400 sm:text-xs">
                                            {{ $noticia->categoria->nome ?? 'Sem categoria' }}
                                            •
                                            {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                        </p>
                                    </div>

                                </div>

                                <a href="{{ route('noticias.edit', $noticia->id) }}"
                                   class="shrink-0 rounded-lg border border-slate-200 px-2.5 py-1.5 text-[10px] font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600 sm:px-3 sm:text-xs">
                                    Editar
                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            @else

                <div class="mt-4 rounded-xl border border-dashed border-slate-200 p-6 text-center sm:mt-6 sm:rounded-2xl sm:p-8">
                    <p class="text-xs text-slate-400 sm:text-sm">Ainda não há notícias publicadas.</p>
                </div>

            @endif

        </div>


        {{-- ÚLTIMOS UTILIZADORES --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:rounded-3xl sm:p-7">

            <div class="flex items-start justify-between gap-3">
                <div class="flex min-w-0 items-start gap-3 sm:gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600 sm:h-11 sm:w-11 sm:rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h2 class="truncate font-bold text-slate-900 sm:text-base">Últimos utilizadores</h2>
                        <p class="mt-0.5 text-xs leading-5 text-slate-500 sm:mt-1 sm:text-sm sm:leading-6">
                            Registados recentemente.
                        </p>
                    </div>
                </div>

                <a href="{{ route('users.home') }}"
                   class="group hidden shrink-0 items-center gap-1 text-xs font-semibold text-indigo-600 hover:text-indigo-700 sm:inline-flex sm:text-sm">
                    Ver todos
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transition group-hover:translate-x-0.5 sm:h-4 sm:w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>
                </a>
            </div>


            @if($ultimos_users->count())

                {{-- ✅ CONTAINER COM OVERFLOW-X CORRETO --}}
                <div class="mt-4 overflow-x-auto pb-2 sm:mt-6">

                    <div class="min-w-[360px] divide-y divide-slate-100 sm:min-w-full">

                        @foreach($ultimos_users as $user)

                            <div class="flex items-center gap-3 py-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-xs font-bold text-indigo-600 sm:h-10 sm:w-10 sm:rounded-xl sm:text-sm">
                                    {{ strtoupper(substr($user->nome ?? $user->name ?? '?', 0, 1)) }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-xs font-semibold text-slate-800 sm:text-sm">
                                        {{ $user->nome ?? $user->name ?? 'Sem nome' }}
                                    </p>
                                    <p class="truncate text-[10px] text-slate-400 sm:text-xs">
                                        {{ $user->email }}
                                    </p>
                                </div>

                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="shrink-0 text-[10px] font-semibold text-indigo-600 hover:text-indigo-700 sm:text-xs">
                                    Editar
                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            @else

                <div class="mt-4 rounded-xl border border-dashed border-slate-200 p-6 text-center sm:mt-6 sm:rounded-2xl sm:p-8">
                    <p class="text-xs text-slate-400 sm:text-sm">Sem utilizadores.</p>
                </div>

            @endif

        </div>

    </div>

</div>

@endsection