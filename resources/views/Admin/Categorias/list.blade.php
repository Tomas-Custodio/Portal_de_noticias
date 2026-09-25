@extends('Layouts/admin')

@section('title', 'Categorias')
@section('page_title', 'Categorias')

@section('conteudo')

<div class="mx-auto max-w-7xl">

    {{-- HEADER --}}

    <div class="mb-8">

        {{-- BREADCRUMB --}}

        <div class="mb-5 flex items-center gap-2 text-sm">

            <a
                href="{{ route('categorias.home') }}"
                class="font-medium text-slate-400 transition hover:text-indigo-600"
            >
                Categorias
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
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20"
                    >
                        #
                    </div>

                    <span
                        class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-indigo-600"
                    >
                        Organização
                    </span>

                </div>


                <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Categorias
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Gerencie as categorias utilizadas para organizar
                    as notícias do sistema.
                </p>

            </div>


            <a
                href="{{ route('categoria.create') }}"
                class="group inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm
                font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/25 active:scale-[0.98]"
            >

                <span
                    class="text-lg leading-none transition-transform duration-200 group-hover:rotate-90"
                >
                    +
                </span>

                Nova categoria

            </a>

        </div>

    </div>


    {{-- MENSAGEM DO SISTEMA --}}
    @if(session('msg'))

        <div
            class="mb-6 flex items-start gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 p-4"
        >

            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 font-bold text-emerald-700"
            >
                ✓
            </div>

            <div>

                <p class="text-sm font-semibold text-emerald-900">
                    Operação realizada
                </p>

                <p class="mt-1 whitespace-pre-line text-sm leading-5 text-emerald-700">
                    {{ session('msg') }}
                </p>

            </div>

        </div>

    @endif


    {{-- RESUMO --}}
    <div class="mb-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

        {{-- TOTAL --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm"
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Total de categorias
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-950">
                        {{ $list_categories->total() }}
                    </p>

                </div>


                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-lg font-bold text-indigo-600"
                >
                    #
                </div>

            </div>

        </div>


        {{-- EXIBINDO --}}


        <div
            class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm"
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Nesta página
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-950">
                    
                    </p>

                </div>


                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-500"
                >
                    ≡
                </div>

            </div>

        </div>


        {{-- STATUS --}}
        <div
            class="hidden rounded-3xl border border-slate-200 bg-white p-5 shadow-sm lg:block"
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Estado
                    </p>

                    <p class="mt-2 text-lg font-bold text-emerald-600">
                        Sistema ativo
                    </p>

                </div>


                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600"
                >
                    ✓
                </div>

            </div>

        </div>

    </div>


    {{-- TABELA --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm"
    >

        {{-- CABEÇALHO DA TABELA --}}
        <div
            class="flex flex-col justify-between gap-4 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:px-8"
        >

            <div>

                <h2 class="font-bold text-slate-900">
                    Todas as categorias
                </h2>

                <p class="mt-1 text-xs text-slate-400">
                    Visualize e gerencie as categorias cadastradas.
                </p>

            </div>


            <div
                class="rounded-xl bg-slate-50 px-3 py-2 text-xs font-medium text-slate-500"
            >
                {{ $list_categories->firstItem() ?? 0 }}
                -
                {{ $list_categories->lastItem() ?? 0 }}
                de
                {{ $list_categories->total() }}
            </div>

        </div>


        @if($list_categories->count())

            {{-- DESKTOP --}}
            <div class="hidden overflow-x-auto md:block">

                <table class="w-full">

                    <thead>

                        <tr class="border-b border-slate-100 bg-slate-50/70">

                            <th
                                class="px-8 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                            >
                                Categoria
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                            >
                                Identificador
                            </th>

                            <th
                                class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-400"
                            >
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @foreach($list_categories as $categoria)

                            <tr class="group transition hover:bg-slate-50/70">

                                {{-- CATEGORIA --}}
                                <td class="px-8 py-5">

                                    <div class="flex items-center gap-4">

                                        <div
                                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 font-bold text-indigo-600 transition group-hover:bg-indigo-100"
                                        >
                                            {{ strtoupper(substr($categoria->nome, 0, 1)) }}
                                        </div>


                                        <div class="min-w-0">

                                            <p class="font-semibold text-slate-800">
                                                {{ $categoria->nome }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-slate-400">
                                                Categoria de notícias
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- ID --}}
                                <td class="px-6 py-5">

                                    <span
                                        class="inline-flex rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-bold text-slate-500"
                                    >
                                        #{{ $categoria->id }}
                                    </span>

                                </td>


                                {{-- AÇÕES --}}
                                <td class="px-6 py-5">

                                    <div class="flex justify-end gap-2">

                                        {{-- EDITAR --}}
                                        <a
                                            href="{{ route('categoria.edit', $categoria->id) }}"
                                            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                                        >
                                            <span>
                                                ✎
                                            </span>

                                            Editar
                                        </a>


                                        {{-- EXCLUIR --}}
                                        
                                        <form
                                            action="{{ route('categoria.delete', $categoria->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-2 rounded-xl border border-red-100 bg-white px-3.5 py-2 text-xs font-semibold text-red-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                                            >
                                                <span>
                                                    ×
                                                </span>

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

                @foreach($list_categories as $categoria)

                    <div class="p-5">

                        <div class="flex items-start justify-between gap-4">

                            <div class="flex min-w-0 items-center gap-3">

                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 font-bold text-indigo-600"
                                >
                                    {{ strtoupper(substr($categoria->nome, 0, 1)) }}
                                </div>


                                <div class="min-w-0">

                                    <p class="truncate font-semibold text-slate-800">
                                        {{ $categoria->nome }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        ID #{{ $categoria->id }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="mt-4 grid grid-cols-2 gap-2">

                            <a
                                href="{{ route('categoria.edit', $categoria->id) }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-3 py-2.5 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                            >
                                ✎
                                Editar
                            </a>


                            <form
                                action="{{ route('categoria.delete', $categoria->id) }}"
                                method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-red-100 px-3 py-2.5 text-xs font-semibold text-red-500 transition hover:border-red-200 hover:bg-red-50"
                                >
                                    ×
                                    Excluir
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- PAGINAÇÃO --}}
            <div
                class="border-t border-slate-100 px-6 py-5 sm:px-8"
            >

                {{ $list_categories->links() }}

            </div>

        @else

            {{-- ESTADO VAZIO --}}
            <div class="px-6 py-20 text-center sm:px-8">

                <div
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-slate-100 text-2xl text-slate-400"
                >
                    #
                </div>


                <h3 class="mt-5 text-lg font-bold text-slate-900">
                    Nenhuma categoria encontrada
                </h3>


                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-400">
                    Ainda não existem categorias cadastradas no sistema.
                    Crie a primeira categoria para começar a organizar as notícias.
                </p>


                <a
                    href="{{ route('categoria.create') }}"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700"
                >
                    <span class="text-lg">
                        +
                    </span>

                    Criar primeira categoria
                </a>

            </div>

        @endif

    </div>

</div>

@endsection