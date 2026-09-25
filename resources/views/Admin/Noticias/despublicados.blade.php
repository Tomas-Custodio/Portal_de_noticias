@extends('Layouts/admin')

@section('title', 'Despublicados')
@section('page_title', 'Despublicados')

@section('conteudo')

<div class="mx-auto max-w-7xl">

    {{-- HEADER --}}
    <div class="mb-10">

        <div class="mb-5 flex items-center gap-2 text-sm">
            <span class="font-medium text-slate-400">Administração</span>
            <span class="text-slate-300">/</span>
            <a href="{{ route('noticias.list') }}" class="font-medium text-slate-400 hover:text-indigo-600">Notícias</a>
            <span class="text-slate-300">/</span>
            <span class="font-medium text-slate-600">Despublicados</span>
        </div>


        <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-end">

            <div>

                <div class="mb-4 flex items-center gap-3">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-500 text-white shadow-lg shadow-slate-500/20"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 18a5 5 0 0 0-10 0"/>
                            <rect width="18" height="18" x="3" y="4" rx="2"/>
                            <path d="M12 9v3"/>
                        </svg>
                    </div>

                    <span class="rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold uppercase tracking-wider text-slate-600">
                        Fora do ar
                    </span>

                </div>


                <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                    Despublicados
                </h1>

                <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">
                    Notícias que foram retiradas do portal público.
                    Podem ser reeditadas e publicadas novamente.
                </p>

            </div>


            <span class="inline-flex self-start rounded-full bg-slate-100 px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-600 md:self-auto">
                {{ $despublicados->total() }}
                {{ $despublicados->total() === 1 ? 'despublicado' : 'despublicados' }}
            </span>

        </div>

    </div>


    {{-- MENSAGEM DO SISTEMA --}}
    @if(session('msg'))

        <div class="mb-6 flex items-start gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 6 9 17l-5-5"/>
                </svg>
            </div>

            <div>
                <p class="text-sm font-semibold text-emerald-900">Operação realizada</p>
                <p class="mt-1 text-sm text-emerald-700">{{ session('msg') }}</p>
            </div>

        </div>

    @endif


    {{-- LISTA --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        @if($despublicados->count())

            <div class="divide-y divide-slate-100">

                @foreach($despublicados as $noticia)

                    <div class="group flex flex-col gap-4 p-5 transition hover:bg-slate-50/70 sm:flex-row sm:items-center sm:justify-between sm:p-6">

                        <div class="flex min-w-0 items-center gap-4">

                            {{-- THUMBNAIL --}}
                            <div class="h-16 w-24 shrink-0 overflow-hidden rounded-xl bg-slate-100">

                                @if($noticia->img)
                                    <img src="{{ asset('storage/' . $noticia->img) }}"
                                         alt="{{ $noticia->titulo }}"
                                         class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                                @else
                                    <div class="flex h-full items-center justify-center text-xs text-slate-400">
                                        Sem imagem
                                    </div>
                                @endif

                            </div>


                            {{-- INFO --}}
                            <div class="min-w-0">

                                <div class="flex items-center gap-2">

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                        Despublicado
                                    </span>

                                    @if($noticia->categoria)
                                        <span class="inline-flex rounded-lg bg-indigo-50 px-2 py-0.5 text-[10px] font-semibold text-indigo-700">
                                            {{ $noticia->categoria->nome }}
                                        </span>
                                    @endif

                                </div>

                                <h3 class="mt-2 truncate text-sm font-bold text-slate-900">
                                    {{ $noticia->titulo }}
                                </h3>

                                <p class="mt-1 line-clamp-1 max-w-lg text-xs text-slate-500">
                                    {{ $noticia->resumo }}
                                </p>

                                <p class="mt-1.5 text-xs text-slate-400">
                                    {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                </p>

                            </div>

                        </div>


                        {{-- AÇÕES --}}
                        <div class="flex shrink-0 flex-wrap gap-2">

                            {{-- EDITAR --}}
                            <a href="{{ route('noticias.edit', $noticia->id) }}"
                               class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9"/>
                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                </svg>

                                Editar

                            </a>


                            {{-- ELIMINAR --}}
                            <form action="{{ route('noticias.delete', $noticia->id) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Tem certeza que deseja eliminar esta notícia?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="inline-flex items-center gap-1.5 rounded-xl border border-red-200 bg-white px-3.5 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"/>
                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                    </svg>

                                    Eliminar

                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- PAGINAÇÃO --}}
            @if($despublicados->hasPages())
                <div class="border-t border-slate-100 px-6 py-5">
                    {{ $despublicados->links() }}
                </div>
            @endif

        @else

            {{-- ESTADO VAZIO --}}
            <div class="px-6 py-20 text-center">

                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 18a5 5 0 0 0-10 0"/>
                        <rect width="18" height="18" x="3" y="4" rx="2"/>
                        <path d="M12 9v3"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-900">
                    Sem notícias despublicadas
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                    Não existem notícias retiradas do portal.
                </p>

                <a href="{{ route('noticias.list') }}"
                   class="mt-6 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700">

                    Ver todas as notícias

                </a>

            </div>

        @endif

    </div>


    {{-- LINK EDITAR DESPUBLICADO --}}
    <div class="mt-8 flex items-center justify-between rounded-3xl border border-indigo-200 bg-indigo-50 p-6">

        <div class="flex items-center gap-4">

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 20h9"/>
                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                </svg>
            </div>

            <div>
                <p class="text-sm font-bold text-indigo-900">
                    Quer editar uma notícia despublicada?
                </p>
                <p class="mt-0.5 text-xs text-indigo-700">
                    Escolha uma notícia da lista acima e clique em "Editar".
                </p>
            </div>

        </div>


        <a href="{{ route('noticias.list') }}"
           class="group inline-flex shrink-0 items-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700">

            Editar notícia

            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"/>
                <path d="m13 6 6 6-6 6"/>
            </svg>

        </a>

    </div>

</div>

@endsection