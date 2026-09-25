@extends('Layouts/admin')

@section('title', 'Editar Notícia')

@section('page_title', 'Editar Notícia')

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-8">


        {{-- HEADER --}}

        <div class="mb-8">

            <div class="mb-3 flex items-center gap-2 text-sm text-slate-500">

              

                <span>/</span>

                <a href="{{ route('noticias.list') }}"
                   class="hover:text-indigo-600">
                    Notícias
                </a>

                <span>/</span>

                <span class="font-medium text-slate-700">
                    Editar
                </span>

            </div>


            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">

                <div>

                    <p class="mb-2 text-sm font-semibold text-indigo-600">
                        Gestão de conteúdo
                    </p>

                    <h1 class="text-3xl font-bold tracking-tight">
                        Editar notícia
                    </h1>

                    <p class="mt-2 text-sm text-slate-500">
                        Atualize as informações desta publicação.
                    </p>

                </div>


                <a href="{{ route('noticias.list') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">

                    ← Voltar

                </a>

            </div>

        </div>


        {{-- MESSAGES --}}

        @if(session('msg'))

            <div class="mb-6 rounded-2xl border border-indigo-100 bg-indigo-50 p-4 text-sm font-medium text-indigo-700">

                {{ session('msg') }}

            </div>

        @endif


        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">

                <p class="font-bold text-red-800">
                    Existem erros no formulário.
                </p>

                <ul class="mt-2 space-y-1 text-sm text-red-700">

                    @foreach($errors->all() as $error)

                        <li>
                            • {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}

        <form
            action="{{ route('noticias.update', $noticia_found->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="grid gap-6 xl:grid-cols-3">


                {{-- =================================================
                    CONTENT
                ================================================== --}}

                <div class="space-y-6 xl:col-span-2">


                    {{-- BASIC DATA --}}

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h2 class="font-bold">
                                Conteúdo da notícia
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Edite o conteúdo principal da publicação.
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
                                    id="titulo"
                                    name="titulo"
                                    value="{{ old('titulo', $noticia_found->titulo) }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                            </div>


                            {{-- SUMMARY --}}

                            <div>

                                <label for="resumo"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Resumo
                                    <span class="text-red-500">*</span>

                                </label>

                                <textarea
                                    id="resumo"
                                    name="resumo"
                                    rows="4"
                                    class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm leading-6 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >{{ old('resumo', $noticia_found->resumo) }}</textarea>

                            </div>


                            {{-- CONTENT --}}

                            <div>

                                <label for="conteudo"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Conteúdo
                                    <span class="text-red-500">*</span>

                                </label>

                                <textarea
                                    id="conteudo"
                                    name="conteudo"
                                    rows="16"
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm leading-7 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >{{ old('conteudo', $noticia_found->conteudo) }}</textarea>

                            </div>

                        </div>

                    </div>


                    {{-- IMAGE --}}

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h2 class="font-bold">
                                Imagem
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Substitua a imagem atual caso necessário.
                            </p>

                        </div>


                        <div class="p-6">

                            <div class="overflow-hidden rounded-2xl bg-slate-100">

                                @if($noticia_found->img)

                                    <img
                                        src="{{ asset('storage/' . $noticia_found->img) }}"
                                        alt="{{ $noticia_found->titulo }}"
                                        class="h-72 w-full object-cover"
                                    >

                                @else

                                    <div class="flex h-72 items-center justify-center text-sm text-slate-400">
                                        Nenhuma imagem cadastrada.
                                    </div>

                                @endif

                            </div>


                            <div class="mt-5">

                                <label for="img"
                                       class="flex cursor-pointer items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 px-5 py-5 text-sm font-semibold text-slate-600 transition hover:border-indigo-400 hover:bg-indigo-50 hover:text-indigo-600">

                                    <svg class="mr-3 h-5 w-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M4 16l4-4a2 2 0 012.828 0L14 15l2-2a2 2 0 012.828 0L20 14M14 8h.01M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>

                                    </svg>

                                    Escolher nova imagem

                                    <input
                                        type="file"
                                        id="img"
                                        name="img"
                                        accept="image/*"
                                        class="hidden"
                                    >

                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    SIDEBAR
                ================================================== --}}

                <div class="space-y-6">


                    {{-- SETTINGS --}}

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h2 class="font-bold">
                                Configurações
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Informações da publicação.
                            </p>

                        </div>


                        <div class="space-y-6 p-6">


                            {{-- CATEGORY --}}

                            <div>

                                <label for="categoria_id"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Categoria

                                </label>

                                <select
                                    name="categoria_id"
                                    id="categoria_id"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                                    @foreach($categorias as $categoria)

                                        <option
                                            value="{{ $categoria->id }}"
                                            {{ old('categoria_id', $noticia_found->categoria_id) == $categoria->id ? 'selected' : '' }}
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

                                </label>

                                <select
                                    name="estado"
                                    id="estado"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">

                                   

                                    <<option value="Rascunho">
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

                                    Data

                                </label>

                                <input
                                    type="date"
                                    id="data"
                                    name="data"
                                    value="{{ old('data', $noticia_found->data) }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                            </div>


                            {{-- AUTHOR --}}

                            <div>

                                <label for="user_id"
                                       class="mb-2 block text-sm font-semibold text-slate-700">

                                    Autor

                                </label>

                                <select
                                    name="user_id"
                                    id="user_id"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                                    required
                                >

                                    @foreach($users as $user)

                                        <option
                                            value="{{ $user->id }}"
                                            {{ old('user_id', $noticia_found->user_id) == $user->id ? 'selected' : '' }}
                                        >
                                            {{ $user->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- CURRENT INFO --}}

                    <div class="rounded-2xl bg-slate-900 p-6 text-white shadow-xl">

                        <p class="text-xs font-bold uppercase tracking-wider text-indigo-300">
                            ID da notícia
                        </p>

                        <p class="mt-2 text-3xl font-bold">
                            #{{ $noticia_found->id }}
                        </p>

                        <div class="mt-5 border-t border-white/10 pt-4">

                            <p class="text-xs text-slate-400">
                                Última atualização
                            </p>

                            <p class="mt-1 text-sm font-medium text-slate-200">
                                {{ $noticia_found->updated_at?->format('d/m/Y H:i') }}
                            </p>

                        </div>

                    </div>


                    {{-- ACTIONS --}}

                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

                        <button
                            type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700"
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

                            Guardar alterações

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

        </form>

    </div>

</div>

@endsection