<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fórum</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f9; margin: 0; }
        .login-container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; font-weight: bold; }
        input[type="email"], input[type="password"] { width: 100%; padding: .75rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: .75rem; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; }
        button:hover { background-color: #0056b3; }
        .error { color: red; font-size: 0.875rem; margin-top: 0.25rem; }
        .alert { background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 4px; margin-bottom: 1rem; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Acesso ao Fórum</h2>
    
    @if ($errors->any())
        <div class="alert">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.login') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <div style="margin-top: 1.5rem; text-align: center;">
        <a href="{{ route('users.register.form') }}" style="color: #007bff; text-decoration: none;">Não tem conta? Cadastre-se</a>
    </div>
</div>

</body>
</html>