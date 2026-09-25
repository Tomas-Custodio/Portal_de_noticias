@extends('Layouts/admin')

@section('title', 'Usuários')

@section('page_title', 'Usuários')

@section('conteudo')

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        
        <header class="mb-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                {{-- TÍTULO --}}
                <div>

                    <div class="mb-2 flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-orange-500"></span>

                        <span class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            Administração
                        </span>

                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">
                        Usuários
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Gerencie os usuários do sistema.
                    </p>

                </div>


                {{-- AÇÕES --}}

                <div class="flex w-full flex-col gap-2 sm:w-auto sm:flex-row">


                    {{-- NOVO USUÁRIO --}}
                    <a
                        href="{{ route('users.create') }}"
                        class="group flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-orange-500/20 transition-all duration-200 hover:bg-orange-600 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-500/20 sm:w-auto"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>
                        </svg>

                        Novo usuário

                    </a>

                </div>

            </div>

        </header>

        {{-- =========================================================
            MENSAGEM
        ========================================================== --}}

        @if(session('msg'))

            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-emerald-900">
                            Operação realizada
                        </p>

                        <p class="text-sm text-emerald-700">
                            {{ session('msg') }}
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================================================
            3 CARDS
        ========================================================== --}}
        <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">


            {{-- TOTAL --}}

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Total usuários
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $usuarios->count() }}
                        </p>

                    </div>


                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-orange-500">

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
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>

                    </div>

                </div>

            </div>


            {{-- ADMINISTRADORES --}}

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Administradores
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $administradores }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-500">

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
                            <path d="M12 2 4 6v6c0 5 3.5 9 8 10 4.5-1 8-5 8-10V6z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>

                    </div>

                </div>

            </div>


            {{-- EDITORES --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md sm:p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Editores
                        </p>

                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            {{ $editores }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-500">

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
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                        </svg>

                    </div>

                </div>

            </div>

        </div>



        {{-- =========================================================
            LISTA DE USUÁRIOS
        ========================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


            {{-- CABEÇALHO DA LISTA --}}
            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h2 class="text-base font-bold text-slate-900 sm:text-lg">
                            Todos os usuários
                        </h2>

                        <p class="mt-1 text-xs text-slate-400">
                            Usuários registados no sistema
                        </p>

                    </div>


                    <span class="w-fit rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-500">

                  

                    </span>

                </div>

            </div>



            {{-- =====================================================
                DESKTOP
            ====================================================== --}}
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

                        @forelse($usuarios as $usuario)

                            @php

                                $nome = $usuario->nome ?? $usuario->name ?? 'Sem nome';

                                $role = strtolower($usuario->role ?? 'user');

                            @endphp

                            <tr class="group transition-colors duration-200 hover:bg-slate-50">


                                {{-- USUÁRIO --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-orange-50 text-sm font-bold text-orange-600 transition-colors group-hover:bg-orange-500 group-hover:text-white">

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

                                        <span class="inline-flex items-center gap-2 rounded-full bg-orange-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-orange-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>

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


                                        {{-- EDITAR --}}
                                        <a
                                            href="{{ route('users.edit', $usuario->id) }}"
                                            title="Editar usuário"
                                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-all hover:border-orange-200 hover:bg-orange-50 hover:text-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-500/10"
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
                                                <path d="M12 20h9"/>
                                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                            </svg>

                                        </a>


                                        {{-- ELIMINAR --}}
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

                                <td
                                    colspan="4"
                                    class="px-6 py-16 text-center text-sm text-slate-500"
                                >
                                    Nenhum usuário registado.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>



            {{-- =====================================================
                MOBILE
            ====================================================== --}}
            <div class="divide-y divide-slate-100 md:hidden">

                @forelse($usuarios as $usuario)

                    @php

                        $nome = $usuario->nome ?? $usuario->name ?? 'Sem nome';

                        $role = strtolower($usuario->role ?? 'user');

                    @endphp


                    <div class="p-5 transition-colors hover:bg-slate-50">

                        {{-- USUÁRIO --}}
                        <div class="flex items-center gap-3">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-orange-50 text-sm font-bold text-orange-600">

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


                        {{-- FUNÇÃO + AÇÕES --}}
                        <div class="mt-4 flex flex-wrap items-center justify-between gap-3">


                            @if($role === 'admin')

                                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                    Admin
                                </span>

                            @elseif($role === 'editor')

                                <span class="rounded-full bg-orange-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-orange-700">
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
                                    class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:border-orange-200 hover:bg-orange-50 hover:text-orange-600"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
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

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-3.5 w-3.5"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
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
                        Nenhum usuário registado.
                    </div>

                @endforelse

            </div>



            {{-- =====================================================
                PAGINAÇÃO
            ====================================================== --}}
            @if($usuarios->hasPages())

                <div class="border-t border-slate-100 px-5 py-5 sm:px-6">

                    {{ $usuarios->links() }}

                </div>

            @endif

        </section>

    </div>

</div>

@endsection