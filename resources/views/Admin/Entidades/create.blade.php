@extends('Layouts/admin')

@section('title', 'Novo Usuário')
@section('page_title', 'Novo Usuário')

@section('conteudo')

<div class="mx-auto max-w-5xl">

    {{-- HEADER --}}
    <div class="mb-8">

        <div class="mb-5 flex items-center gap-2 text-sm">

            <a
                href="{{ route('users.home') }}"
                class="font-medium text-slate-400 transition hover:text-indigo-600"
            >
                Usuários
            </a>

            <span class="text-slate-300">
                /
            </span>

            <span class="font-medium text-slate-600">
                Novo usuário
            </span>

        </div>


        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

            <div>

                <div class="mb-3 flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-xl text-white shadow-lg"
                    >
                        +
                    </div>

                    <span
                        class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-indigo-600"
                    >
                        Novo usuário
                    </span>

                </div>


                <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Criar usuário
                </h1>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Cadastre um novo usuário no sistema.
                </p>

            </div>


            <a
                href="{{ route('users.list_users') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50"
            >
                ← Ver usuários
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
                Existem erros no formulário
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


    {{-- FORM --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-6 py-5 sm:px-8">

            <h2 class="font-bold text-slate-900">
                Informações do usuário
            </h2>

            <p class="mt-1 text-xs text-slate-400">
                Preencha os dados da nova conta.
            </p>

        </div>


        <form
            action="{{ route('users.save') }}"
            method="POST"
            class="p-6 sm:p-8"
        >

            @csrf


            <div class="grid gap-6 md:grid-cols-2">


                {{-- NOME --}}
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
                        value="{{ old('nome') }}"
                        autofocus
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
                        value="{{ old('email') }}"
                        placeholder="usuario@email.com"
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

                        <option value="">
                            Selecionar função
                        </option>

                        <option value="admin" @selected(old('role') === 'admin')>
                            Administrador
                        </option>

                        <option value="editor" @selected(old('role') === 'editor')>
                            Editor
                        </option>

                        <option value="user" @selected(old('role') === 'user')>
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
                        Palavra-passe
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Mínimo de 8 caracteres"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-900 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                    >

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
                    class="inline-flex justify-center rounded-xl px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                    Cancelar
                </a>


                <button
                    type="submit"
                    class="inline-flex justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700"
                >
                    Criar usuário
                    →
                </button>

            </div>

        </form>

    </div>

</div>

@endsection