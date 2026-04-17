<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Fórum</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; display: flex; justify-content: right; align-items: right; min-height: 100vh; background-color: #f8fafc; margin: 0; color: #1e293b; }
        .register-container { background: white; padding: 2.5rem; border-radius: 24px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1); width: 100%; max-width: 500px; border: 1px solid #f1f5f9; }
        
        h2 { font-size: 1.875rem; font-weight: 800; tracking: -0.025em; color: #0f172a; margin-bottom: 0.5rem; }
        h4 { font-size: 0.875rem; font-weight: 500; color: #64748b; margin-bottom: 2rem; }
        
        .form-group { margin-bottom: 1.25rem; }
        label { display: block; margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 600; color: #475569; }
        
        input[type="text"], input[type="email"], input[type="password"] { 
            width: 100%; padding: 0.875rem 1rem; border: 1px solid #e2e8f0; border-radius: 12px; box-sizing: border-box; 
            background-color: #f8fafc; transition: all 0.2s; font-size: 0.95rem; outline: none;
        }
        input:focus { border-color: #6366f1; background-color: #fff; box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1); }
        
        button { 
            width: 100%; padding: 0.875rem; background-image: linear-gradient(to right, #10b981, #059669); 
            color: white; border: none; border-radius: 12px; cursor: pointer; font-size: 0.95rem; font-weight: 700;
            transition: all 0.3s; margin-top: 1rem; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);
        }
        button:hover { transform: translateY(-1px); box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3); opacity: 0.95; }
        button:active { transform: translateY(0); }
        
        .alert { background-color: #fef2f2; color: #b91c1c; padding: 1rem; border-radius: 12px; margin-bottom: 1.5rem; border: 1px solid #fee2e2; font-size: 0.875rem; }
        .links { margin-top: 1.5rem; text-align: center; }
        .links a { color: #6366f1; text-decoration: none; font-weight: 700; font-size: 0.875rem; }
        .links a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="flex justify-center">
        <img src="{{ asset('assets/imagem-tela-register.png') }}" alt="Logo" style="width: 100%; height: 100%;">
    </div>

    <div class="register-container">
        <div class="flex justify-center">
            <img src="{{ asset('assets/logo.svg') }}" alt="Logo" style="width: 450px; height: auto; margin-top: 0rem; margin-left: 2rem;">
        </div>
        <div style="margin-top: 0rem;">
            <h2 style="text-align: center;">Criar uma Conta</h2>
            <h4 style="text-align: center;">Preencha os dados abaixo para criar sua conta</h4>
            
            @if ($errors->any())
                <div class="alert">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.register') }}" method="POST" style="padding: 2rem;">
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
    </div>

</body>
</html>
