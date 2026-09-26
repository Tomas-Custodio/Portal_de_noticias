<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('name', 'PortalNotice')</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="antialiased bg-slate-50 text-slate-900">


    {{-- ==================== HEADER ==================== --}}

    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur-xl">

        {{-- LINHA 1: LOGO + NAV + SEARCH --}}
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-4 lg:flex-row lg:items-center lg:justify-between">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="group shrink-0">
                <h1 class="text-2xl font-black tracking-tighter text-slate-950">
                    Portal<span class="text-blue-600 transition group-hover:text-blue-500">Notice</span>
                </h1>
            </a>


            {{-- NAV --}}
            <nav class="flex flex-wrap items-center gap-2 lg:gap-6">

                {{-- HOME --}}
                <a href="{{ route('home') }}"
                   class="group relative inline-flex items-center gap-2 text-sm font-bold text-blue-600 transition hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 10.5 12 3l9 7.5"/>
                        <path d="M5 9.5V21h14V9.5"/>
                        <path d="M9 21v-6h6v6"/>
                    </svg>
                    inicio
                    <span class="absolute -bottom-1 left-0 h-0.5 w-full origin-left scale-x-100 rounded-full bg-blue-600 transition"></span>
                </a>


                {{-- NOTÍCIAS --}}
                <a href="{{ route('noticias') }}"
                   class="group relative inline-flex items-center gap-2 text-sm font-medium text-slate-600 transition hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:-translate-y-0.5 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                        <path d="M19 6h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"/>
                        <path d="M8 8h7"/>
                        <path d="M8 12h7"/>
                        <path d="M8 16h4"/>
                    </svg>
                    Notícias
                    <span class="absolute -bottom-1 left-0 h-0.5 w-full origin-left scale-x-0 rounded-full bg-blue-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                </a>


                {{-- CATEGORIAS --}}
                <a href="{{ route('categorias') }}"
                   class="group relative inline-flex items-center gap-2 text-sm font-medium text-slate-600 transition hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:-translate-y-0.5 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    </svg>
                    Categorias
                    <span class="absolute -bottom-1 left-0 h-0.5 w-full origin-left scale-x-0 rounded-full bg-blue-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                </a>


                {{-- LOGIN (visitante) --}}

                @guest
                    <a href="{{ route('login') }}"
                       class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/10 active:scale-[0.98]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                            <path d="m10 17 5-5-5-5"/>
                            <path d="M15 12H3"/>
                        </svg>
                        Entrar
                    </a>
                @endguest


                 @guest
                    <a href="{{ route('create') }}"
                       class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/10 active:scale-[0.98]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                            <path d="m10 17 5-5-5-5"/>
                            <path d="M15 12H3"/>
                        </svg>
                        Cadastrar
                    </a>
                @endguest


                {{-- LOGOUT + ADMIN (autenticado) --}}
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf

                        <button type="submit"
                                class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/10 active:scale-[0.98]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <path d="m16 17 5-5-5-5"/>
                                <path d="M21 12H9"/>
                            </svg>
                            Sair
                        </button>
                    </form>

                    <a href="{{ route('users.home') }}"
                       class="group inline-flex items-center gap-2 rounded-xl bg-slate-950 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-slate-950/20 transition duration-200 hover:bg-blue-600 hover:shadow-blue-600/25 focus:outline-none focus:ring-4 focus:ring-blue-500/30 active:scale-[0.98]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2 4 6v6c0 5 3.5 9 8 10 4.5-1 8-5 8-10V6z"/>
                        </svg>
                        Admin
                    </a>
                @endauth

            </nav>

            {{-- SEARCH --}}

            <form action="{{ route('search') }}" method="GET" class="flex w-full lg:w-auto">

                <div class="group/search relative flex-1 lg:w-72">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 transition duration-200 group-focus-within/search:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m21 21-4.3-4.3"/>
                        </svg>
                    </div>

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Pesquisar notícias..."
                           class="w-full rounded-l-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10">

                </div>

                <button type="submit"
                        class="group inline-flex items-center gap-2 rounded-r-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition duration-200 hover:bg-blue-700 hover:shadow-xl hover:shadow-blue-600/25 focus:outline-none focus:ring-4 focus:ring-blue-500/30 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                    <span class="hidden sm:inline">Buscar</span>
                </button>

            </form>

        

    </header>


    {{-- ==================== CONTEÚDO ==================== --}}
    <main>
        @yield('conteudo')
    </main>


</body>
</html>