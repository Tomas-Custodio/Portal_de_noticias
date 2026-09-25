@extends('Layouts/form')

@section("conteudo")

<body class="min-h-screen bg-slate-950 text-white">

    {{-- Header --}}
    <header class="absolute top-0 left-0 w-full px-6 py-6">
        <div class="mx-auto max-w-7xl flex items-center justify-between">

            <a href="/" class="text-xl font-bold tracking-tight">
                PortalNotice
            </a>

            <span class="text-sm text-slate-400">
                Área segura
            </span>

        </div>
    </header>


    {{-- Conteúdo principal --}}
    <main class="min-h-screen flex items-center justify-center px-4 py-24">

        <section class="w-full max-w-md">

            {{-- Cabeçalho --}}
            <div class="text-center mb-8">

                <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center
                            rounded-2xl bg-indigo-500/10 ring-1 ring-indigo-400/20">

                    <svg
                        class="h-7 w-7 text-indigo-400"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"
                        />
                        <circle cx="9" cy="7" r="4" />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 8v6M22 11h-6"
                        />
                    </svg>

                </div>

                <h2 class="text-3xl font-bold tracking-tight">
                    Criar conta
                </h2>

                <p class="mt-2 text-sm text-slate-400">
                    Registe-se para começar a usar o sistema.
                </p>

            </div>


            {{-- Mensagem da sessão --}}

            @if (session('msg'))

                <div
                    class="mb-6 flex items-center gap-3 rounded-xl border
                           border-emerald-400/20 bg-emerald-400/10
                           px-4 py-3 text-sm text-emerald-300"
                >

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                    <p>{{ session('msg') }}</p>

                </div>

            @endif


            {{-- Erros de validação --}}

            @if ($errors->any())

                <div
                    class="mb-6 rounded-xl border border-red-400/20
                           bg-red-400/10 px-4 py-3"
                >

                    <p class="text-sm font-semibold text-red-300">
                        Não foi possível criar a conta
                    </p>

                    <ul class="mt-2 space-y-1">

                        @foreach ($errors->all() as $error)

                            <li class="text-xs text-red-300">
                                • {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Card do formulário --}}

            <div
                class="rounded-3xl border border-white/10
                        bg-white/[0.04] p-6 shadow-2xl
                       shadow-black/20 backdrop-blur-xl sm:p-8"
            >

                <form action="{{ route('save') }}" method="POST" class="space-y-5">

                    @csrf

                    {{-- Role (hidden) --}}
                    <input type="hidden" name="role" value="user">


                    {{-- Nome --}}
                    
                    <div>

                        <label
                            for="nome"
                            class="mb-2 block text-sm font-medium text-slate-200"
                        >
                            Nome completo
                        </label>

                        <div class="relative">

                            <div
                                class="pointer-events-none absolute inset-y-0 left-0
                                       flex items-center pl-4 text-slate-500"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 7a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4 21a8 8 0 0116 0"
                                    />
                                </svg>
                            </div>

                            <input
                                id="nome"
                                type="text"
                                name="nome"
                                value="{{ old('nome') }}"
                                autocomplete="name"
                                placeholder="Digite seu nome"
                                class="w-full rounded-xl border border-white/10
                                       bg-slate-900/70 py-3.5 pl-12 pr-4
                                       text-sm text-white placeholder-slate-500
                                       outline-none transition
                                       focus:border-indigo-400
                                       focus:ring-4 focus:ring-indigo-500/10"
                            >

                        </div>

                    </div>


                    {{-- Email --}}

                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-slate-200"
                        >
                            Email
                        </label>

                        <div class="relative">

                            <div
                                class="pointer-events-none absolute inset-y-0 left-0
                                       flex items-center pl-4 text-slate-500"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    viewBox="0 0 24 24"
                                >
                                    <rect
                                        width="20"
                                        height="16"
                                        x="2"
                                        y="4"
                                        rx="2"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"
                                    />
                                </svg>
                            </div>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                placeholder="Digite seu email"
                                class="w-full rounded-xl border border-white/10
                                       bg-slate-900/70 py-3.5 pl-12 pr-4
                                       text-sm text-white placeholder-slate-500
                                       outline-none transition
                                       focus:border-indigo-400
                                       focus:ring-4 focus:ring-indigo-500/10"
                            >

                        </div>

                    </div>


                    {{-- Password --}}
                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-sm font-medium text-slate-200"
                        >
                            Palavra-passe
                        </label>

                        <div class="relative">

                            <div
                                class="pointer-events-none absolute inset-y-0 left-0
                                       flex items-center pl-4 text-slate-500"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    viewBox="0 0 24 24"
                                >
                                    <rect
                                        width="16"
                                        height="12"
                                        x="4"
                                        y="10"
                                        rx="2"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8 10V7a4 4 0 018 0v3"
                                    />
                                </svg>
                            </div>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                autocomplete="new-password"
                                placeholder="Mínimo 8 caracteres"
                                class="w-full rounded-xl border border-white/10
                                       bg-slate-900/70 py-3.5 pl-12 pr-4
                                       text-sm text-white placeholder-slate-500
                                       outline-none transition
                                       focus:border-indigo-400
                                       focus:ring-4 focus:ring-indigo-500/10"
                            >

                        </div>

                    </div>


                    {{-- Botão --}}

                    <button
                        type="submit"
                        class="group w-full rounded-xl bg-indigo-500
                               px-4 py-3.5 text-sm font-semibold text-white
                               shadow-lg shadow-indigo-500/20
                               transition duration-200
                               hover:bg-indigo-400
                               hover:shadow-indigo-500/30
                               active:scale-[0.98]"
                    >

                        <span class="flex items-center justify-center gap-2">

                            Criar conta

                            <svg
                                class="h-4 w-4 transition-transform
                                       group-hover:translate-x-1"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h14"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13 6l6 6-6 6"
                                />
                            </svg>

                        </span>

                    </button>

                </form>


                {{-- Link para login --}}
                <div class="my-6 flex items-center gap-4">

                    <div class="h-px flex-1 bg-white/10"></div>

                    <span class="text-xs text-slate-500">
                        já tem conta?
                    </span>

                    <div class="h-px flex-1 bg-white/10"></div>

                </div>


                <a
                    href="{{ route('login') }}"
                    class="group flex w-full items-center justify-center gap-2
                           rounded-xl border border-white/10
                           bg-white/[0.02] px-4 py-3.5
                           text-sm font-semibold text-slate-300
                           transition duration-200
                           hover:border-indigo-400/40
                           hover:bg-indigo-500/10
                           hover:text-white
                           active:scale-[0.98]"
                >

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m10 17 5-5-5-5"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 12H3"
                        />
                    </svg>

                    Entrar na minha conta

                </a>

            </div>


            {{-- Rodapé --}}
            <p class="mt-6 text-center text-xs text-slate-600">
                © {{ date('Y') }} PortalNotice. Todos os direitos reservados.
            </p>

        </section>

    </main>

</body>

@endsection