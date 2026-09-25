@extends('Layouts/admin')

@section('title', 'Lista de Usuários')
@section('page_title', 'Usuários')

@section('conteudo')

<div class="mx-auto max-w-7xl">

    {{-- HEADER --}}
    <div class="mb-8">

        <div class="mb-5 flex items-center gap-2 text-sm">

            <a
                href="{{ route('users.home') }}"
                class="font-medium text-slate-400 hover:text-indigo-600"
            >
                Usuários
            </a>

            <span class="text-slate-300">
                /
            </span>

            <span class="font-medium text-slate-600">
                Lista
            </span>

        </div>


        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

            <div>

                <div class="mb-3 flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-xl text-white"
                    >
                        👥
                    </div>

                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-indigo-600">
                        Usuários
                    </span>

                </div>


                <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Usuários cadastrados
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Consulte e gerencie os usuários do sistema.
                </p>

            </div>


            <a
                href="{{ route('users.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700"
            >
                +
                Novo usuário
            </a>

        </div>

    </div>


    {{-- MESSAGE --}}
    @if(session('msg'))

        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

            <p class="text-sm font-semibold text-emerald-900">
                Operação realizada
            </p>

            <p class="mt-1 whitespace-pre-line text-sm text-emerald-700">
                {{ session('msg') }}
            </p>

        </div>

    @endif


    {{-- TABLE --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-col justify-between gap-4 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:px-8">

            <div>

                <h2 class="font-bold text-slate-900">
                    Todos os usuários
                </h2>

                <p class="mt-1 text-xs text-slate-400">
                    {{ $list_users->total() }} usuário(s) cadastrado(s).
                </p>

            </div>

            <div class="rounded-xl bg-slate-50 px-3 py-2 text-xs font-medium text-slate-500">
                {{ $list_users->firstItem() ?? 0 }}
                -
                {{ $list_users->lastItem() ?? 0 }}
                de
                {{ $list_users->total() }}
            </div>

        </div>


        @if($list_users->count())

            <div class="hidden overflow-x-auto md:block">

                <table class="w-full">

                    <thead>

                        <tr class="border-b border-slate-100 bg-slate-50/70">

                            <th class="px-8 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400">
                                Usuário
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400">
                                Função
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400">
                                ID
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-400">
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @foreach($list_users as $user)

                            <tr class="group transition hover:bg-slate-50/70">

                                <td class="px-8 py-5">

                                    <div class="flex items-center gap-4">

                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 font-bold text-indigo-600">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>


                                        <div class="min-w-0">

                                            <p class="font-semibold text-slate-800">
                                                {{ $user->name }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-slate-400">
                                                {{ $user->email }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <td class="px-6 py-5">

                                    <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold capitalize text-slate-600">
                                        {{ $user->role }}
                                    </span>

                                </td>


                                <td class="px-6 py-5">

                                    <span class="rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-bold text-slate-500">
                                        #{{ $user->id }}
                                    </span>

                                </td>


                                <td class="px-6 py-5">

                                    <div class="flex justify-end gap-2">

                                        <a
                                            href="{{ route('users.edit', $user->id) }}"
                                            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-3.5 py-2 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                                        >
                                            ✎
                                            Editar
                                        </a>


                                        <form
                                            action="{{ route('users.delete', $user->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-2 rounded-xl border border-red-100 px-3.5 py-2 text-xs font-semibold text-red-500 transition hover:border-red-200 hover:bg-red-50"
                                            >
                                                ×
                                                Excluir
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- MOBILE --}}
            <div class="divide-y divide-slate-100 md:hidden">

                @foreach($list_users as $user)

                    <div class="p-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 font-bold text-indigo-600">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>


                            <div class="min-w-0">

                                <p class="truncate font-semibold text-slate-800">
                                    {{ $user->name }}
                                </p>

                                <p class="truncate text-xs text-slate-400">
                                    {{ $user->email }}
                                </p>

                            </div>

                        </div>


                        <div class="mt-4 flex items-center justify-between">

                            <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold capitalize text-slate-600">
                                {{ $user->role }}
                            </span>

                            <span class="text-xs text-slate-400">
                                #{{ $user->id }}
                            </span>

                        </div>


                        <div class="mt-4 grid grid-cols-2 gap-2">

                            <a
                                href="{{ route('users.edit', $user->id) }}"
                                class="inline-flex justify-center rounded-xl border border-slate-200 px-3 py-2.5 text-xs font-semibold text-slate-600"
                            >
                                ✎ Editar
                            </a>


                            <form
                                action="{{ route('users.delete', $user->id) }}"
                                method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full rounded-xl border border-red-100 px-3 py-2.5 text-xs font-semibold text-red-500"
                                >
                                    × Excluir
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- PAGINATION --}}
            <div class="border-t border-slate-100 px-6 py-5 sm:px-8">

                {{ $list_users->links() }}

            </div>

        @else

            {{-- EMPTY --}}
            <div class="px-6 py-20 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-slate-100 text-2xl text-slate-400">
                    👤
                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900">
                    Nenhum usuário encontrado
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-400">
                    Ainda não existem usuários cadastrados no sistema.
                </p>

                <a
                    href="{{ route('users.create') }}"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white"
                >
                    +
                    Criar usuário
                </a>

            </div>

        @endif

    </div>

</div>

@endsection