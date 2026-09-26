@extends('Layouts/admin')

@section('title', 'Pesquisa de notícias')
@section('page_title', 'Pesquisa de notícias')

@section('conteudo')

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        <header class="mb-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-2 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-indigo-600"></span>
                        <span class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            Administração
                        </span>
                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">
                        Pesquisar notícias
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Encontre notícias pelo título.
                    </p>

                </div>


                <a
                    href="{{ route('noticias.list') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition-all duration-200 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 sm:w-auto"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"/>
                        <path d="m12 19-7-7 7-7"/>
                    </svg>
                    Voltar à lista
                </a>

            </div>

        </header>


        {{-- =========================================================
            FORM DE PESQUISA (POST)
        ========================================================== --}}
        <form
            action="{{ route('noticias.search') }}"
            method="POST"
            class="mb-8 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5"
        >
            @csrf

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                <div class="group/search relative flex-1">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 transition group-focus-within/search:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m21 21-4.3-4.3"/>
                        </svg>
                    </div>

                    <input
                        type="text"
                        name="search"
                        value="{{ $termo ?? '' }}"
                        placeholder="Pesquisar notícia por título..."
                        autocomplete="off"
                        autofocus
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-10 pr-4 text-sm text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                    >

                </div>


                <button
                    type="submit"
                    class="group inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-[0.98]"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                    Pesquisar
                </button>

            </div>

        </form>


        {{-- =========================================================
            RESULTADOS
        ========================================================== --}}
        @isset($resultado)

            <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h2 class="text-base font-bold text-slate-900 sm:text-lg">
                        Resultados
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">

                        {{ $resultado->total() }}
                        {{ $resultado->total() === 1 ? 'resultado' : 'resultados' }}
                        para "<span class="font-semibold text-indigo-600">{{ $termo }}</span>"

                    </p>

                </div>


                @if($resultado->total() > 0)

                    <form action="{{ route('noticias.search') }}" method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="inline-flex w-fit items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"/>
                                <path d="m6 6 12 12"/>
                            </svg>
                            Limpar
                        </button>

                    </form>

                @endif

            </div>


            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

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

                            @forelse($resultado as $noticia)

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

                                            <span class="text-xs text-slate-400">Sem categoria</span>

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

                                    <td colspan="5" class="px-6 py-20 text-center">

                                        <div class="mx-auto max-w-sm">

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
                                                Não encontrámos notícias com
                                                "<span class="font-semibold text-indigo-600">{{ $termo }}</span>".
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- MOBILE --}}
                <div class="divide-y divide-slate-100 md:hidden">

                    @forelse($resultado as $noticia)

                        <div class="p-5 transition-colors hover:bg-slate-50">

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

                            <p class="font-semibold text-slate-700">
                                Sem resultados para "<span class="text-indigo-600">{{ $termo }}</span>"
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Tenta pesquisar por outro termo.
                            </p>

                        </div>

                    @endforelse

                </div>


                {{-- PAGINAÇÃO --}}
                @if($resultado->hasPages())

                    <div class="border-t border-slate-100 px-5 py-5 sm:px-6">
                        {{ $resultado->links() }}
                    </div>

                @endif

            </section>

        @else

            {{-- =========================================================
                ESTADO VAZIO (SEM PESQUISA)
            ========================================================== --}}
            <section class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center shadow-sm">

                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-900">
                    Começa a pesquisar
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                    Escreve o título de uma notícia no campo acima
                    para encontrar resultados.
                </p>

            </section>

        @endisset

    </div>

</div>

@endsection