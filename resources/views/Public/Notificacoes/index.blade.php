@extends('Layouts.public')

@section('conteudo')

@php
    $naoLidas = auth()->user()->unreadNotifications()->count();
@endphp

<div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 sm:py-10">

    {{-- ==================== HEADER ==================== --}}
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">

        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-600/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                </svg>
            </div>

            <div>
                <h2 class="text-2xl font-black tracking-tight text-slate-950">Notificações</h2>
                <p class="text-sm text-slate-500">
                    @if($naoLidas > 0)
                        Você tem <strong class="font-bold text-blue-600">{{ $naoLidas }}</strong>
                        {{ $naoLidas === 1 ? 'notificação não lida' : 'notificações não lidas' }}
                    @else
                        Tudo em dia por aqui ✨
                    @endif
                </p>
            </div>
        </div>

        @if($naoLidas > 0)
            <form method="POST" action="{{ route('notificacoes.todas') }}">
                @csrf
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>
                    Marcar todas como lidas
                </button>
            </form>
        @endif

    </div>


    {{-- ==================== ALERTA ==================== --}}
    @if(session('ok'))
        <div class="mb-5 flex items-start justify-between gap-3 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            <span>{{ session('ok') }}</span>
            <button type="button"
                    onclick="this.parentElement.remove()"
                    class="text-green-600 transition hover:text-green-900"
                    aria-label="Fechar">
                ✕
            </button>
        </div>
    @endif


    {{-- ==================== LISTA ==================== --}}
    <div class="space-y-3">

        @forelse($notificacoes as $n)

            @php
                $lida   = (bool) $n->read_at;
                $icone  = $n->data['icone'] ?? '🔔';
                $titulo = $n->data['titulo'] ?? 'Notificação';
            @endphp

            <div class="group relative flex flex-col gap-4 overflow-hidden rounded-2xl border bg-white p-4 pl-6 transition duration-200 sm:flex-row sm:items-center
                        {{ $lida ? 'border-slate-200 bg-slate-50/60' : 'border-blue-100 shadow-sm hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md' }}">

                {{-- Barra lateral --}}
                <span class="absolute inset-y-0 left-0 w-1 {{ $lida ? 'bg-slate-200' : 'bg-blue-600' }}"></span>

                <div class="flex min-w-0 flex-1 items-start gap-4">

                    {{-- Ícone --}}
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl text-xl
                                {{ $lida ? 'bg-slate-100 grayscale' : 'bg-blue-50' }}">
                        {{ $icone }}
                    </div>

                    {{-- Conteúdo --}}
                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between gap-2">
                            <p class="text-sm font-semibold leading-snug {{ $lida ? 'text-slate-600' : 'text-slate-950' }}">
                                {{ $titulo }}
                            </p>

                            @unless($lida)
                                <span class="shrink-0 rounded-md bg-blue-600 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-white">
                                    Nova
                                </span>
                            @endunless
                        </div>

                        <p class="mt-1 flex items-center gap-1.5 text-xs text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            {{ $n->created_at->diffForHumans() }}
                        </p>
                    </div>

                </div>

                {{-- Ações --}}
                <div class="flex shrink-0 items-center justify-end gap-2">

                    @if($lida)
                        <span class="rounded-md bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-500">✓ Lida</span>
                    @endif

                    <form method="POST" action="{{ route('notificacoes.lida', $n->id) }}">
                        @csrf
                        <button type="submit"
                                title="Abrir"
                                class="inline-flex items-center gap-1.5 rounded-xl px-3.5 py-2 text-sm font-semibold transition active:scale-95
                                       {{ $lida ? 'border border-slate-200 bg-white text-slate-600 hover:bg-slate-50' : 'bg-blue-600 text-white hover:bg-blue-700' }}">
                            Ver
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m12 5 7 7-7 7"/>
                            </svg>
                        </button>
                    </form>

                    <form method="POST" action="{{ route('notificacoes.destroy', $n->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                title="Remover"
                                onclick="return confirm('Remover esta notificação?')"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 transition hover:bg-red-50 hover:text-red-600 active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"/>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                            </svg>
                        </button>
                    </form>

                </div>

            </div>

        @empty

            {{-- ==================== ESTADO VAZIO ==================== --}}
            <div class="rounded-2xl border-2 border-dashed border-slate-200 bg-white px-6 py-14 text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                    </svg>
                </div>
                <h5 class="text-lg font-bold text-slate-900">Nenhuma notificação por aqui</h5>
                <p class="mt-1 text-sm text-slate-500">Quando algo importante acontecer, vais ver aqui.</p>
            </div>

        @endforelse

    </div>


    {{-- ==================== PAGINAÇÃO ==================== --}}
    @if($notificacoes->hasPages())
        <div class="mt-6">
            {{ $notificacoes->links() }}
        </div>
    @endif

</div>

@endsection