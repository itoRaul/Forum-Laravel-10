<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Fórum</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f4f9; margin: 0; padding: 20px;}
        .login-container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 450px; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: .75rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: .75rem; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; margin-top: 10px; }
        button:hover { background-color: #218838; }
        .alert { background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 4px; margin-bottom: 1rem; }
        .links { margin-top: 1.5rem; text-align: center; }
        .links a { color: #007bff; text-decoration: none; }
        .links a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Criar uma Conta</h2>
    
    @if ($errors->any())
        <div class="alert">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.register') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
    
    <div class="links">
        <a href="{{ route('users.login.form') }}">Já tem uma conta? Entrar</a>
    </div>
</div>

</body>
</html>
