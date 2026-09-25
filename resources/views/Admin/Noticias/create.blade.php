@extends('Layouts/admin')

@section('title', 'Nova Notícia')

@section('page_title', 'Nova Notícia')

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-8">

        {{-- =========================================================
            HEADER
        ========================================================== --}}

        <div class="mb-8">

            <div class="mb-3 flex items-center gap-2 text-sm text-slate-500">

               

                <span>/</span>

                <a href="{{ route('noticias.list') }}"
                   class="transition hover:text-indigo-600">
                    Notícias
                </a>

                <span>/</span>

                <span class="font-medium text-slate-700">
                    Nova notícia
                </span>

            </div>

            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">

                <div>

                    <p class="mb-2 text-sm font-semibold text-indigo-600">
                        Gerenciamento de conteúdo
                    </p>

                    <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                        Criar nova notícia
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                        Preencha as informações abaixo para publicar uma nova notícia no portal.
                    </p>

                </div>

                <a href="{{ route('noticias.list') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>

                    </svg>

                    Voltar para notícias

                </a>

            </div>

        </div>


        {{-- =========================================================
            MESSAGES
        ========================================================== --}}

        @if(session('msg'))

            <div class="mb-6 flex items-start gap-3 rounded-2xl border border-indigo-100 bg-indigo-50 p-4 text-indigo-800">

                <svg class="mt-0.5 h-5 w-5 shrink-0"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13 16h-1v-4h-1m1-8h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                </svg>

                <p class="text-sm font-medium">
                    {{ session('msg') }}
                </p>

            </div>

        @endif


        {{-- =========================================================
            VALIDATION ERRORS
        ========================================================== --}}

        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">

                <div class="flex gap-3">

                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-500"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                    </svg>

                    <div>

                        <p class="text-sm font-bold text-red-800">
                            Verifique os dados informados.
                        </p>

                        <ul class="mt-2 space-y-1 text-sm text-red-700">

                            @foreach($errors->all() as $error)

                                <li>
                                    • {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================================================
            FORM
        ========================================================== --}}

        <form action="{{ route('noticias.save') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf


            <div class="grid gap-6 xl:grid-cols-3">


                {{-- =================================================
                    MAIN CONTENT
                ================================================== --}}

                <div class="space-y-6 xl:col-span-2">


                    {{-- BASIC INFORMATION --}}

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h2 class="font-bold text-slate-900">
                                Informações da notícia
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Defina o título e o conteúdo principal da publicação.
                            </p>

                        </div>


                        <div class="space-y-6 p-6">


                            {{-- TITLE --}}

                            <div>

                                <label for="titulo"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Título

                                    <span class="text-red-500">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="titulo"
                                    id="titulo"
                                    value="{{ old('titulo') }}"
                                    placeholder="Ex.: Governo anuncia novas medidas para a educação"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                                <p class="mt-2 text-xs text-slate-400">
                                    Use um título claro e objetivo.
                                </p>

                            </div>


                            {{-- SUMMARY --}}

                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <label for="resumo"
                                           class="block text-sm font-semibold text-slate-700">

                                        Resumo

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <span class="text-xs text-slate-400">
                                        Breve descrição
                                    </span>

                                </div>

                                <textarea
                                    name="resumo"
                                    id="resumo"
                                    rows="4"
                                    placeholder="Escreva um pequeno resumo da notícia..."
                                    class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >{{ old('resumo') }}</textarea>

                            </div>


                            {{-- CONTENT --}}

                            <div>

                                <label for="conteudo"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Conteúdo

                                    <span class="text-red-500">*</span>

                                </label>

                                <textarea
                                    name="conteudo"
                                    id="conteudo"
                                    rows="14"
                                    placeholder="Escreva o conteúdo completo da notícia..."
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm leading-7 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >{{ old('conteudo') }}</textarea>

                                <p class="mt-2 text-xs text-slate-400">
                                    Escreva o conteúdo completo da publicação.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- IMAGE --}}

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h2 class="font-bold text-slate-900">
                                Imagem da notícia
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Escolha uma imagem para representar a notícia.
                            </p>

                        </div>


                        <div class="p-6">

                            <label for="img"
                                   class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 px-6 py-12 text-center transition hover:border-indigo-400 hover:bg-indigo-50/50">

                                <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-600 transition group-hover:scale-105">

                                    <svg class="h-8 w-8"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M4 16l4-4a2 2 0 012.828 0L14 15l2-2a2 2 0 012.828 0L20 14M14 8h.01M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>

                                    </svg>

                                </div>

                                <p class="text-sm font-semibold text-slate-700">
                                    Clique para escolher uma imagem
                                </p>

                                <p class="mt-2 text-xs text-slate-400">
                                    PNG, JPG, JPEG ou WEBP
                                </p>

                                <input
                                    type="file"
                                    name="img"
                                    id="img"
                                    accept="image/*"
                                    class="hidden"
                                    required
                                >

                            </label>

                            <p class="mt-3 text-xs text-slate-400">
                                A imagem será armazenada no diretório de notícias.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    SIDEBAR FORM
                ================================================== --}}

                <div class="space-y-6">


                    {{-- PUBLICATION SETTINGS --}}

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h2 class="font-bold text-slate-900">
                                Publicação
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Configure os detalhes da publicação.
                            </p>

                        </div>


                        <div class="space-y-6 p-6">


                            {{-- CATEGORY --}}

                            <div>

                                <label for="categoria_id"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Categoria

                                    <span class="text-red-500">*</span>

                                </label>

                                <select
                                    name="categoria_id"
                                    id="categoria_id"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-700 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                                    <option value="">
                                        Selecionar categoria
                                    </option>

                                    @foreach($categorias as $categoria)

                                        <option
                                            value="{{ $categoria->id }}"
                                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}
                                        >
                                            {{ $categoria->nome }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- STATE --}}

                            <div>

                                <label for="estado"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Estado

                                    <span class="text-red-500">*</span>

                                </label>

                                <select name="estado"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-700 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required>


                                    <option value="Rascunho">
                                        Rascunho
                                    </option>

                                    <option value="Publicado">
                                        Publicado
                                    </option>

                                    <option value="Despublicado">
                                        Despublicado
                                    </option>


                                </select>

                            </div>


                            {{-- DATE --}}

                            <div>

                                <label for="data"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Data da notícia

                                    <span class="text-red-500">*</span>

                                </label>

                                <input
                                    type="date"
                                    name="data"
                                    id="data"
                                    value="{{ old('data', date('Y-m-d')) }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-700 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                            </div>


                            {{-- USER --}}

                            <div>

                                <label for="user_id"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Autor

                                    <span class="text-red-500">*</span>

                                </label>

                                <select
                                    name="user_id"
                                    id="user_id"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-700 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                                    <option value="">
                                        Selecionar autor
                                    </option>

                                    @foreach($users as $user)

                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->nome }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- INFORMATION CARD --}}

                    <div class="rounded-2xl bg-slate-900 p-6 text-white shadow-xl">

                        <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-white/10">

                            <svg class="h-5 w-5 text-indigo-300"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-8h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                        <h3 class="font-bold">
                            Antes de publicar
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Verifique o título, a categoria, a imagem e o conteúdo antes de salvar a notícia.
                        </p>

                    </div>


                    {{-- ACTIONS --}}

                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

                        <div class="flex flex-col gap-3">

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
                            >

                                <svg class="h-5 w-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                                Criar notícia

                            </button>

                        </div>

                         <section>
                            <a
                            href="{{ route('noticias.list') }}"
                            class="mt-3 flex w-full items-center justify-center rounded-xl border border-slate-200 px-5 py-3.5 text-sm font-semibold text-slate-600  focus:bg-red-400 hover:bg-blue-200"
                        >
                            Cancelar
                        </a>
                    </section>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection
