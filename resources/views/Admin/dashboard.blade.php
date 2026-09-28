@extends('Layouts/admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('conteudo')

<div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 sm:pb-16">

    {{-- ==================== HEADER ==================== --}}
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
                <a href="{{ route('noticias.create') }}" class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 5v14"/><path d="M5 12h14"/>
                    </svg>
                    Nova notícia
                </a>

                <a href="{{ route('categoria.create') }}" class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-600 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 5v14"/><path d="M5 12h14"/>
                    </svg>
                    Nova categoria
                </a>

                <a href="{{ route('users.create') }}" class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-600 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 5v14"/><path d="M5 12h14"/>
                    </svg>
                    Novo usuário
                </a>
            </div>
        </div>
    </div>


    {{-- ==================== NOTÍCIAS ==================== --}}
    <div class="mb-4 flex items-center gap-3 sm:mb-5">
        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
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

        {{-- TOTAL DE NOTÍCIAS --}}
        <a href="{{ route('noticias.home') }}" class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Total de notícias</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $total_noticias }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">{{ $noticias_mes }} este mês</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                    </svg>
                </div>
            </div>
        </a>


        {{-- PUBLICADAS --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Notícias publicadas</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $publicadas ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">visíveis no portal</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>
                </div>
            </div>
        </div>


        {{-- DESPUBLICADAS --}}
        <a href="{{ route('noticias.despublicados') }}" class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Notícias despublicadas</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $despublicadas ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">retiradas do portal</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                        <line x1="2" x2="22" y1="2" y2="22"/>
                    </svg>
                </div>
            </div>
        </a>


        {{-- RASCUNHOS --}}
        <a href="{{ route('noticias.rascunhos') }}" class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Notícias em rascunho</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $rascunhos ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">por publicar</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                    </svg>
                </div>
            </div>
        </a>
    </div>


    {{-- ==================== CATEGORIAS ==================== --}}
    <div class="mb-4 flex items-center gap-3 sm:mb-5">
        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
            </svg>
        </div>
        <div>
            <h2 class="text-sm font-bold text-slate-900 sm:text-base">Categorias</h2>
            <p class="text-xs text-slate-500">Organização das notícias</p>
        </div>
    </div>

    <div class="mb-6 grid gap-3 sm:mb-8 sm:grid-cols-2 sm:gap-4 lg:grid-cols-3">

        {{-- TOTAL DE CATEGORIAS --}}
        <a href="{{ route('categorias.home') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Total de categorias</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $total_categorias }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">no sistema</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600 transition group-hover:bg-slate-800 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    </svg>
                </div>
            </div>
        </a>


        {{-- ✅ CATEGORIAS COM NOTÍCIAS — nome correto: $categoria_noticias --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Categorias com notícias</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $categoria_noticias ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">em uso</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>
                </div>
            </div>
        </div>


        {{-- ✅ CATEGORIAS SEM NOTÍCIAS — nome correto: $categoria_semnoticias --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Categorias sem notícias</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $categoria_semnoticias ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">vazias</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-400 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>


    {{-- ==================== UTILIZADORES ==================== --}}
    <div class="mb-4 flex items-center gap-3 sm:mb-5">
        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-purple-50 text-purple-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
        <div>
            <h2 class="text-sm font-bold text-slate-900 sm:text-base">Utilizadores</h2>
            <p class="text-xs text-slate-500">Acessos ao sistema</p>
        </div>
    </div>

    <div class="mb-6 grid gap-3 sm:mb-8 sm:grid-cols-2 sm:gap-4 lg:grid-cols-4">

        {{-- TOTAL USERS --}}
        <a href="{{ route('users.home') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-purple-200 hover:shadow-md sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Total de utilizadores</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $total_users }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">registados</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-purple-50 text-purple-600 transition group-hover:bg-purple-600 group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>
                </div>
            </div>
        </a>


        {{-- ADMINS --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Administradores</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $admins ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">acesso total</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-50 text-rose-600 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2 4 6v6c0 5 3.5 9 8 10 4.5-1 8-5 8-10V6z"/>
                    </svg>
                </div>
            </div>
        </div>


        {{-- EDITORES --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Editores</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $editor ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">criam e editam</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sky-50 text-sky-600 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                    </svg>
                </div>
            </div>
        </div>


        {{-- USERS NORMAIS --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="truncate text-[10px] font-bold uppercase tracking-wider text-slate-400 sm:text-xs">Utilizadores normais</p>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-slate-950 sm:mt-2 sm:text-3xl">{{ $users ?? 0 }}</p>
                    <p class="mt-0.5 text-[10px] text-slate-400 sm:mt-1 sm:text-xs">acesso limitado</p>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-teal-50 text-teal-600 sm:h-12 sm:w-12 sm:rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>


    {{-- ==================== LISTAS ==================== --}}
    <div class="grid gap-4 sm:gap-6 lg:grid-cols-3">

        {{-- ÚLTIMAS NOTÍCIAS --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:rounded-3xl sm:p-7 lg:col-span-2">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-start gap-3 sm:gap-4">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 sm:h-11 sm:w-11 sm:rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 7v5l3 2"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 sm:text-base">Últimas publicadas</h2>
                        <p class="mt-0.5 text-xs text-slate-500 sm:text-sm">As 5 mais recentes</p>
                    </div>
                </div>
                <a href="{{ route('noticias.home') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 sm:text-sm">Ver todas</a>
            </div>

            @if($ultimas_noticias->count())
                <div class="mt-4 overflow-x-auto pb-2 sm:mt-6">
                    <div class="min-w-[640px] divide-y divide-slate-100 sm:min-w-full">
                        @foreach($ultimas_noticias as $noticia)
                            <div class="flex items-center justify-between gap-3 py-3 sm:gap-4">
                                <div class="flex min-w-0 items-center gap-3">
                                    <div class="h-10 w-14 shrink-0 overflow-hidden rounded-lg bg-slate-100 sm:h-12 sm:w-16 sm:rounded-xl">
                                        @if($noticia->img)
                                            <img src="{{ asset('storage/' . $noticia->img) }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <p class="truncate text-xs font-semibold text-slate-800 sm:text-sm">{{ $noticia->titulo }}</p>
                                        <p class="mt-0.5 truncate text-[10px] text-slate-400 sm:text-xs">
                                            {{ $noticia->categoria->nome ?? 'Sem categoria' }} • {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ route('noticias.edit', $noticia->id) }}" class="shrink-0 rounded-lg border border-slate-200 px-2.5 py-1.5 text-[10px] font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 sm:px-3 sm:text-xs">Editar</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="mt-6 text-center text-sm text-slate-400">Ainda não há notícias publicadas.</p>
            @endif
        </div>


        {{-- ÚLTIMOS UTILIZADORES --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:rounded-3xl sm:p-7">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-start gap-3 sm:gap-4">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600 sm:h-11 sm:w-11 sm:rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 sm:text-base">Últimos utilizadores</h2>
                        <p class="mt-0.5 text-xs text-slate-500 sm:text-sm">Recentes</p>
                    </div>
                </div>
                <a href="{{ route('users.home') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 sm:text-sm">Ver todos</a>
            </div>

            @if($ultimos_users->count())
                <div class="mt-4 overflow-x-auto pb-2 sm:mt-6">
                    <div class="min-w-[360px] divide-y divide-slate-100 sm:min-w-full">
                        @foreach($ultimos_users as $user)
                            <div class="flex items-center gap-3 py-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-xs font-bold text-indigo-600 sm:h-10 sm:w-10 sm:rounded-xl sm:text-sm">
                                    {{ strtoupper(substr($user->nome ?? $user->name ?? '?', 0, 1)) }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-xs font-semibold text-slate-800 sm:text-sm">{{ $user->nome ?? $user->name ?? 'Sem nome' }}</p>
                                    <p class="truncate text-[10px] text-slate-400 sm:text-xs">{{ $user->email }}</p>
                                </div>
                                <a href="{{ route('users.edit', $user->id) }}" class="shrink-0 text-[10px] font-semibold text-indigo-600 sm:text-xs">Editar</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="mt-6 text-center text-sm text-slate-400">Sem utilizadores.</p>
            @endif
        </div>

    </div>

</div>

@endsection