@extends('layouts.public')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Nova mensagem de contacto</h2>

    <div class="space-y-4">
        <div>
            <span class="font-semibold text-gray-700 bg-blue-600">Nome:</span>
            <span class="text-gray-900">{{ $user['nome'] }}</span>
        </div>

        <div class="bg-red-400">
            <span class="font-semibold text-gray-700">Email:</span>
            <span class="text-gray-900">{{ $user['email'] }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Título:</span>
            <span class="text-gray-900">{{ $user['titulo'] }}</span>
        </div>
    </div>

    <hr class="my-6 border-gray-200">

    <div class="text-gray-800 leading-relaxed">
        {!! nl2br(e($user['mensagem'])) !!}
    </div>
</div>
@endsection