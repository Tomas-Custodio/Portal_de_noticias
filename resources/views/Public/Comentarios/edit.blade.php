@extends('Layouts/public')

@section('name', 'Editar comentário')

@section('conteudo')

{{-- Lock de scroll no body --}}
<style>
    body { overflow: hidden; }
</style>

<div class="relative min-h-screen bg-slate-50 text-slate-900">

    {{-- CONTEÚDO DA PÁGINA DESFOCADO --}}
    <div class="pointer-events-none select-none blur-sm">

        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            {{-- BREADCRUMB --}}
            <nav class="mb-6 flex flex-wrap items-center gap-2 text-sm">
                <span class="font-medium text-slate-400">
                    Home
                </span>

                <span class="text-slate-300">/</span>

                <span class="font-medium text-slate-400">
                    Notícias
                </span>

                <span class="text-slate-300">/</span>

                <span class="font-medium text-slate-600">
                    Comentários
                </span>
            </nav>


            {{-- GRID --}}
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-10">

                {{-- NOTÍCIA --}}
                <aside class="lg:col-span-3">

                    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                        <div class="aspect-[16/10] w-full bg-slate-100"></div>

                        <div class="p-5">

                            <div class="h-4 w-24 rounded bg-slate-200"></div>

                            <div class="mt-4 h-7 w-4/5 rounded bg-slate-200"></div>

                            <div class="mt-4 h-4 w-full rounded bg-slate-100"></div>
                            <div class="mt-2 h-4 w-5/6 rounded bg-slate-100"></div>

                        </div>

                    </div>

                </aside>


                {{-- COMENTÁRIOS --}}
                <main class="lg:col-span-7">

                    <div class="mb-5">

                        <h2 class="text-2xl font-black tracking-tight text-slate-950">
                            Comentários
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Partilhe a sua opinião sobre esta notícia.
                        </p>

                    </div>


                    {{-- COMENTÁRIOS FALSOS PARA O FUNDO --}}
                    <div class="space-y-3">

                        @for($i = 0; $i < 4; $i++)

                            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                                <div class="flex gap-3">

                                    <div class="h-10 w-10 rounded-full bg-slate-200"></div>

                                    <div class="flex-1">

                                        <div class="h-4 w-32 rounded bg-slate-200"></div>

                                        <div class="mt-3 h-12 w-full rounded-2xl bg-slate-100"></div>

                                    </div>

                                </div>

                            </div>

                        @endfor

                    </div>

                </main>

            </div>

        </div>

    </div>


    {{-- OVERLAY (z-index aumentado) --}}
    <div class="fixed inset-0 z-[100] bg-slate-950/40 backdrop-blur-sm"></div>


    {{-- MODAL (z-index aumentado) --}}
    <div class="fixed inset-0 z-[110] overflow-y-auto">

        <div class="flex min-h-full items-center justify-center px-4 py-8">

            <div class="w-full max-w-2xl">

                {{-- CABEÇALHO --}}
                <div class="mb-4 text-center">

                    <h2 class="text-2xl font-black tracking-tight text-white">
                        Editar comentário
                    </h2>

                    <p class="mt-1 text-sm text-white/80">
                        Faça as alterações necessárias no seu comentário.
                    </p>

                </div>


                {{-- CARD --}}
                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl">

                    {{-- CABEÇALHO DO COMENTÁRIO --}}
                    <div class="border-b border-slate-100 px-5 py-4">

                        <div class="flex items-center gap-3">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-600">

                                {{ strtoupper(substr($comentario_found->usuario->nome ?? 'U', 0, 1)) }}

                            </div>

                            <div>

                                <p class="text-sm font-bold text-slate-900">
                                    {{ $comentario_found->usuario->nome ?? 'Utilizador' }}
                                </p>

                                <p class="text-xs text-slate-400">
                                    {{ $comentario_found->created_at->diffForHumans() }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- FORMULÁRIO --}}

                    <form
                        action="{{ route('comentario.update', $comentario_found->id) }}"
                        method="POST"
                        class="p-5">

                        @csrf
                        @method('PUT')


                        <label
                            for="descricao" class="mb-2 block text-sm font-bold text-slate-700">Comentário
                        </label>

                        <textarea
                            id="descricao"
                            name="descricao"
                            rows="6"
                            required
                            class="w-full resize-none rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm leading-6 text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                        >{{ old('descricao', $comentario_found->descricao) }}</textarea>

                        @error('descricao')

                            <p class="mt-2 text-xs font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                        {{-- BOTÕES --}}

                        <div class="mt-5 flex items-center justify-end gap-3">

                            <a
                                href="{{ route('comentario.create',$comentario_found->noticia->id) }}"
                                class="rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                                Cancelar
                            </a>


                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-6 py-2.5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 hover:shadow-xl active:scale-[0.98]">Update

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
                                    <path d="m5 12 4 4L19 6"/>
                                </svg>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection