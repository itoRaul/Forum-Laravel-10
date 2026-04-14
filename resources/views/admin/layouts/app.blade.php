<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased font-sans">
    <header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('forum.index') }}" class="text-xl font-bold text-indigo-600 flex items-center hover:opacity-80 transition-opacity">
                    <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                    ForumApp
                </a>
            </div>
            
            <div class="flex items-center space-x-6">
                @auth
                    <div class="flex items-center group">
                        <div class="flex flex-col items-end mr-3">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Usuário</span>
                            <span class="text-sm font-bold text-gray-700">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-indigo-200 shadow-lg border-2 border-white ring-1 ring-gray-100 group-hover:scale-105 transition-transform duration-200">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>
                    
                    <div class="h-8 w-px bg-gray-100 mx-2"></div>
                    
                    <form action="{{ route('users.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center px-4 py-2 rounded-lg text-gray-500 hover:text-red-600 hover:bg-red-50 transition-all duration-200 text-sm font-semibold group">
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Sair
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <section class="container px-4 mx-auto py-8">
        @yield('header')
        <main class="content">
            <x-messages />
            @yield('content')
        </main>
    </section>
</body>
</html>