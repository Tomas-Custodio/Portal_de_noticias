<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Painel')</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        html, body { overflow-x: hidden; max-width: 100%; }
    </style>
</head>

<body class="antialiased bg-slate-50 text-slate-900">


    <div class="flex min-h-screen bg-slate-50">


        {{-- ==================== OVERLAY MOBILE ==================== --}}
        {{-- Fundo escuro que aparece quando a sidebar abre em mobile --}}
        <div
            id="sidebar-overlay"
            onclick="toggleSidebar()"
            class="fixed inset-0 z-40 hidden bg-slate-950/50 backdrop-blur-sm lg:hidden"
        ></div>


        {{-- ==================== SIDEBAR ==================== --}}
        <aside
            id="sidebar"
            class="fixed inset-y-0 left-0 z-50 flex w-72 shrink-0 -translate-x-full flex-col border-r border-slate-200 bg-white transition-transform duration-300 ease-in-out
                   lg:sticky lg:top-0 lg:h-screen lg:w-64 lg:translate-x-0 lg:bg-white/80 lg:backdrop-blur-xl"
        >

            {{-- LOGO / HOME --}}
            <div class="flex items-center justify-between gap-3 px-5 py-6">

                <div class="flex items-center gap-3">

                    <a href="{{ route('home') }}">
                        <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 3l1.9 5.8H20l-4.9 3.6 1.9 5.8L12 14.6 7 18.2l1.9-5.8L4 8.8h6.1z"/>
                            </svg>
                        </div>
                    </a>

                    <span class="text-lg font-bold tracking-tight text-slate-900">
                        Painel
                    </span>

                </div>


                {{-- BOTÃO FECHAR (só em mobile) --}}
                <button
                    type="button"
                    onclick="toggleSidebar()"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-500 transition hover:bg-slate-100 lg:hidden"
                    aria-label="Fechar menu"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/>
                        <path d="m6 6 12 12"/>
                    </svg>
                </button>

            </div>


            {{-- NAV --}}
            <nav class="flex-1 space-y-1 overflow-y-auto px-3 pb-6">

                {{-- DASHBOARD --}}
                <a
                    href=""
                    class="group relative flex items-center gap-4 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition-all duration-300 hover:bg-indigo-50 hover:text-indigo-600 hover:shadow-sm focus:bg-indigo-50 focus:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/30
                        {{ request()->routeIs('dashboard') ? 'bg-indigo-50 font-semibold text-indigo-600 shadow-sm' : '' }}"
                >
                    <span class="absolute left-0 top-1/2 h-0 w-1 -translate-y-1/2 rounded-r-full bg-indigo-600 transition-all duration-300 group-hover:h-6 {{ request()->routeIs('dashboard') ? 'h-6' : '' }}"></span>

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition-all duration-300 group-hover:bg-indigo-600 group-hover:text-white group-hover:scale-110 {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="9" rx="1.5"/>
                            <rect x="14" y="3" width="7" height="5" rx="1.5"/>
                            <rect x="14" y="12" width="7" height="9" rx="1.5"/>
                            <rect x="3" y="16" width="7" height="5" rx="1.5"/>
                        </svg>
                    </span>

                    <span class="tracking-tight">Dashboard</span>
                </a>


                {{-- NOTÍCIAS --}}
                <a
                    href="{{ route('noticias.home') }}"
                    class="group relative flex items-center gap-4 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition-all duration-300 hover:bg-indigo-50 hover:text-indigo-600 hover:shadow-sm focus:bg-indigo-50 focus:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/30
                        {{ request()->routeIs('noticias.*') ? 'bg-indigo-50 font-semibold text-indigo-600 shadow-sm' : '' }}"
                >
                    <span class="absolute left-0 top-1/2 h-0 w-1 -translate-y-1/2 rounded-r-full bg-indigo-600 transition-all duration-300 group-hover:h-6 {{ request()->routeIs('noticias.*') ? 'h-6' : '' }}"></span>

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition-all duration-300 group-hover:bg-indigo-600 group-hover:text-white group-hover:scale-110 {{ request()->routeIs('noticias.*') ? 'bg-indigo-600 text-white' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h13a2 2 0 0 1 2 2v12a2 2 0 0 0 2 2H6a2 2 0 0 1-2-2z"/>
                            <path d="M19 6h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"/>
                            <path d="M8 8h7"/>
                            <path d="M8 12h7"/>
                            <path d="M8 16h4"/>
                        </svg>
                    </span>

                    <span class="tracking-tight">Notícias</span>
                </a>


                {{-- CATEGORIAS --}}
                <a
                    href="{{ route('categorias.home') }}"
                    class="group relative flex items-center gap-4 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition-all duration-300 hover:bg-indigo-50 hover:text-indigo-600 hover:shadow-sm focus:bg-indigo-50 focus:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/30
                        {{ request()->routeIs('categorias.*') ? 'bg-indigo-50 font-semibold text-indigo-600 shadow-sm' : '' }}"
                >
                    <span class="absolute left-0 top-1/2 h-0 w-1 -translate-y-1/2 rounded-r-full bg-indigo-600 transition-all duration-300 group-hover:h-6 {{ request()->routeIs('categorias.*') ? 'h-6' : '' }}"></span>

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition-all duration-300 group-hover:bg-indigo-600 group-hover:text-white group-hover:scale-110 {{ request()->routeIs('categorias.*') ? 'bg-indigo-600 text-white' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6a2 2 0 0 1 2-2h3l2 2h9a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                    </span>

                    <span class="tracking-tight">Categorias</span>
                </a>


                {{-- DIVIDER --}}
                <div class="my-3 border-t border-slate-100"></div>


                {{-- USUÁRIOS --}}
                <a
                    href="{{ route('users.home') }}"
                    class="group relative flex items-center gap-4 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition-all duration-300 hover:bg-indigo-50 hover:text-indigo-600 hover:shadow-sm focus:bg-indigo-50 focus:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/30
                        {{ request()->routeIs('users.*') ? 'bg-indigo-50 font-semibold text-indigo-600 shadow-sm' : '' }}"
                >
                    <span class="absolute left-0 top-1/2 h-0 w-1 -translate-y-1/2 rounded-r-full bg-indigo-600 transition-all duration-300 group-hover:h-6 {{ request()->routeIs('users.*') ? 'h-6' : '' }}"></span>

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition-all duration-300 group-hover:bg-indigo-600 group-hover:text-white group-hover:scale-110 {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </span>

                    <span class="tracking-tight">Usuários</span>
                </a>

            </nav>


            {{-- RODAPÉ SIDEBAR — LOGOUT --}}
            <div class="border-t border-slate-100 p-4">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        class="group flex w-full items-center gap-3 rounded-2xl border border-red-100 bg-white px-4 py-3 text-sm font-semibold text-red-600 shadow-sm transition-all duration-300 hover:border-red-200 hover:bg-red-50 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500/30 active:scale-[0.98]"
                    >
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-50 text-red-500 transition duration-300 group-hover:bg-red-600 group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <path d="m16 17 5-5-5-5"/>
                                <path d="M21 12H9"/>
                            </svg>
                        </span>

                        <span class="tracking-tight">Sair</span>
                    </button>

                </form>

            </div>

        </aside>


        {{-- ==================== CONTEÚDO ==================== --}}
        <div class="flex min-w-0 flex-1 flex-col">


            {{-- TOPBAR MOBILE (barra com botão hamburguer) --}}
            <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur-xl lg:hidden">

                <div class="flex items-center justify-between px-4 py-3">

                    <a href="{{ route('home') }}" class="group shrink-0">
                        <h1 class="text-lg font-black tracking-tighter text-slate-950">
                            Painel<span class="text-indigo-600">Admin</span>
                        </h1>
                    </a>


                    <button
                        type="button"
                        onclick="toggleSidebar()"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:bg-slate-50 active:scale-95"
                        aria-label="Abrir menu"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" x2="20" y1="12" y2="12"/>
                            <line x1="4" x2="20" y1="6" y2="6"/>
                            <line x1="4" x2="20" y1="18" y2="18"/>
                        </svg>
                    </button>

                </div>

            </header>


            {{-- MAIN --}}
            <main class="min-w-0 flex-1 overflow-x-hidden">
                @yield('conteudo')
            </main>

        </div>

    </div>


    {{-- ==================== SCRIPT TOGGLE SIDEBAR ==================== --}}
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>

</body>

</html>