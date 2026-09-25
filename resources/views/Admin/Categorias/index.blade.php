@extends('Layouts/admin')

@section('title', 'Categorias')
@section('page_title', 'Categorias')

@section('conteudo')

<div class="mx-auto max-w-7xl">

    {{-- HEADER --}}
    <div class="mb-10">

        <div class="mb-5 flex items-center gap-2 text-sm">
            <span class="font-medium text-slate-400">Administração</span>
            <span class="text-slate-300">/</span>
            <span class="font-medium text-slate-600">Categorias</span>
        </div>


        <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-end">

            <div>

                <div class="mb-4 flex items-center gap-3">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20 transition duration-300 hover:scale-105 hover:shadow-indigo-600/40"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                    </div>

                    <span
                        class="rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-bold uppercase tracking-wider text-indigo-600"
                    >
                        Gestão
                    </span>

                </div>


                <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                    Categorias
                </h1>

                <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">
                    Gerencie as categorias utilizadas para organizar,
                    classificar e estruturar as notícias do portal.
                </p>

            </div>


            <a
                href="{{ route('categoria.create') }}"
                class="group inline-flex items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/25 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-[0.98]"
            >

                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14"/>
                    <path d="M5 12h14"/>
                </svg>

                Nova categoria

            </a>

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


    {{-- ESTATÍSTICAS --}}
    <div class="mb-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">


        {{-- TOTAL DE CATEGORIAS --}}

        <div class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Total de categorias
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-950">
                        {{ $categorias }}
                    </p>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 transition duration-300 group-hover:bg-indigo-600 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    </svg>
                </div>

            </div>

        </div>


        {{-- COM NOTÍCIAS --}}

        <div class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Com notícias
                    </p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-950">
                        {{ $categorias_noticias }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 transition duration-300 group-hover:bg-emerald-600 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>
                </div>

            </div>

        </div>


        {{-- VAZIAS --}}

        <div class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-amber-200 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Sem notícias
                    </p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-950">
                        {{ $categorias_vazias }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-amber-600 transition duration-300 group-hover:bg-amber-500 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 7v5l3 2"/>
                    </svg>
                </div>

            </div>

 

        </div>

    </div>


    {{-- CARDS PRINCIPAIS --}}
    <div class="grid gap-6 md:grid-cols-3">


        {{-- LISTAR --}}
        <a
            href="{{ route('categorias.list') }}"
            class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-100/50 focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
        >

            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 transition duration-300 group-hover:bg-indigo-600 group-hover:text-white group-hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 6h13"/>
                    <path d="M8 12h13"/>
                    <path d="M8 18h13"/>
                    <path d="M3 6h.01"/>
                    <path d="M3 12h.01"/>
                    <path d="M3 18h.01"/>
                </svg>
            </div>

            <p class="mt-7 text-xs font-bold uppercase tracking-widest text-indigo-500">
                Visualização
            </p>

            <h2 class="mt-2 text-xl font-bold text-slate-900">
                Listar categorias
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Consulte todas as categorias cadastradas
                e acesse as ações disponíveis.
            </p>

            <div class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-indigo-600">
                Ver categorias
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </div>

        </a>


        {{-- ADICIONAR --}}
        <a
            href="{{ route('categoria.create') }}"
            class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-100/50 focus:outline-none focus:ring-4 focus:ring-emerald-500/20"
        >

            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 transition duration-300 group-hover:bg-emerald-600 group-hover:text-white group-hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <path d="M12 11v6"/>
                    <path d="M9 14h6"/>
                </svg>
            </div>

            <p class="mt-7 text-xs font-bold uppercase tracking-widest text-emerald-500">
                Criação
            </p>

            <h2 class="mt-2 text-xl font-bold text-slate-900">
                Adicionar categoria
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Cadastre uma nova categoria para
                organizar as notícias do sistema.
            </p>

            <div class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-600">
                Criar categoria
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </div>

        </a>


        {{-- EDITAR --}}
        <a
            href="{{ route('categorias.list') }}"
            class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-100/50 focus:outline-none focus:ring-4 focus:ring-amber-500/20"
        >

            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-600 transition duration-300 group-hover:bg-amber-500 group-hover:text-white group-hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 20h9"/>
                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                </svg>
            </div>

            <p class="mt-7 text-xs font-bold uppercase tracking-widest text-amber-500">
                Manutenção
            </p>

            <h2 class="mt-2 text-xl font-bold text-slate-900">
                Editar categoria
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Escolha uma categoria existente e
                atualize as suas informações.
            </p>

            <div class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-amber-600">
                Escolher categoria
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </div>

        </a>

    </div>


    {{-- ÁREA INFORMATIVA --}}
    <div class="mt-8 grid gap-6 lg:grid-cols-[1fr_320px]">


        {{-- ÚLTIMAS CATEGORIAS --}}

        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div class="flex items-start gap-4">

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                            <circle cx="12" cy="12" r="9"/>

                            <path d="M12 7v5l3 2"/>

                        </svg>
                        
                    </div>

                    <div>
                        <h2 class="font-bold text-slate-900">Últimas categorias</h2>

                        <p class="mt-1 text-sm leading-6 text-slate-500">

                            As categorias mais recentes do sistema.

                        </p>

                    </div>

                </div>

                <a href="{{ route('categorias.list') }}"

                   class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-700 sm:inline-flex sm:items-center sm:gap-1">

                    Ver todas
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>
                </a>

            </div>


            @if(isset($ultimas_categorias) && $ultimas_categorias->count())

                <div class="mt-6 divide-y divide-slate-100">

                    @foreach($ultimas_categorias as $categoria)

                        <div class="flex items-center justify-between gap-4 py-3">

                            <div class="flex min-w-0 items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-sm font-bold text-indigo-600">
                                    {{ strtoupper(substr($categoria->nome, 0, 1)) }}
                                </div>

                                <div class="min-w-0">
                                    <p class="truncate text-sm font-semibold text-slate-800">
                                        {{ $categoria->nome }}
                                    </p>
                                    <p class="mt-0.5 truncate text-xs text-slate-400">
                                        {{ $categoria->noticias_count ?? 0 }}
                                        {{ ($categoria->noticias_count ?? 0) === 1 ? 'notícia' : 'notícias' }}
                                        • #{{ $categoria->id }}
                                    </p>
                                </div>

                            </div>

                            <a href="{{ route('categoria.edit', $categoria->id) }}"
                               class="shrink-0 rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600">
                                Editar
                            </a>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="mt-6 rounded-2xl border border-dashed border-slate-200 p-8 text-center">
                    <p class="text-sm text-slate-400">
                        Ainda não há categorias registadas.
                    </p>
                </div>

            @endif

        </div>


        {{-- ATALHOS --}}
        <div class="relative overflow-hidden rounded-3xl bg-slate-950 p-7 text-white shadow-xl transition duration-300 hover:shadow-2xl hover:shadow-slate-950/30">

            <div class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-indigo-500/20 blur-3xl"></div>


            <div class="relative">

                <div class="mb-6 flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 transition duration-300 hover:scale-105 hover:bg-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 2 3 14h9l-1 8 10-12h-9z"/>
                    </svg>
                </div>

                <h2 class="text-lg font-bold">
                    Ações rápidas
                </h2>

                <p class="mt-2 text-sm leading-6 text-slate-400">
                    Acesse rapidamente as principais operações
                    deste módulo.
                </p>


                <div class="mt-6 space-y-3">

                    <a href="{{ route('categorias.list') }}"
                       class="group/link flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3 text-sm font-medium text-slate-300 transition duration-200 hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white/20">

                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition group-hover/link:text-indigo-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M8 6h13"/>
                                <path d="M8 12h13"/>
                                <path d="M8 18h13"/>
                                <path d="M3 6h.01"/>
                                <path d="M3 12h.01"/>
                                <path d="M3 18h.01"/>
                            </svg>
                            Todas as categorias
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 transition-transform duration-200 group-hover/link:translate-x-0.5 group-hover/link:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m13 6 6 6-6 6"/>
                        </svg>

                    </a>


                    <a href="{{ route('categoria.create') }}"
                       class="group/link flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3 text-sm font-medium text-slate-300 transition duration-200 hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white/20">

                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition group-hover/link:text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14"/>
                                <path d="M5 12h14"/>
                            </svg>
                            Nova categoria
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 transition-transform duration-200 group-hover/link:translate-x-0.5 group-hover/link:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m13 6 6 6-6 6"/>
                        </svg>

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection