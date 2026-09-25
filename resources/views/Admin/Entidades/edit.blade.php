@extends('Layouts/admin')

@section('title', 'Editar Usuário')
@section('page_title', 'Editar Usuário')

@section('conteudo')

<div class="mx-auto max-w-5xl">

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

            <a
                href="{{ route('users.list_users') }}"
                class="font-medium text-slate-400 hover:text-indigo-600"
            >
                Lista
            </a>

            <span class="text-slate-300">
                /
            </span>

            <span class="font-medium text-slate-600">
                Editar
            </span>

        </div>


        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

            <div>

                <div class="mb-3 flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg">
                        ✎
                    </div>

                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-indigo-600">
                        Editar usuário
                    </span>

                </div>


                <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Editar usuário
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Atualize as informações da conta selecionada.
                </p>

            </div>


            <a
                href="{{ route('users.list_users') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50"
            >
                ← Voltar
            </a>

        </div>

    </div>


    {{-- MESSAGE --}}
    @if(session('msg'))

        <div class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 p-4">

            <p class="text-sm font-semibold text-amber-900">
                Atenção
            </p>

            <p class="mt-1 whitespace-pre-line text-sm text-amber-700">
                {{ session('msg') }}
            </p>

        </div>

    @endif


    {{-- ERRORS --}}
    @if($errors->any())

        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">

            <p class="text-sm font-bold text-red-800">
                Não foi possível atualizar o usuário
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


    <div class="grid gap-6 lg:grid-cols-[1fr_300px]">


        {{-- FORM --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5 sm:px-8">

                <h2 class="font-bold text-slate-900">
                    Informações do usuário
                </h2>

                <p class="mt-1 text-xs text-slate-400">
                    Altere somente as informações necessárias.
                </p>

            </div>


            <form
                action="{{ route('users.update', $user_found->id) }}"
                method="POST"
                class="p-6 sm:p-8"
            >

                @csrf

                @method('PUT')


                <div class="grid gap-6 md:grid-cols-2">


                    {{-- NAME --}}
                    <div>

                        <label
                            for="nome"
                            class="mb-2 block text-sm font-semibold text-slate-800"
                        >
                            Nome
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            value="{{ old('nome', $user_found->name) }}"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-900 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                        >

                        @error('name')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- EMAIL --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-slate-800"
                        >
                            Email
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $user_found->email) }}"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-900 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                        >

                        @error('email')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- ROLE --}}
                    <div>

                        <label
                            for="role"
                            class="mb-2 block text-sm font-semibold text-slate-800"
                        >
                            Função
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="role"
                            name="role"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-900 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                        >

                            <option value="admin" @selected(old('role', $user_found->role) === 'admin')>
                                Administrador
                            </option>

                            <option value="editor" @selected(old('role', $user_found->role) === 'editor')>
                                Editor
                            </option>

                            <option value="user" @selected(old('role', $user_found->role) === 'user')>
                                Usuário
                            </option>

                        </select>

                        @error('role')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- PASSWORD --}}
                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-sm font-semibold text-slate-800"
                        >
                            Nova palavra-passe
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Deixe vazio para manter a atual"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-900 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                        >

                        <p class="mt-2 text-xs text-slate-400">
                            Preencha somente se quiser alterar a palavra-passe.
                        </p>

                        @error('password')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                <div class="my-8 border-t border-slate-100"></div>


                <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('users.list_users') }}"
                        class="inline-flex justify-center rounded-xl px-5 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-100"
                    >
                        Cancelar
                    </a>


                    <button
                        type="submit"
                        class="inline-flex justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700"
                    >
                        Salvar alterações
                        →
                    </button>

                </div>

            </form>

        </div>


        {{-- SIDE --}}
        <aside>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-4">

                    <p class="text-xs font-bold uppercase tracking-widest text-slate-400">
                        Usuário atual
                    </p>

                </div>


                <div class="p-5">

                    <div class="flex items-center gap-3 rounded-2xl bg-slate-50 p-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 font-bold text-indigo-600">
                            {{ strtoupper(substr($user_found->name, 0, 1)) }}
                        </div>


                        <div class="min-w-0">

                            <p class="truncate font-bold text-slate-800">
                                {{ $user_found->name }}
                            </p>

                            <p class="truncate text-xs text-slate-400">
                                {{ $user_found->email }}
                            </p>

                        </div>

                    </div>


                    <div class="mt-4 flex items-center justify-between">

                        <span class="text-xs text-slate-400">
                            ID
                        </span>

                        <span class="text-xs font-bold text-slate-600">
                            #{{ $user_found->id }}
                        </span>

                    </div>


                    <div class="mt-3 flex items-center justify-between">

                        <span class="text-xs text-slate-400">
                            Função
                        </span>

                        <span class="rounded-lg bg-indigo-50 px-2.5 py-1 text-xs font-bold capitalize text-indigo-600">
                            {{ $user_found->role }}
                        </span>

                    </div>

                </div>

            </div>

        </aside>

    </div>

</div>

@endsection