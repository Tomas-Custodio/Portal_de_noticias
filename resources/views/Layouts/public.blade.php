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
                class="group relative inline-flex items-center gap-2 text-sm font-medium transition hover:text-blue-600
                        {{ request()->routeIs('home') ? 'font-bold text-blue-600' : 'text-slate-600' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:-translate-y-0.5 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>

                    Início

                    <span class="absolute -bottom-1 left-0 h-0.5 w-full origin-left rounded-full bg-blue-600 transition-transform duration-300
                                {{ request()->routeIs('home') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
                    </span>
                </a>


                {{-- NOTÍCIAS --}}
                <a href="{{ route('noticias') }}"
                class="group relative inline-flex items-center gap-2 text-sm font-medium transition hover:text-blue-600
                        {{ request()->routeIs('noticias') ? 'font-bold text-blue-600' : 'text-slate-600' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:-translate-y-0.5 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
                        <path d="M18 14h-8"/>
                        <path d="M15 18h-5"/>
                        <path d="M10 6h8v4h-8V6Z"/>
                    </svg>

                    Notícias

                    <span class="absolute -bottom-1 left-0 h-0.5 w-full origin-left rounded-full bg-blue-600 transition-transform duration-300
                                {{ request()->routeIs('noticias') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
                    </span>
                </a>


                {{-- CATEGORIAS --}}
                <a href="{{ route('categorias') }}"
                class="group relative inline-flex items-center gap-2 text-sm font-medium transition hover:text-blue-600
                        {{ request()->routeIs('categorias') ? 'font-bold text-blue-600' : 'text-slate-600' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:-translate-y-0.5 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 5H2v7l6.29 6.29c.94.94 2.48.94 3.42 0l3.58-3.58c.94-.94.94-2.48 0-3.42L9 5Z"/>
                        <path d="M6 9.01V9"/>
                        <path d="m15 5 6.3 6.3a2.4 2.4 0 0 1 0 3.4L17 19"/>
                    </svg>

                    Categorias

                    <span class="absolute -bottom-1 left-0 h-0.5 w-full origin-left rounded-full bg-blue-600 transition-transform duration-300
                                {{ request()->routeIs('categorias') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
                    </span>
                </a>


                {{-- LOGIN --}}
                @guest
                    <a href="{{ route('login') }}"
                    class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/10 active:scale-[0.98]">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                            <polyline points="10 17 15 12 10 7"/>
                            <line x1="15" x2="3" y1="12" y2="12"/>
                        </svg>

                        Entrar
                    </a>
                @endguest


                {{-- CADASTRAR --}}
                @guest
                    <a href="{{ route('create') }}"
                    class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/10 active:scale-[0.98]">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <line x1="19" x2="19" y1="8" y2="14"/>
                            <line x1="22" x2="16" y1="11" y2="11"/>
                        </svg>

                        Cadastrar
                    </a>
                @endguest


                {{-- LOGOUT + ADMIN --}}
                @auth

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf

                        <button type="submit"
                                class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition duration-200 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/10 active:scale-[0.98]">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200 group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <polyline points="16 17 21 12 16 7"/>
                                <line x1="21" x2="9" y1="12" y2="12"/>
                            </svg>

                            Sair
                        </button>
                    </form>


                    <a href="{{ route('users.home') }}"
                    class="group inline-flex items-center gap-2 rounded-xl bg-slate-950 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-slate-950/20 transition duration-200 hover:bg-blue-600 hover:shadow-blue-600/25 focus:outline-none focus:ring-4 focus:ring-blue-500/30 active:scale-[0.98]">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                            <path d="m9 12 2 2 4-4"/>
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