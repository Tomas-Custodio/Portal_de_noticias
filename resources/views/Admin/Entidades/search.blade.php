@extends('Layouts/admin')

@section('title', 'Pesquisa de usuários')
@section('page_title', 'Pesquisa de usuários')

@section('conteudo')

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        <header class="mb-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-2 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-blue-600"></span>
                        <span class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            Administração
                        </span>
                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">
                        Pesquisar usuários
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Encontre utilizadores por nome ou email.
                    </p>

                </div>


                <a
                    href="{{ route('users.list_users') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition-all duration-200 hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/10 sm:w-auto"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"/>
                        <path d="m12 19-7-7 7-7"/>
                    </svg>
                    Voltar à lista
                </a>

            </div>

        </header>


        {{-- =========================================================
            FORM DE PESQUISA
        ========================================================== --}}
        <form
            action="{{ route('users.search') }}"
            method="Post"
            class="mb-8 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5"
        >

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                <div class="group/search relative flex-1">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 transition group-focus-within/search:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m21 21-4.3-4.3"/>
                        </svg>
                    </div>

                    <input
                        type="text"
                        name="search"
                        value="{{ $termo }}"
                        placeholder="Pesquisar por nome ou email..."
                        autocomplete="off"
                        autofocus
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-10 pr-4 text-sm text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                    >

                </div>


                <button
                    type="submit"
                    class="group inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition duration-200 hover:bg-blue-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500/30 active:scale-[0.98]"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                    Pesquisar
                </button>

            </div>

        </form>


        {{-- =========================================================
            CABEÇALHO DE RESULTADOS
        ========================================================== --}}
        @isset($resultado)

            <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h2 class="text-base font-bold text-slate-900 sm:text-lg">
                        Resultados
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">

                        {{ $resultado->total() }}
                        {{ $resultado->total() === 1 ? 'resultado' : 'resultados' }}
                        para "<span class="font-semibold text-blue-600">{{ $termo }}</span>"

                    </p>

                </div>


              

            </div>


            {{-- =========================================================
                TABELA DE RESULTADOS
            ========================================================== --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- DESKTOP --}}
                <div class="hidden overflow-x-auto md:block">

                    <table class="w-full min-w-[700px]">

                        <thead class="border-b border-slate-100 bg-slate-50/70">
                            <tr>
                                <th class="px-6 py-4 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                    Usuário
                                </th>
                                <th class="px-6 py-4 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                    Email
                                </th>
                                <th class="px-6 py-4 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                    Função
                                </th>
                                <th class="px-6 py-4 text-right text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                    Ações
                                </th>
                            </tr>
                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($resultado as $usuario)

                                @php
                                    $nome = $usuario->nome ?? $usuario->name ?? 'Sem nome';
                                    $role = strtolower($usuario->role ?? 'user');
                                @endphp

                                <tr class="group transition-colors duration-200 hover:bg-slate-50">

                                    {{-- USUÁRIO --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm font-bold text-blue-600 transition-colors group-hover:bg-blue-600 group-hover:text-white">
                                                {{ strtoupper(substr($nome, 0, 1)) }}
                                            </div>

                                            <div class="min-w-0">

                                                <p class="truncate text-sm font-semibold text-slate-800">
                                                    {{ $nome }}
                                                </p>

                                                <p class="text-[11px] text-slate-400">
                                                    #{{ $usuario->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- EMAIL --}}
                                    <td class="px-6 py-4 text-sm text-slate-500">
                                        {{ $usuario->email }}
                                    </td>


                                    {{-- FUNÇÃO --}}
                                    <td class="px-6 py-4">

                                        @if($role === 'admin')

                                            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Admin
                                            </span>

                                        @elseif($role === 'editor')

                                            <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-amber-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                                Editor
                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                                <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                                User
                                            </span>

                                        @endif

                                    </td>


                                    {{-- AÇÕES --}}
                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <a
                                                href="{{ route('users.edit', $usuario->id) }}"
                                                title="Editar usuário"
                                                class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-all hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/10"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 20h9"/>
                                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                                </svg>
                                            </a>


                                            <form
                                                action="{{ route('users.delete', $usuario->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Remover este usuário?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Eliminar usuário"
                                                    class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-all hover:border-red-200 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/10"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M3 6h18"/>
                                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                                    </svg>
                                                </button>
                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="px-6 py-20 text-center">

                                        <div class="mx-auto max-w-sm">

                                            <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="7"/>
                                                    <path d="m21 21-4.3-4.3"/>
                                                </svg>
                                            </div>

                                            <h3 class="text-lg font-bold text-slate-900">
                                                Sem resultados
                                            </h3>

                                            <p class="mt-2 text-sm text-slate-500">
                                                Não encontrámos utilizadores com
                                                "<span class="font-semibold text-blue-600">{{ $termo }}</span>".
                                            </p>

                                            <a
                                                href="{{ route('users.search') }}"
                                                class="mt-5 inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M19 12H5"/>
                                                    <path d="m12 19-7-7 7-7"/>
                                                </svg>
                                                Limpar pesquisa
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- MOBILE --}}
                <div class="divide-y divide-slate-100 md:hidden">

                    @forelse($resultado as $usuario)

                        @php
                            $nome = $usuario->nome ?? $usuario->name ?? 'Sem nome';
                            $role = strtolower($usuario->role ?? 'user');
                        @endphp

                        <div class="p-5 transition-colors hover:bg-slate-50">

                            <div class="flex items-center gap-3">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm font-bold text-blue-600">
                                    {{ strtoupper(substr($nome, 0, 1)) }}
                                </div>

                                <div class="min-w-0 flex-1">

                                    <p class="truncate text-sm font-semibold text-slate-800">
                                        {{ $nome }}
                                    </p>

                                    <p class="truncate text-xs text-slate-400">
                                        {{ $usuario->email }}
                                    </p>

                                </div>

                            </div>


                            <div class="mt-4 flex flex-wrap items-center justify-between gap-3">

                                @if($role === 'admin')

                                    <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                        Admin
                                    </span>

                                @elseif($role === 'editor')

                                    <span class="rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-amber-700">
                                        Editor
                                    </span>

                                @else

                                    <span class="rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                        User
                                    </span>

                                @endif


                                <div class="flex gap-2">

                                    <a
                                        href="{{ route('users.edit', $usuario->id) }}"
                                        class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 20h9"/>
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                        </svg>
                                        Editar
                                    </a>


                                    <form
                                        action="{{ route('users.delete', $usuario->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Remover este usuário?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-xl border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M3 6h18"/>
                                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                            </svg>
                                            Eliminar
                                        </button>
                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="px-5 py-12 text-center text-sm text-slate-500">

                            <p class="font-semibold text-slate-700">
                                Sem resultados para "<span class="text-blue-600">{{ $termo }}</span>"
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Tenta pesquisar por outro termo.
                            </p>

                            <a
                                href="{{ route('users.search') }}"
                                class="mt-5 inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600"
                            >
                                Limpar pesquisa
                            </a>

                        </div>

                    @endforelse

                </div>


                {{-- PAGINAÇÃO --}}
                @if($resultado->hasPages())

                    <div class="border-t border-slate-100 px-5 py-5 sm:px-6">
                        {{ $resultado->links() }}
                    </div>

                @endif

            </section>

        @else

            {{-- =========================================================
                ESTADO VAZIO (SEM PESQUISA)
            ========================================================== --}}
            <section class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center shadow-sm">

                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-900">
                    Começa a pesquisar
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                    Escreve um nome ou email no campo acima
                    para encontrar utilizadores no sistema.
                </p>

            </section>

        @endisset

    </div>

</div>

@endsection