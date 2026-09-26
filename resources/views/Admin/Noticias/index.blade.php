@extends('Layouts/admin')

@section('title', 'Notícias')
@section('page_title', 'Notícias')

@section('conteudo')

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

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
                        Notícias
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Gerencie as notícias publicadas, os rascunhos
                        e as despublicadas do portal.
                    </p>

                </div>


                {{-- AÇÕES --}}
                <div class="flex w-full flex-col gap-2 sm:w-auto sm:flex-row">

                    <a
                        href="{{ route('noticias.create') }}"
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

                        Nova notícia

                    </a>

                </div>

            </div>

        </header>


        {{-- MENSAGEM --}}
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
            4 CARDS DE ESTATÍSTICAS
        ========================================================== --}}
        <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


            {{-- TOTAL DE NOTÍCIAS --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Total notícias
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $noticias->count() }}
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
                            <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                            <path d="M19 6h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"/>
                            <path d="M8 8h7"/>
                            <path d="M8 12h7"/>
                            <path d="M8 16h4"/>
                        </svg>

                    </div>

                </div>

            </div>


            {{-- PUBLICADAS --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Publicadas
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $publicadas }}
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


            {{-- RASCUNHOS --}}
            <a
                href="{{ route('noticias.rascunhos') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-amber-200 hover:shadow-md sm:p-6"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Rascunhos
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $rascunhos }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-500 transition-colors group-hover:bg-amber-500 group-hover:text-white">

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
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                        </svg>

                    </div>

                </div>

            </a>


            {{-- DESPUBLICADAS --}}
            <a
                href="{{ route('noticias.despublicados') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-md sm:p-6"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Despublicadas
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $despublicadas }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition-colors group-hover:bg-slate-700 group-hover:text-white">

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
                            <path d="M17 18a5 5 0 0 0-10 0"/>
                            <rect width="18" height="18" x="3" y="4" rx="2"/>
                            <path d="M12 9v3"/>
                        </svg>

                    </div>

                </div>

            </a>

        </div>


        {{-- =========================================================
            LISTA DE NOTÍCIAS
        ========================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- CABEÇALHO --}}
            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h2 class="text-base font-bold text-slate-900 sm:text-lg">
                            Todas as notícias
                        </h2>

                        <p class="mt-1 text-xs text-slate-400">
                            Notícias registadas no sistema
                        </p>

                    </div>


                    <a
                        href="{{ route('noticias.create') }}"
                        class="inline-flex w-fit items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                    >

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>
                        </svg>

                        Nova notícia

                    </a>

                </div>

            </div>


            {{-- DESKTOP --}}
            <div class="hidden overflow-x-auto md:block">

                <table class="w-full min-w-[800px]">

                    <thead class="border-b border-slate-100 bg-slate-50/70">

                        <tr>
                            <th class="px-6 py-4 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                Notícia
                            </th>
                            <th class="px-6 py-4 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                Categoria
                            </th>
                            <th class="px-6 py-4 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                Estado
                            </th>
                            <th class="px-6 py-4 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                Data
                            </th>
                            <th class="px-6 py-4 text-right text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                Ações
                            </th>
                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($noticias as $noticia)

                            <tr class="group transition-colors duration-200 hover:bg-slate-50">

                                {{-- NOTÍCIA --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="h-12 w-16 shrink-0 overflow-hidden rounded-xl bg-slate-100">

                                            @if($noticia->img)
                                                <img src="{{ asset('storage/' . $noticia->img) }}"
                                                     alt="{{ $noticia->titulo }}"
                                                     class="h-full w-full object-cover">
                                            @else
                                                <div class="flex h-full items-center justify-center text-[10px] text-slate-400">
                                                    Sem img
                                                </div>
                                            @endif

                                        </div>

                                        <div class="min-w-0">

                                            <p class="truncate text-sm font-semibold text-slate-800">
                                                {{ $noticia->titulo }}
                                            </p>

                                            <p class="mt-0.5 line-clamp-1 max-w-md text-[11px] text-slate-400">
                                                {{ $noticia->resumo }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- CATEGORIA --}}
                                <td class="px-6 py-4">

                                    @if($noticia->categoria)

                                        <span class="inline-flex rounded-lg bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700">
                                            {{ $noticia->categoria->nome }}
                                        </span>

                                    @else

                                        <span class="text-xs text-slate-400">
                                            Sem categoria
                                        </span>

                                    @endif

                                </td>


                                {{-- ESTADO --}}
                                <td class="px-6 py-4">

                                    @if(strtolower($noticia->estado) === 'publicado' || strtolower($noticia->estado) === 'aberto')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Publicado
                                        </span>

                                    @elseif(strtolower($noticia->estado) === 'rascunho')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Rascunho
                                        </span>

                                    @elseif(strtolower($noticia->estado) === 'despublicado')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                            Despublicado
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                            {{ ucfirst($noticia->estado) }}
                                        </span>

                                    @endif

                                </td>


                                {{-- DATA --}}
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                </td>


                                {{-- AÇÕES --}}
                                <td class="px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        {{-- EDITAR --}}
                                        <a
                                            href="{{ route('noticias.edit', $noticia->id) }}"
                                            title="Editar notícia"
                                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-all hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 20h9"/>
                                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                            </svg>
                                        </a>


                                        {{-- ELIMINAR --}}
                                        <form
                                            action="{{ route('noticias.delete', $noticia->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Remover esta notícia?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                title="Eliminar notícia"
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

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-16 text-center text-sm text-slate-500">
                                    Nenhuma notícia registada.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- MOBILE --}}
            <div class="divide-y divide-slate-100 md:hidden">

                @forelse($noticias as $noticia)

                    <div class="p-5 transition-colors hover:bg-slate-50">

                        {{-- HEADER DO CARD --}}
                        <div class="flex items-center gap-3">

                            <div class="h-14 w-20 shrink-0 overflow-hidden rounded-xl bg-slate-100">

                                @if($noticia->img)
                                    <img src="{{ asset('storage/' . $noticia->img) }}"
                                         alt="{{ $noticia->titulo }}"
                                         class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full items-center justify-center text-[10px] text-slate-400">
                                        Sem img
                                    </div>
                                @endif

                            </div>

                            <div class="min-w-0 flex-1">

                                <p class="truncate text-sm font-semibold text-slate-800">
                                    {{ $noticia->titulo }}
                                </p>

                                <p class="truncate text-xs text-slate-400">
                                    {{ $noticia->categoria->nome ?? 'Sem categoria' }}
                                    • {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                </p>

                            </div>

                        </div>


                        {{-- ESTADO + AÇÕES --}}
                        <div class="mt-4 flex flex-wrap items-center justify-between gap-3">

                            @if(strtolower($noticia->estado) === 'publicado' || strtolower($noticia->estado) === 'aberto')

                                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                    Publicado
                                </span>

                            @elseif(strtolower($noticia->estado) === 'rascunho')

                                <span class="rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-amber-700">
                                    Rascunho
                                </span>

                            @else

                                <span class="rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                    Despublicado
                                </span>

                            @endif


                            <div class="flex gap-2">

                                <a
                                    href="{{ route('noticias.edit', $noticia->id) }}"
                                    class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                    </svg>
                                    Editar
                                </a>


                                <form
                                    action="{{ route('noticias.delete', $noticia->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Remover esta notícia?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center gap-1.5 rounded-xl border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                        </svg>
                                        Eliminar
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="px-5 py-12 text-center text-sm text-slate-500">
                        Nenhuma notícia registada.
                    </div>

                @endforelse

            </div>


            {{-- PAGINAÇÃO --}}
            @if($noticias->hasPages())

                <div class="border-t border-slate-100 px-5 py-5 sm:px-6">
                    {{ $noticias->links() }}
                </div>

            @endif

        </section>

    </div>

</div>

@endsection