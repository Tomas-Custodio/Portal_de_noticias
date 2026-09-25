@extends('Layouts/public')

@section('conteudo')

<div class="min-h-screen bg-slate-50 text-slate-900">

    {{-- ==================== HEADER ==================== --}}
    
  

    {{-- ==================== HERO ==================== --}}
    <section class="relative overflow-hidden border-b border-slate-200 bg-white">

        {{-- Fundo decorativo --}}
        <div class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-blue-500/5 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-indigo-500/5 blur-3xl"></div>


        <div class="relative mx-auto max-w-7xl px-6 py-20 md:py-28">

            <div class="max-w-3xl">

                <span class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-widest text-blue-600">
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-blue-600"></span>
                    Portal de notícias
                </span>

                <h1 class="mt-6 text-5xl font-black leading-[1.05] tracking-tighter text-slate-950">
                    Informação que
                    <span class="text-blue-600">importa.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-500">
                    Notícias, acontecimentos e histórias que ajudam
                    você a compreender o mundo à sua volta.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a href="{{ route('noticias') }}"
                       class="group inline-flex items-center gap-2 rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-slate-950/20 transition duration-200 hover:bg-blue-600 hover:shadow-blue-600/30 focus:outline-none focus:ring-4 focus:ring-blue-500/30 active:scale-[0.98]">
                        Explorar notícias
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m13 6 6 6-6 6"/>
                        </svg>
                    </a>

                    <a href="{{ route('categorias') }}"
                       class="group inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-700 shadow-sm transition duration-200 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/10 active:scale-[0.98]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                        Ver categorias
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- ==================== LATEST NEWS ==================== --}}
    <section class="mx-auto max-w-7xl px-6 py-16">

        <div class="mb-10 flex flex-wrap items-end justify-between gap-4">

            <div>

                <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue-600">
                    <span class="h-1 w-6 rounded-full bg-blue-600"></span>
                    Atualizações
                </p>

                <h2 class="mt-3 text-4xl font-black tracking-tighter text-slate-950">
                    Últimas notícias
                </h2>

            </div>

            <a href="{{ route('noticias.list') }}"
               class="group inline-flex items-center gap-1.5 text-sm font-bold text-blue-600 transition hover:text-blue-700">
                Ver todas
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </a>

        </div>


        {{-- GRID DE NOTÍCIAS --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($noticias as $noticia)

                <article class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl">

                    {{-- IMAGEM --}}
                    <div class="relative overflow-hidden">

                        <img
                            src="{{ asset('storage/' . $noticia->img) }}"
                            alt="{{ $noticia->titulo }}"
                            class="h-48 w-full object-cover transition duration-500 group-hover:scale-105"
                        >

                        <div class="absolute inset-x-0 top-0 flex items-center justify-between p-3">

                            <span class="rounded-lg bg-white/90 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-blue-600 backdrop-blur">
                                Notícia
                            </span>

                            <span class="rounded-lg bg-slate-950/70 px-2.5 py-1 text-[10px] font-medium text-white backdrop-blur">
                                {{ $noticia->data }}
                            </span>

                        </div>

                    </div>


                    {{-- CONTEÚDO --}}

                    <div class="flex flex-1 flex-col p-5">

                        <h3 class="text-lg font-bold leading-snug text-slate-900 line-clamp-2 transition group-hover:text-blue-600">
                            {{ $noticia->titulo }}
                        </h3>

                        <p class="mt-2 flex-1 text-sm leading-6 text-slate-500 line-clamp-3">
                            {{ $noticia->resumo }}
                        </p>


                        {{-- LINK --}}
                        <a
                            href="{{ route('detalhes', $noticia->slug) }}"
                            class="mt-4 inline-flex items-center gap-1.5 text-sm font-bold text-blue-600 transition hover:text-blue-700"
                        >
                            Ler mais
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m13 6 6 6-6 6"/>
                            </svg>
                        </a>

                    </div>

                </article>

            @endforeach

        </div>


        {{-- PAGINAÇÃO --}}
        <div class="mt-12">
            {{ $noticias->links() }}
        </div>

    </section>


    {{-- ==================== CATEGORIES ==================== --}}
    
    <section class="mx-auto max-w-7xl px-6 py-16">

        <div class="relative overflow-hidden rounded-3xl bg-slate-950 p-8 shadow-2xl shadow-slate-950/20 md:p-12">

            {{-- Fundo decorativo --}}
            <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-blue-500/20 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>


            <div class="relative max-w-2xl">

                <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue-400">
                    <span class="h-1 w-6 rounded-full bg-blue-400"></span>
                    Explore
                </p>

                <h2 class="mt-3 text-4xl font-black tracking-tighter text-white">
                    Encontre notícias por categoria
                </h2>

                <p class="mt-4 leading-7 text-slate-400">
                    Escolha um tema e encontre conteúdos relacionados
                    aos assuntos que mais lhe interessam.
                </p>

            </div>


            <div class="relative mt-8 flex flex-wrap gap-3">

                <a href="#" class="group inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/30 transition duration-200 hover:bg-blue-500 hover:shadow-blue-500/40 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3l1.9 5.8H20l-4.9 3.6 1.9 5.8L12 14.6 7 18.2l1.9-5.8L4 8.8h6.1z"/>
                    </svg>
                    Tecnologia
                </a>

                <a href="#" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-bold text-white backdrop-blur transition duration-200 hover:bg-white hover:text-slate-950 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20"/>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                    Economia
                </a>

                <a href="#" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-bold text-white backdrop-blur transition duration-200 hover:bg-white hover:text-slate-950 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M3 12h18"/>
                        <path d="M12 3a14 14 0 0 1 0 18a14 14 0 0 1 0-18"/>
                    </svg>
                    Mundo
                </a>

                <a href="#" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-bold text-white backdrop-blur transition duration-200 hover:bg-white hover:text-slate-950 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 7v5l3 2"/>
                    </svg>
                    Desporto
                </a>

                <a href="#" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-bold text-white backdrop-blur transition duration-200 hover:bg-white hover:text-slate-950 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 22h16"/>
                        <path d="M6 18V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v14"/>
                        <path d="M6 18h12"/>
                    </svg>
                    Cultura
                </a>

                <a href="#" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-bold text-white backdrop-blur transition duration-200 hover:bg-white hover:text-slate-950 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 3h6"/>
                        <path d="M10 3v6.5L5.5 17a2 2 0 0 0 1.7 3h9.6a2 2 0 0 0 1.7-3L14 9.5V3"/>
                    </svg>
                    Ciência
                </a>

            </div>

        </div>

    </section>


    {{-- ==================== ABOUT ==================== --}}
    <section class="mx-auto max-w-7xl px-6 py-16">

        <div class="grid gap-10 rounded-3xl border border-slate-200 bg-white p-8 shadow-sm md:grid-cols-2 md:p-12">

            <div>

                <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue-600">
                    <span class="h-1 w-6 rounded-full bg-blue-600"></span>
                    Sobre o PortalNotice
                </p>

                <h2 class="mt-4 text-3xl font-black leading-tight tracking-tighter text-slate-950 md:text-4xl">
                    Informação simples.
                    <br>
                    <span class="text-blue-600">Conteúdo relevante.</span>
                </h2>

            </div>

            <div class="flex items-center">

                <p class="leading-8 text-slate-500">
                    O PortalNotice foi criado para apresentar notícias
                    de forma simples, organizada e agradável.
                    O objetivo é aproximar o leitor da informação
                    através de uma experiência moderna e fácil de utilizar.
                </p>

            </div>

        </div>

    </section>


    {{-- ==================== FOOTER ==================== --}}
    <footer class="border-t border-slate-200 bg-white">

        <div class="mx-auto max-w-7xl px-6 py-12">

            <div class="flex flex-col justify-between gap-10 md:flex-row">

                <div>

                    <h2 class="text-xl font-black tracking-tighter text-slate-950">
                        Portal<span class="text-blue-600">Notice</span>
                    </h2>

                    <p class="mt-3 max-w-sm text-sm leading-6 text-slate-500">
                        Informação que chega até si de forma simples,
                        clara e organizada.
                    </p>


                    {{-- REDES SOCIAIS --}}
                    <div class="mt-5 flex gap-2">

                        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition duration-200 hover:bg-blue-600 hover:text-white active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                            </svg>
                        </a>

                        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition duration-200 hover:bg-blue-600 hover:text-white active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5"/>
                                <path d="M16 11.4a4 4 0 1 1-7.9 1.2A4 4 0 0 1 16 11.4z"/>
                                <path d="M17.5 6.5h.01"/>
                            </svg>
                        </a>

                        <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition duration-200 hover:bg-blue-600 hover:text-white active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>

                    </div>

                </div>


                <div class="flex gap-12">

                    <div>

                        <h3 class="text-xs font-bold uppercase tracking-widest text-slate-950">
                            Navegação
                        </h3>

                        <div class="mt-4 space-y-3">

                            <a href="{{ route('home') }}" class="group flex items-center gap-1.5 text-sm text-slate-500 transition hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-0 transition group-hover:opacity-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>
                                Home
                            </a>

                            <a href="{{ route('noticias') }}" class="group flex items-center gap-1.5 text-sm text-slate-500 transition hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-0 transition group-hover:opacity-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>
                                Notícias
                            </a>

                            <a href="{{ route('categorias') }}" class="group flex items-center gap-1.5 text-sm text-slate-500 transition hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-0 transition group-hover:opacity-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>
                                Categorias
                            </a>

                        </div>

                    </div>


                    <div>

                        <h3 class="text-xs font-bold uppercase tracking-widest text-slate-950">
                            Informações
                        </h3>

                        <div class="mt-4 space-y-3">

                            <a href="#" class="group flex items-center gap-1.5 text-sm text-slate-500 transition hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-0 transition group-hover:opacity-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>
                                Sobre nós
                            </a>

                            <a href="#" class="group flex items-center gap-1.5 text-sm text-slate-500 transition hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-0 transition group-hover:opacity-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>
                                Contacto
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <div class="mt-10 flex flex-col items-start justify-between gap-4 border-t border-slate-100 pt-6 md:flex-row md:items-center">

                <p class="text-sm text-slate-400">
                    © {{ date('Y') }} <span class="font-bold text-slate-600">PortalNotice</span> · Todos os direitos reservados
                </p>

                <p class="text-xs text-slate-400">
                    Site made by <span class="font-bold text-slate-600">Tomás Custódio</span>
                </p>

            </div>

        </div>

    </footer>

</div>

@endsection