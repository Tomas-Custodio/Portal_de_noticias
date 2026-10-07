<div style="font-family: Arial, sans-serif; max-width: 500px;">
    <h2>Nova mensagem de contacto</h2>

    <p><strong>Nome:</strong> {{ $user['nome'] }}</p>
    <p><strong>Email:</strong> {{ $user['email'] }}</p>
    <p><strong>Título:</strong> {{ $user['titulo'] }}</p>

    <hr>

    <p>{!! nl2br(e($user['mensagem'])) !!}</p>
</div>