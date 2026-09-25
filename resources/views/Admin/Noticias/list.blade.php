@extends('Layouts/admin')

@section('title', 'Notícias')

@section('page_title', 'Notícias')

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-8">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">

            <div>

                <div class="mb-3 flex items-center gap-2 text-sm text-slate-500">

                    <span>/</span>

                    <span class="font-medium text-slate-700">
                        Notícias
                    </span>

                </div>

                <p class="mb-2 text-sm font-semibold text-indigo-600">
                    Gestão de conteúdo
                </p>

                <h1 class="text-3xl font-bold tracking-tight">
                    Notícias
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Gerencie todas as notícias do portal.
                </p>

            </div>


            <a href="{{ route('noticias.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700">

                <svg class="h-5 w-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>

                </svg>

                Nova notícia

            </a>

        </div>


        {{-- MESSAGE --}}

        @if(session('msg'))

            <div class="mb-6 rounded-2xl border border-indigo-100 bg-indigo-50 p-4 text-sm font-medium text-indigo-700">
                {{ session('msg') }}
            </div>

        @endif


        {{-- MAIN CARD --}}

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


            {{-- TOOLBAR --}}

            <div class="border-b border-slate-100 p-5">

                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h2 class="font-bold text-slate-900">
                            Todas as notícias
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            {{ $list_noticias->total() }} notícias registradas
                        </p>

                    </div>


                    {{-- SEARCH VISUAL --}}

                    <div class="flex items-center gap-3">

                        <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5">

                            <svg class="h-4 w-4 text-slate-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

                            </svg>

                            <input
                                type="text"
                                placeholder="Pesquisar notícia..."
                                class="w-full border-0 bg-transparent text-sm outline-none placeholder:text-slate-400 sm:w-64"
                            >

                        </div>

                    </div>

                </div>

            </div>


            {{-- DESKTOP TABLE --}}

            <div class="hidden overflow-x-auto md:block">

                <table class="w-full text-left">

                    <thead class="border-b border-slate-100 bg-slate-50/70">

                        <tr>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">
                                Notícia
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">
                                Categoria
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">
                                Estado
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">
                                Data
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-400">
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($list_noticias as $noticia)

                            <tr class="group transition hover:bg-slate-50/70">

                                {{-- NEWS --}}

                                <td class="px-6 py-5">

                                    <div class="flex min-w-[320px] items-center gap-4">

                                        <div class="h-16 w-24 shrink-0 overflow-hidden rounded-xl bg-slate-100">

                                            @if($noticia->img)

                                                <img
                                                    src="{{ asset('storage/' . $noticia->img) }}"
                                                    alt="{{ $noticia->titulo }}"
                                                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                                                >

                                            @else

                                                <div class="flex h-full items-center justify-center text-xs text-slate-400">
                                                    Sem imagem
                                                </div>

                                            @endif

                                        </div>


                                        <div class="min-w-0">

                                            <p class="truncate text-sm font-bold text-slate-900">
                                                {{ $noticia->titulo }}
                                            </p>

                                            <p class="mt-1 line-clamp-2 max-w-md text-xs leading-5 text-slate-500">
                                                {{ $noticia->resumo }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- CATEGORY --}}

                                <td class="px-6 py-5">

                                    @if($noticia->categoria)

                                        <span class="inline-flex rounded-lg bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-700">
                                            {{ $noticia->categoria->nome }}
                                        </span>

                                    @else

                                        <span class="text-xs text-slate-400">
                                            Sem categoria
                                        </span>

                                    @endif

                                </td>


                                {{-- STATE --}}

                                <td class="px-6 py-5">

                                    @if($noticia->estado === 'publicado')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            Publicado

                                        </span>

                                    @elseif($noticia->estado === 'rascunho')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                            Rascunho

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600">

                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                            {{ ucfirst($noticia->estado) }}

                                        </span>

                                    @endif

                                </td>


                                {{-- DATE --}}

                                <td class="px-6 py-5">

                                    <p class="text-sm font-medium text-slate-700">
                                        {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                    </p>

                                </td>


                                {{-- ACTIONS --}}

                                <td class="px-6 py-5">

                                    <div class="flex justify-end gap-2">

                                        <a href="{{ route('noticias.edit', $noticia->id) }}"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                                           title="Editar">

                                            <svg class="h-4 w-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>

                                            </svg>

                                        </a>


                                        <form action="{{ route('noticias.delete', $noticia->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?');">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                                                title="Excluir"
                                            >

                                                <svg class="h-4 w-4"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10"/>

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

                                        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">

                                            <svg class="h-8 w-8 text-slate-400"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.7"
                                                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>

                                            </svg>

                                        </div>

                                        <h3 class="font-bold text-slate-900">
                                            Nenhuma notícia encontrada
                                        </h3>

                                        <p class="mt-2 text-sm text-slate-500">
                                            Comece criando a primeira notícia do portal.
                                        </p>

                                        <a href="{{ route('noticias.create') }}"
                                           class="mt-5 inline-flex rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white hover:bg-indigo-700">

                                            Criar notícia

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- MOBILE --}}

            <div class="divide-y divide-slate-100 md:hidden">

                @forelse($list_noticias as $noticia)

                    <div class="p-5">

                        <div class="flex gap-4">

                            <div class="h-20 w-24 shrink-0 overflow-hidden rounded-xl bg-slate-100">

                                @if($noticia->img)

                                    <img
                                        src="{{ asset('storage/' . $noticia->img) }}"
                                        class="h-full w-full object-cover"
                                    >

                                @endif

                            </div>


                            <div class="min-w-0 flex-1">

                                <h3 class="line-clamp-2 text-sm font-bold text-slate-900">
                                    {{ $noticia->titulo }}
                                </h3>

                                <p class="mt-1 text-xs text-slate-400">
                                    {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                </p>

                            </div>

                        </div>


                        <div class="mt-4 flex items-center justify-between">

                            <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
                                {{ $noticia->categoria->nome ?? 'Sem categoria' }}
                            </span>


                            <div class="flex gap-2">

                                <a href="{{ route('noticias.edit', $noticia->id) }}"
                                   class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600">

                                    Editar

                                </a>

                                <form action="{{ route('noticias.delete', $noticia->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Excluir esta notícia?');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600"
                                    >
                                        Excluir
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="px-6 py-16 text-center text-sm text-slate-500">
                        Nenhuma notícia cadastrada.
                    </div>

                @endforelse

            </div>


            {{-- PAGINATION --}}

            @if($list_noticias->hasPages())

                <div class="border-t border-slate-100 px-6 py-5">

                    {{ $list_noticias->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection