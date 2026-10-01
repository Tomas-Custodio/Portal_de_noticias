@extends('Layouts/public')

@section('nome', $noticia->titulo)

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

```
{{-- CONTAINER PRINCIPAL --}}
<div class="mx-auto max-w-[1600px] px-4 py-8 sm:px-6 lg:px-8 lg:py-10">

    {{-- VOLTAR --}}
    <a
        href="{{ route('noticias') }}"
        class="group mb-8 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 transition-colors duration-200 hover:text-blue-700"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2.5"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M19 12H5"/>
            <path d="m12 19-7-7 7-7"/>
        </svg>

        Voltar às notícias
    </a>


    {{-- =========================================================
        GRID PRINCIPAL
        3 COLUNAS | 7 COLUNAS | 2 COLUNAS
    ========================================================== --}}

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-12 lg:items-start">


        {{-- =====================================================
            NOTÍCIA / IDENTIFICAÇÃO
        ====================================================== --}}

        <aside class="min-w-0 lg:col-span-3 lg:sticky lg:top-6 lg:self-start">

            {{-- TÍTULO --}}
            <div class="mb-6">

                <p class="mb-2 text-[11px] font-bold uppercase tracking-[0.2em] text-blue-600">
                    Notícia
                </p>

                <h1 class="text-2xl font-black leading-[1.15] tracking-tight text-slate-950 sm:text-3xl">
                    {{ $noticia->titulo }}
                </h1>

            </div>


            {{-- IMAGEM --}}
            @if($noticia->img)

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="aspect-[4/3] w-full bg-slate-100">

                        <img
                            src="{{ asset('storage/' . $noticia->img) }}"
                            alt="{{ $noticia->titulo }}"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-[1.02]"
                            loading="lazy"
                        >

                    </div>

                </div>

            @endif


            {{-- METADADOS --}}
            <div class="mt-5">

                @if($noticia->categoria)

                    <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-blue-600">
                        {{ $noticia->categoria->nome }}
                    </span>

                @endif


                <div class="mt-4 border-t border-slate-200 pt-4">

                    <p class="text-xs leading-5 text-slate-500">

                        Publicado por

                        <span class="font-semibold text-slate-800">
                            {{ $noticia->usuario?->nome }}
                        </span>

                    </p>

                    <p class="mt-1 text-xs leading-5 text-slate-400">

                        {{ \Carbon\Carbon::parse($noticia->data)->locale('pt')->translatedFormat('d \d\e F \d\e Y') }}

                    </p>

                </div>

            </div>

        </aside>



        {{-- =====================================================
            DETALHES
        ====================================================== --}}

        <main class="min-w-0 lg:col-span-7">


            {{-- =================================================
                ÁREA DE LEITURA
            ================================================== --}}

            <article
                class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"
            >

                <div
                    class="lg:h-[calc(100vh-8rem)] lg:overflow-y-auto lg:overscroll-contain
                           [&::-webkit-scrollbar]:w-2
                           [&::-webkit-scrollbar-track]:bg-transparent
                           [&::-webkit-scrollbar-thumb]:rounded-full
                           [&::-webkit-scrollbar-thumb]:bg-slate-200
                           hover:[&::-webkit-scrollbar-thumb]:bg-slate-300"
                >

                    {{-- CONTEÚDO --}}
                    <div class="px-6 py-7 sm:px-8 sm:py-9 lg:px-10 lg:py-10">

                        <div
                            class="whitespace-pre-line text-justify text-base leading-8 text-slate-700 sm:text-lg sm:leading-9"
                        >
                            {{ $noticia->conteudo }}
                        </div>

                    </div>


                    {{-- RESUMO --}}
                    @if($noticia->resumo)

                        <div class="border-t border-slate-100 bg-slate-50/70 px-6 py-6 sm:px-8 lg:px-10">

                            <p class="mb-3 text-[10px] font-bold uppercase tracking-[0.2em] text-blue-600">
                                Resumo
                            </p>

                            <p class="text-justify text-sm leading-7 text-slate-600 sm:text-base sm:leading-8">
                                {{ $noticia->resumo }}
                            </p>

                        </div>

                    @endif

                </div>

            </article>



            {{-- =================================================
                FORMULÁRIO DE COMENTÁRIO
            ================================================== --}}

            <section class="mt-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="p-4 sm:p-5">

                    <div class="mb-3">

                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">
                            Deixe o seu comentário
                        </p>

                    </div>


                    @auth

                        <form
                            action="{{ route('comentario.save', $noticia->id) }}"
                            method="POST"
                        >

                            @csrf

                            <input
                                type="hidden"
                                name="noticia_id"
                                value="{{ $noticia->id }}"
                            >

                            <input
                                type="hidden"
                                name="user_id"
                                value="{{ Auth::user()->id }}"
                            >


                            <div class="flex items-start gap-3">

                                {{-- AVATAR --}}
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-100 text-xs font-bold text-blue-600">

                                    {{ strtoupper(substr(auth()->user()->nome ?? 'U', 0, 1)) }}

                                </div>


                                <div class="min-w-0 flex-1">

                                    <p class="mb-1.5 text-sm font-semibold text-slate-800">
                                        {{ auth()->user()->nome }}
                                    </p>


                                    <textarea
                                        name="descricao"
                                        rows="3"
                                        required
                                        maxlength="1000"
                                        placeholder="Escreva o seu comentário..."
                                        class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm leading-6 text-slate-700 placeholder-slate-400 outline-none transition duration-200 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100"
                                    >{{ old('descricao') }}</textarea>


                                    @error('descricao')

                                        <p class="mt-1 text-xs font-medium text-red-500">
                                            {{ $message }}
                                        </p>

                                    @enderror


                                    <div class="mt-2 flex items-center justify-between gap-4">

                                        <span class="text-[10px] text-slate-400">
                                            Máx. 1000 caracteres
                                        </span>


                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-white transition duration-200 hover:bg-blue-700 active:scale-95"
                                        >

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3.5 w-3.5"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="m22 2-7 20-4-9-9-4Z"/>
                                                <path d="M22 2 11 13"/>
                                            </svg>

                                            Comentar

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </form>


                    @else

                        <div class="flex flex-col items-center gap-2 rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4 text-center">

                            <p class="text-sm text-slate-500">
                                Faça login para deixar um comentário.
                            </p>

                            <a
                                href="{{ route('login') }}"
                                class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-white transition duration-200 hover:bg-blue-700 active:scale-95"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-3.5 w-3.5"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                    <polyline points="10 17 15 12 10 7"/>
                                    <line x1="15" y1="12" x2="3" y2="12"/>
                                </svg>

                                Entrar

                            </a>

                        </div>

                    @endauth

                </div>

            </section>

        </main>



        {{-- =====================================================
            COMENTÁRIOS
        ====================================================== --}}

        <aside class="min-w-0 lg:col-span-2 lg:sticky lg:top-6 lg:self-start">

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


                {{-- CABEÇALHO --}}
                <div class="flex items-center justify-between border-b border-slate-100 px-4 py-3.5">

                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">
                        Comentários
                    </p>

                    <span class="inline-flex min-w-6 items-center justify-center rounded-full bg-blue-50 px-2 py-1 text-[10px] font-bold text-blue-600">
                        {{ $noticia->comentarios->count() ?? 0 }}
                    </span>

                </div>


                {{-- LISTA --}}
                <div
                    class="lg:max-h-[calc(100vh-9rem)] lg:overflow-y-auto lg:overscroll-contain
                           [&::-webkit-scrollbar]:w-2
                           [&::-webkit-scrollbar-track]:bg-transparent
                           [&::-webkit-scrollbar-thumb]:rounded-full
                           [&::-webkit-scrollbar-thumb]:bg-slate-200
                           hover:[&::-webkit-scrollbar-thumb]:bg-slate-300"
                >

                    <div class="divide-y divide-slate-100 px-4">

                        @forelse($noticia->comentarios as $comentario)

                            <div class="flex items-start gap-3 py-3.5">

                                {{-- AVATAR --}}
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-[10px] font-bold text-slate-600">

                                    {{ strtoupper(substr($comentario->usuario?->nome ?? 'A', 0, 1)) }}

                                </div>


                                <div class="min-w-0 flex-1">

                                    <div class="flex items-center gap-2">

                                        <span class="truncate text-[11px] font-semibold text-slate-800">
                                            {{ $comentario->usuario?->nome ?? 'Anónimo' }}
                                        </span>

                                        <span class="shrink-0 text-[9px] text-slate-400">
                                            {{ \Carbon\Carbon::parse($comentario->created_at)->locale('pt')->diffForHumans() }}
                                        </span>

                                    </div>


                                    <p class="mt-1 break-words text-xs leading-5 text-slate-600">
                                        {{ $comentario->descricao }}
                                    </p>

                                </div>

                            </div>

                        @empty

                            <p class="px-2 py-8 text-center text-xs leading-5 text-slate-400">
                                Ainda não há comentários.
                                <br>
                                Seja o primeiro a comentar!
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>

        </aside>


    </div>

</div>

</div>

@endsection
