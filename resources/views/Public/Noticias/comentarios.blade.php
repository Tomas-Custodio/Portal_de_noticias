@extends('Layouts/public')

@section('name', 'Comentários — ' . ($noticia_found->titulo ?? 'Notícia'))

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

```
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    {{-- BREADCRUMB --}}
    <nav class="mb-6 flex flex-wrap items-center gap-2 text-sm">

        <a href="{{ route('home') }}"
           class="font-medium text-slate-400 transition hover:text-blue-600">
            Home
        </a>

        <span class="text-slate-300">/</span>

        <a href="{{ route('noticias.home') }}"
           class="font-medium text-slate-400 transition hover:text-blue-600">
            Notícias
        </a>

        <span class="text-slate-300">/</span>

        <span class="line-clamp-1 font-medium text-slate-600">
            {{ $noticia_found->titulo }}
        </span>

    </nav>


    {{-- GRID PRINCIPAL --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-10">


        {{-- ================================================= --}}
        {{-- COLUNA DA NOTÍCIA (ESQUERDA) --}}
        {{-- ================================================= --}}

        <aside class="lg:col-span-3">

            <div class="sticky top-6 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                {{-- IMAGEM --}}
                <div class="aspect-[16/10] w-full overflow-hidden bg-slate-100">

                    @if($noticia_found->img)

                        <img
                            src="{{ asset('storage/' . $noticia_found->img) }}"
                            alt="{{ $noticia_found->titulo }}"
                            class="h-full w-full object-cover transition duration-500 hover:scale-105"
                        >

                    @else

                        <div class="flex h-full items-center justify-center text-sm text-slate-400">
                            Sem imagem
                        </div>

                    @endif

                </div>


                {{-- INFORMAÇÕES --}}
                <div class="p-5">

                    {{-- CATEGORIA + DATA --}}
                    <div class="flex flex-wrap items-center gap-2">

                        @if($noticia_found->categoria)

                            <span class="rounded-lg bg-blue-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-blue-600">
                                {{ $noticia_found->categoria->nome }}
                            </span>

                        @endif

                        <span class="text-xs text-slate-400">
                            {{ \Carbon\Carbon::parse($noticia_found->data)->format('d/m/Y') }}
                        </span>

                    </div>


                    {{-- TÍTULO --}}
                    <h1 class="mt-4 text-xl font-black leading-tight tracking-tight text-slate-950">
                        {{ $noticia_found->titulo }}
                    </h1>


                    {{-- RESUMO (só se existir) --}}
                    @if(!empty($noticia_found->resumo))

                        <p class="mt-4 text-sm leading-6 text-slate-500">
                            {{ $noticia_found->resumo }}
                        </p>

                    @endif


                    {{-- BOTÃO VOLTAR --}}
                    <a
                        href="{{ route('noticias') }}"
                        class="mt-6 flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <path d="M19 12H5"/>
                            <path d="m12 19-7-7 7-7"/>

                        </svg>

                        Voltar às notícias

                    </a>

                </div>

            </div>

        </aside>


        {{-- ================================================= --}}
        {{-- COLUNA DOS COMENTÁRIOS (DIREITA) --}}
        {{-- ================================================= --}}

        <main class="lg:col-span-7">


            {{-- CABEÇALHO --}}
            <div class="mb-5">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-2xl font-black tracking-tight text-slate-950">
                            Comentários
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Partilhe a sua opinião sobre esta notícia.
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">

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

                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>

                        </svg>

                    </div>

                </div>

            </div>


            {{-- MENSAGEM DE SUCESSO --}}
            @if(session('msg'))

                <div class="mb-5 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <path d="m5 12 4 4L19 6"/>

                        </svg>

                    </div>

                    <p class="text-sm font-medium text-emerald-700">
                        {{ session('msg') }}
                    </p>

                </div>

            @endif


            {{-- ERROS --}}
            @if($errors->any())

                <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 p-4">

                    <p class="text-sm font-bold text-red-800">
                        Não foi possível enviar o comentário.
                    </p>

                    <ul class="mt-2 space-y-1">

                        @foreach($errors->all() as $error)

                            <li class="text-sm text-red-600">
                                • {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- LISTA DE COMENTÁRIOS --}}
            {{-- ================================================= --}}

            <div class="space-y-3">

                @forelse($comentarios as $comentario)

                    <article
                        class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md"
                    >

                        <div class="flex gap-3">

                            {{-- AVATAR --}}
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 font-bold text-slate-600">

                                {{ strtoupper(substr($comentario->usuario->nome ?? 'U', 0, 1)) }}

                            </div>


                            <div class="min-w-0 flex-1">

                                {{-- CABEÇALHO --}}
                                <div class="flex flex-wrap items-center gap-x-2 gap-y-1">

                                    <span class="text-sm font-bold text-slate-900">
                                        {{ $comentario->usuario->nome  }}
                                    </span>

                                    <span class="text-xs text-slate-400">
                                        •
                                    </span>

                                    <span class="text-xs text-slate-400">
                                        {{ \Carbon\Carbon::parse($comentario->created_at)->diffForHumans() }}
                                    </span>

                                </div>


                                {{-- TEXTO --}}
                                <div class="mt-2 rounded-2xl bg-slate-50 px-4 py-3">

                                    <p class="whitespace-pre-line text-sm leading-6 text-slate-700">
                                        {{ $comentario->descricao }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </article>

                @empty

                    {{-- SEM COMENTÁRIOS --}}
                    <div class="rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-12 text-center">

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>

                            </svg>

                        </div>

                        <h3 class="mt-4 text-sm font-bold text-slate-800">
                            Ainda não existem comentários
                        </h3>

                        <p class="mt-1 text-sm text-slate-400">
                            Seja o primeiro a comentar esta notícia.
                        </p>

                    </div>

                @endforelse

            </div>


            {{-- ================================================= --}}
            {{-- SEPARADOR --}}
            {{-- ================================================= --}}

            <div class="my-8 border-t border-slate-200"></div>


            {{-- ================================================= --}}
            {{-- CAIXA DE COMENTÁRIO --}}
            {{-- FICA DEPOIS DOS COMENTÁRIOS --}}
            {{-- ================================================= --}}

            @auth

                <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                    <form
                        action="{{ route('comentario.save', $noticia_found->id) }}"
                        method="POST"
                    >

                        @csrf


                        {{-- USER ID (hidden) --}}
                        <input
                            type="hidden"
                            name="user_id"
                            value="{{ auth()->id() }}"
                        >


                        {{-- CATEGORIA ID (hidden) --}}
                        <input
                            type="hidden"
                            name="categoria_id"
                            value="{{ $noticia_found->categoria_id }}"
                        >


                        <div class="flex gap-3">

                            {{-- AVATAR --}}
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-600">

                                {{ strtoupper(substr(auth()->user()->nome ?? 'U', 0, 1)) }}

                            </div>


                            {{-- CAMPO --}}
                            <div class="min-w-0 flex-1">

                                <textarea
                                    name="descricao"
                                    rows="3"
                                    required
                                    placeholder="Escreva um comentário..."
                                    class="w-full resize-none rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm leading-6 text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                                >{{ old('descricao') }}</textarea>


                                @error('descricao')

                                    <p class="mt-2 text-xs font-medium text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror


                                <div class="mt-3 flex items-center justify-between">

                                    <p class="hidden text-xs text-slate-400 sm:block">
                                        Seja respeitoso e objetivo.
                                    </p>


                                    <button
                                        type="submit"
                                        class="ml-auto inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 hover:shadow-xl active:scale-[0.98]"
                                    >

                                        Comentar

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >

                                            <path d="m22 2-7 20-4-9-9-4Z"/>
                                            <path d="M22 2 11 13"/>

                                        </svg>

                                    </button>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            @else

                {{-- AVISO PARA VISITANTES --}}

                <div class="rounded-3xl border border-slate-200 bg-white p-5 text-center shadow-sm">

                    <p class="text-sm text-slate-500">

                        <a
                            href="{{ route('login') }}"
                            class="font-bold text-blue-600 hover:text-blue-700"
                        >
                            Inicie sessão
                        </a>

                        para comentar esta notícia.

                    </p>

                </div>

            @endauth


        </main>

    </div>

</div>
```

</div>

@endsection
