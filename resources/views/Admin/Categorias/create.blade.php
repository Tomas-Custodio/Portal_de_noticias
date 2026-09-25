@extends('Layouts/admin')

@section('title', 'Nova Categoria')
@section('page_title', 'Nova Categoria')

@section('conteudo')

<div class="mx-auto max-w-5xl">

{{-- HEADER DA PÁGINA --}}
<div class="mb-8">

    {{-- BREADCRUMB --}}
    <div class="mb-5 flex items-center gap-2 text-sm">

    
            
                <a
                    href="{{ route('categorias.home') }}"
                    class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold text-slate-600 transition duration-20"
                >Categoria</a>
        </a>

        <span class="text-slate-300">
            /
        </span>

        <span class="font-medium text-slate-600">
            Nova categoria
        </span>

    </div>


    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

        <div>

            <div class="mb-3 flex items-center gap-3">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20 transition duration-300 hover:scale-105 hover:shadow-indigo-600/40"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>
                    </svg>
                </div>

                <span
                    class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-indigo-600"
                >
                    Nova categoria
                </span>

            </div>


            <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                Criar categoria
            </h1>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                Adicione uma nova categoria para organizar
                e classificar as notícias do sistema.
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
            Ver categorias
        </a>

    </div>

</div>


{{-- MENSAGEM DO SISTEMA --}}
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


{{-- ERROS DE VALIDAÇÃO --}}
@if($errors->any())

    <div
        class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5 transition duration-300 hover:border-red-300 hover:shadow-sm"
    >

        <div class="flex gap-4">

            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 8v4"/>
                    <path d="M12 16h.01"/>
                </svg>
            </div>

            <div>

                <p class="text-sm font-bold text-red-800">
                    Não foi possível criar a categoria
                </p>

                <ul class="mt-2 space-y-1">

                    @foreach($errors->all() as $error)

                        <li class="text-sm text-red-600">
                            • {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </div>

@endif


{{-- ÁREA PRINCIPAL --}}
<div class="grid gap-6 lg:grid-cols-[1fr_300px]">


    {{-- FORMULÁRIO --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:shadow-md"
    >

        {{-- CABEÇALHO DO CARD --}}
        <div class="border-b border-slate-100 px-6 py-5 sm:px-8">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="font-bold text-slate-900">
                        Informações da categoria
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Preencha os dados abaixo para continuar.
                    </p>

                </div>


                <div
                    class="hidden rounded-xl bg-slate-50 px-3 py-2 text-xs font-medium text-slate-400 sm:block"
                >
                    1 campo
                </div>

            </div>

        </div>


        {{-- FORM --}}
        <form
            action="{{ route('categoria.save') }}"
            method="POST"
            class="p-6 sm:p-8"
        >

            @csrf


            {{-- CAMPO NOME --}}
            <div>

                <label
                    for="nome"
                    class="mb-2.5 block text-sm font-semibold text-slate-800"
                >
                    Nome da categoria
                    <span class="text-red-500">*</span>
                </label>


                <div class="group/input relative">

                    {{-- ÍCONE --}}
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
                        value="{{ old('nome') }}"
                        placeholder="Ex: Tecnologia"
                        autocomplete="off"
                        autofocus
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-900 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                    >

                </div>


                <div class="mt-3 flex items-start gap-2">

                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 16v-4"/>
                        <path d="M12 8h.01"/>
                    </svg>

                    <p class="text-xs leading-5 text-slate-400">
                        Utilize um nome simples, claro e fácil de
                        identificar no sistema.
                    </p>

                </div>


                @error('nome')

                    <div class="mt-3 flex items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
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
            <div class="my-8 border-t border-slate-100"></div>


            {{-- AÇÕES --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('categorias.home') }}"
                    class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-slate-100 hover:text-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-200 active:scale-[0.98]"
                >
                    Cancelar
                </a>


                <button
                    type="submit"
                    class="group inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/25 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-[0.98]"
                >

                    <span>
                        Criar categoria
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>

                </button>

            </div>

        </form>

    </div>


    {{-- PAINEL LATERAL --}}
    <aside class="space-y-6">


        {{-- PREVIEW --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:shadow-md"
        >

            <div class="border-b border-slate-100 px-5 py-4">

                <p class="text-xs font-bold uppercase tracking-widest text-slate-400">
                    Pré-visualização
                </p>

            </div>


            <div class="p-5">

                <p class="mb-3 text-xs font-medium text-slate-400">
                    Como a categoria será apresentada
                </p>


                <div
                    class="group/preview flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50 p-4 transition duration-300 hover:border-indigo-200 hover:bg-indigo-50/50"
                >

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 font-bold text-indigo-600 transition duration-300 group-hover/preview:bg-indigo-600 group-hover/preview:text-white"
                    >
                        C
                    </div>


                    <div class="min-w-0">

                        <p class="truncate text-sm font-bold text-slate-800">
                            Nova categoria
                        </p>

                        <p class="text-xs text-slate-400">
                            Categoria de notícias
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- DICA --}}
        <div
            class="rounded-3xl bg-slate-950 p-6 text-white shadow-xl transition duration-300 hover:shadow-2xl hover:shadow-slate-950/30"
        >

            <div
                class="mb-5 flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 transition duration-300 hover:scale-105 hover:bg-white/20"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3l1.9 5.8H20l-4.9 3.6 1.9 5.8L12 14.6 7 18.2l1.9-5.8L4 8.8h6.1z"/>
                </svg>
            </div>


            <h3 class="font-bold">
                Uma boa categoria começa pelo nome.
            </h3>

            <p class="mt-2 text-sm leading-6 text-slate-400">
                Prefira nomes curtos e objetivos.
                Isso facilita a navegação e a organização
                das notícias.
            </p>


            <div class="mt-5 flex flex-wrap gap-2">

                <span
                    class="cursor-default rounded-lg bg-white/10 px-2.5 py-1.5 text-xs text-slate-300 transition duration-200 hover:bg-indigo-500/30 hover:text-white"
                >
                    Tecnologia
                </span>

                <span
                    class="cursor-default rounded-lg bg-white/10 px-2.5 py-1.5 text-xs text-slate-300 transition duration-200 hover:bg-indigo-500/30 hover:text-white"
                >
                    Desporto
                </span>

                <span
                    class="cursor-default rounded-lg bg-white/10 px-2.5 py-1.5 text-xs text-slate-300 transition duration-200 hover:bg-indigo-500/30 hover:text-white"
                >
                    Economia
                </span>

            </div>

        </div>

    </aside>

</div>


</div>

@endsection