<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enviar Email</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 20px; }
        .caixa { max-width: 500px; margin: 40px auto; background: #fff; padding: 25px; border-radius: 8px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; background: #2563eb; color: #fff; border: 0; border-radius: 4px; cursor: pointer; }
        .sucesso { background: #dcfce7; padding: 10px; border-radius: 4px; margin-bottom: 10px; }
        .erro { color: #dc2626; font-size: 14px; }
    </style>
</head>
<body>
    <div class="caixa">
        <h2>Enviar Email</h2>

        @if(session('sucesso'))
            <div class="sucesso">{{ session('sucesso') }}</div>
        @endif

        <form action="{{ route('email.send') }}" method="POST">
            
            @csrf

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}">
            @error('nome') <div class="erro">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="erro">{{ $message }}</div> @enderror

            <label for="titulo">Título do assunto</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
            @error('titulo') <div class="erro">{{ $message }}</div> @enderror

            <label for="mensagem">Assunto</label>
            <textarea id="mensagem" name="mensagem" rows="6">{{ old('mensagem') }}</textarea>
            @error('mensagem') <div class="erro">{{ $message }}</div> @enderror

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>