@extends('Layouts/admin')

@section('title', 'Editar Categoria')
@section('page_title', 'Editar Categoria')

@section('conteudo')

<div class="mx-auto max-w-5xl px-4 sm:px-6">

    {{-- ==================== HEADER ==================== --}}
    <div class="mb-8">

        {{-- BREADCRUMB --}}
        <nav class="mb-5 flex flex-wrap items-center gap-1.5 text-sm">

            <a
                href="{{ route('categorias.home') }}"
                class="group inline-flex items-center gap-1.5 font-medium text-slate-400 transition hover:text-indigo-600"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                </svg>
                Categorias
            </a>

            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
            </svg>

            <a
                href="{{ route('categorias.list') }}"
                class="font-medium text-slate-400 transition hover:text-indigo-600"
            >
                Lista
            </a>

            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
            </svg>

            <span class="font-medium text-slate-600">
                Editar
            </span>

        </nav>


        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

            <div>

                <div class="mb-3 flex items-center gap-3">

                    <div
                        class="relative flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-700 text-white shadow-lg shadow-indigo-600/30 transition duration-300 hover:scale-105 hover:shadow-indigo-600/50"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                        </svg>

                        <span class="absolute -right-1 -top-1 flex h-3 w-3">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-indigo-400 opacity-75"></span>
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-indigo-500"></span>
                        </span>
                    </div>

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-indigo-600"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v4"/>
                            <path d="m16.2 7.8 2.9-2.9"/>
                            <path d="M18 12h4"/>
                            <path d="m16.2 16.2 2.9 2.9"/>
                            <path d="M12 18v4"/>
                            <path d="m4.9 19.1 2.9-2.9"/>
                            <path d="M2 12h4"/>
                            <path d="m4.9 4.9 2.9 2.9"/>
                        </svg>
                        Editando
                    </span>

                </div>


                <h1 class="text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                    Editar categoria
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Atualize as informações da categoria selecionada.
                </p>

            </div>


            <a
                href="{{ route('categorias.list') }}"
                class="group inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition duration-200 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-600 hover:shadow-md focus:outline-none focus:ring-4 focus:ring-indigo-500/10 active:scale-[0.98]"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:-translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5"/>
                    <path d="m12 19-7-7 7-7"/>
                </svg>
                <span class="hidden sm:inline">Voltar para categorias</span>
                <span class="sm:hidden">Voltar</span>
            </a>

        </div>

    </div>


    {{-- ==================== MENSAGEM ==================== --}}
    @if(session('msg'))

        <div
            class="mb-6 flex items-start gap-4 rounded-2xl border border-amber-200 bg-amber-50 p-4 transition duration-300 hover:border-amber-300 hover:shadow-sm"
        >

            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 8v4"/>
                    <path d="M12 16h.01"/>
                </svg>
            </div>

            <div>

                <p class="text-sm font-semibold text-amber-900">
                    Atenção
                </p>

                <p class="mt-1 whitespace-pre-line text-sm leading-5 text-amber-700">
                    {{ session('msg') }}
                </p>

            </div>

        </div>

    @endif


    {{-- ==================== ERROS ==================== --}}
    @if($errors->any())

        <div
            class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5 transition duration-300 hover:border-red-300 hover:shadow-sm"
        >

            <div class="flex gap-4">

                <div
                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/>
                        <path d="M12 9v4"/>
                        <path d="M12 17h.01"/>
                    </svg>
                </div>

                <div>

                    <p class="text-sm font-bold text-red-800">
                        Não foi possível atualizar a categoria
                    </p>

                    <ul class="mt-2 space-y-1">

                        @foreach($errors->all() as $error)

                            <li class="flex items-start gap-2 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-3 w-3 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- ==================== ÁREA PRINCIPAL ==================== --}}
    <div class="grid gap-6 lg:grid-cols-[1fr_320px]">


        {{-- FORMULÁRIO --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:shadow-md"
        >

            {{-- CABEÇALHO --}}
            <div class="border-b border-slate-100 px-5 py-5 sm:px-8">

                <div class="flex flex-wrap items-center justify-between gap-3">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <path d="M14 2v6h6"/>
                                <path d="M8 13h8"/>
                                <path d="M8 17h5"/>
                            </svg>
                        </div>

                        <div>

                            <h2 class="font-bold text-slate-900">
                                Informações da categoria
                            </h2>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Modifique os dados que deseja atualizar.
                            </p>

                        </div>

                    </div>


                    <div
                        class="hidden items-center gap-1.5 rounded-xl border border-indigo-100 bg-indigo-50 px-3 py-2 text-xs font-semibold text-indigo-600 sm:flex"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 7V4h16v3"/>
                            <path d="M9 20h6"/>
                            <path d="M12 4v16"/>
                        </svg>
                        ID #{{ $categoria->id }}
                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('categoria.update', $categoria->id) }}"
                method="POST"
                class="p-5 sm:p-8"
            >

                @csrf

                @method('PUT')


                {{-- CAMPO NOME --}}
                <div>

                    <label
                        for="nome"
                        class="mb-2.5 flex items-center gap-2 text-sm font-semibold text-slate-800"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                        </svg>
                        Nome da categoria
                        <span class="text-red-500">*</span>
                    </label>


                    <div class="group/input relative">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 transition duration-200 group-focus-within/input:text-indigo-600"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 9h16"/>
                                <path d="M4 15h16"/>
                                <path d="M10 3 8 21"/>
                                <path d="M16 3l-2 18"/>
                            </svg>
                        </div>


                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            value="{{ old('nome', $categoria->nome) }}"
                            placeholder="Ex: Tecnologia"
                            autocomplete="off"
                            autofocus
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-900 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                        >

                    </div>


                    <div class="mt-3 flex items-start gap-2 rounded-xl bg-slate-50 px-3 py-2.5">

                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 16v-4"/>
                            <path d="M12 8h.01"/>
                        </svg>

                        <p class="text-xs leading-5 text-slate-400">
                            Altere o nome somente se for necessário.
                            O nome deve continuar sendo claro e identificável.
                        </p>

                    </div>


                    @error('nome')

                        <div class="mt-3 flex items-center gap-2 rounded-xl bg-red-50 px-3 py-2.5">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 8v4"/>
                                <path d="M12 16h.01"/>
                            </svg>

                            <p class="text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        </div>

                    @enderror

                </div>


                {{-- DIVISOR --}}
                <div class="my-8 flex items-center gap-3">

                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                    </svg>

                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                </div>


                {{-- AÇÕES --}}
                <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <a
                        href="{{ route('categorias.list') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-slate-100 hover:text-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-200 active:scale-[0.98]"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"/>
                            <path d="m6 6 12 12"/>
                        </svg>
                        Cancelar
                    </a>


                    <button
                        type="submit"
                        class="group relative inline-flex items-center justify-center gap-2 overflow-hidden rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/25 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-[0.98]"
                    >

                        {{-- Efeito de brilho no hover --}}
                        <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-700 group-hover:translate-x-full"></span>


                        <svg xmlns="http://www.w3.org/2000/svg" class="relative h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>

                        <span class="relative">
                            Salvar alterações
                        </span>

                    </button>

                </div>

            </form>

        </div>


        {{-- ==================== SIDEBAR ==================== --}}
        <aside class="space-y-6">


            {{-- ESTADO ATUAL --}}
            <div
                class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:shadow-md"
            >

                <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">

                    <p class="text-xs font-bold uppercase tracking-widest text-slate-400">
                        Categoria atual
                    </p>

                    <span class="flex h-2 w-2">
                        <span class="absolute inline-flex h-2 w-2 animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                    </span>

                </div>


                <div class="p-5">

                    <div
                        class="group/preview flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50 p-4 transition duration-300 hover:border-indigo-200 hover:bg-indigo-50/50"
                    >

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-700 text-base font-bold text-white shadow-md shadow-indigo-600/20 transition duration-300 group-hover/preview:scale-105"
                        >
                            {{ strtoupper(substr($categoria->nome, 0, 1)) }}
                        </div>


                        <div class="min-w-0 flex-1">

                            <p class="truncate text-sm font-bold text-slate-800">
                                {{ $categoria->nome }}
                            </p>

                            <p class="mt-0.5 flex items-center gap-1 text-xs text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                </svg>
                                Categoria
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- INFORMAÇÕES --}}
            <div
                class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 p-6 text-white shadow-xl transition duration-300 hover:shadow-2xl hover:shadow-slate-950/30"
            >

                {{-- Blobs decorativos --}}
                <div class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-indigo-500/20 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-20 -left-20 h-40 w-40 rounded-full bg-purple-500/10 blur-3xl"></div>


                <div class="relative">

                    <div
                        class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 transition duration-300 hover:scale-105 hover:bg-white/20"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9.6 2.6a2 2 0 0 1 1.4-.6h2a2 2 0 0 1 1.4.6l.7.7a2 2 0 0 0 1.4.6h1a2 2 0 0 1 2 2v1a2 2 0 0 0 .6 1.4l.7.7a2 2 0 0 1 0 2.8l-.7.7a2 2 0 0 0-.6 1.4v1a2 2 0 0 1-2 2h-1a2 2 0 0 0-1.4.6l-.7.7a2 2 0 0 1-2.8 0l-.7-.7a2 2 0 0 0-1.4-.6h-1a2 2 0 0 1-2-2v-1a2 2 0 0 0-.6-1.4l-.7-.7a2 2 0 0 1 0-2.8l.7-.7a2 2 0 0 0 .6-1.4v-1a2 2 0 0 1 2-2h1a2 2 0 0 0 1.4-.6z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </div>


                    <h3 class="text-base font-bold">
                        Atualização da categoria
                    </h3>


                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Ao salvar, o novo nome será utilizado em todo o
                        sistema onde esta categoria estiver relacionada.
                    </p>


                    <div
                        class="mt-5 rounded-2xl border border-white/10 bg-white/5 p-4 transition duration-200 hover:border-white/20 hover:bg-white/10"
                    >

                        <div class="flex items-center justify-between">

                            <span class="flex items-center gap-1.5 text-xs text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 7V4h16v3"/>
                                    <path d="M9 20h6"/>
                                    <path d="M12 4v16"/>
                                </svg>
                                Identificador
                            </span>

                            <span class="rounded-md bg-indigo-500/20 px-2 py-0.5 text-xs font-bold text-indigo-300">
                                #{{ $categoria->id }}
                            </span>

                        </div>

                    </div>


                    {{-- AVISO --}}
                    <div class="mt-4 flex items-start gap-2 rounded-xl bg-amber-500/10 p-3">

                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/>
                            <path d="M12 9v4"/>
                            <path d="M12 17h.01"/>
                        </svg>

                        <p class="text-xs leading-5 text-amber-200/80">
                            Esta ação afeta todas as notícias vinculadas a esta categoria.
                        </p>

                    </div>

                </div>

            </div>


        </aside>

    </div>

</div>

@endsection