@extends('Layouts/admin')

@section('conteudo')

@section('title', 'Usuários')
@section('page_title', 'Usuários')

@section('conteudo')

<div class="mx-auto max-w-7xl px-6 py-10">

    {{-- HEADER --}}
    <div class="mb-10">

        {{-- BREADCRUMB --}}
        
        <div class="mb-5 flex items-center gap-2 text-sm">
            <span class="font-medium text-slate-400">Administração</span>
            <span class="text-slate-300">/</span>
            <span class="font-medium text-slate-600">Usuários</span>
        </div>

        <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-end">

            <div>
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-bold uppercase tracking-wider text-indigo-600">
                        Gestão
                    </span>
                </div>

                <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                    Usuários
                </h1>

                <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">
                    Consulte os usuários cadastrados, seus níveis de
                    acesso e gerencie suas contas.
                </p>
            </div>

            
                href="{{ route('users.create') }}"
                class="group inline-flex items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition duration-200 hover:bg-indigo-700 hover:shadow-xl active:scale-[0.98]"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14"/>
                    <path d="M5 12h14"/>
                </svg>
                Novo usuário
            </a>

        </div>
    </div>


    {{-- TABELA DE USUÁRIOS --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <table class="w-full text-left text-sm">

            <thead class="border-b border-slate-100 bg-slate-50/60">
                <tr>
                    <th class="px-6 py-4 font-bold uppercase tracking-widest text-xs text-slate-500">Nome</th>
                    <th class="px-6 py-4 font-bold uppercase tracking-widest text-xs text-slate-500">Email</th>
                    <th class="px-6 py-4 font-bold uppercase tracking-widest text-xs text-slate-500">Role</th>
                    <th class="px-6 py-4 font-bold uppercase tracking-widest text-xs text-slate-500 text-right">Ações</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">

                @foreach($usuarios as $usuario)

                    <tr class="transition hover:bg-slate-50/60">

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-50 text-sm font-bold text-indigo-600">
                                    {{ strtoupper(substr($usuario->nome, 0, 1)) }}
                                </div>
                                <span class="font-semibold text-slate-800">
                                    {{ $usuario->nome }}
                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-500">
                            {{ $usuario->email }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-slate-600">
                                {{ $usuario->role }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">

                                
                                    href="{{ route('users.edit', $usuario->id) }}"
                                    class="flex h-9 w-9 items-center justify-center rounded-xl text-amber-600 transition hover:bg-amber-50"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('Remover este usuário?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="flex h-9 w-9 items-center justify-center rounded-xl text-red-500 transition hover:bg-red-50"
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

                @endforeach

            </tbody>

        </table>

    </div>


    {{-- PAGINAÇÃO --}}
    <div class="mt-8">
        {{ $usuarios->links() }}
    </div>

</div>

@endsection
    
@endsection