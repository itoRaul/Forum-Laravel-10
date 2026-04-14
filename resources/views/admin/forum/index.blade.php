@extends('admin.layouts.app')

@section('title', 'Dashboard do Fórum')

@section('header')
    <div class="relative overflow-hidden bg-white p-7 rounded-3xl shadow-xl shadow-gray-200/40 mb-8 border border-gray-100 transition-all duration-500">
        <!-- Abstract Background Shapes (Subtle) -->
        <div class="absolute -top-20 -right-20 w-48 h-48 bg-indigo-50/50 rounded-full blur-3xl"></div>
        
        <div class="relative space-y-7">
            <!-- Top Row: Title & Action -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-50 pb-6">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 bg-indigo-50 text-indigo-600 text-[10px] font-bold rounded-md uppercase tracking-widest">Dashboard</span>
                        <span class="w-1 h-1 rounded-full bg-gray-200"></span>
                        <span class="text-gray-400 text-xs font-medium">Comunidade</span>
                    </div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                        Fórum de <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Dúvidas</span>
                    </h1>
                </div>
                
                <div class="flex shrink-0">
                    <a href="{{ route('forum.create') }}" class="group relative inline-flex items-center justify-center px-7 py-3.5 font-bold text-white transition-all duration-300 bg-indigo-600 rounded-xl hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-100 overflow-hidden transform hover:-translate-y-0.5 active:scale-95">
                        <div class="absolute inset-0 w-full h-full transition duration-300 ease-out opacity-0 bg-gradient-to-br from-white/20 to-transparent group-hover:opacity-100"></div>
                        <svg class="w-5 h-5 mr-2 transition-transform duration-500 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        <span class="text-sm">Nova Dúvida</span>
                        <!-- Shine Effect -->
                        <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white/10 opacity-40 group-hover:animate-shine"></div>
                    </a>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Stat Card: Total -->
                <div class="group bg-gray-50/50 p-4 rounded-2xl border border-gray-100 transition-all duration-300 hover:bg-white hover:shadow-md hover:border-indigo-100 flex items-center border-l-4 border-l-indigo-500/0 hover:border-l-indigo-500">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-indigo-600 shadow-sm border border-gray-100 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Total</p>
                        <p class="text-xl font-black text-gray-800 leading-none">{{ $stats->total }}</p>
                    </div>
                </div>

                <!-- Stat Card: Ativos -->
                <div class="group bg-gray-50/50 p-4 rounded-2xl border border-gray-100 transition-all duration-300 hover:bg-white hover:shadow-md hover:border-emerald-100 flex items-center border-l-4 border-l-emerald-500/0 hover:border-l-emerald-500">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-emerald-500 shadow-sm border border-gray-100 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Ativos</p>
                        <p class="text-xl font-black text-gray-800 leading-none">{{ $stats->active }}</p>
                    </div>
                </div>

                <!-- Stat Card: Respostas -->
                <div class="group bg-gray-50/50 p-4 rounded-2xl border border-gray-100 transition-all duration-300 hover:bg-white hover:shadow-md hover:border-purple-100 flex items-center border-l-4 border-l-purple-500/0 hover:border-l-purple-500">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-purple-500 shadow-sm border border-gray-100 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Respostas</p>
                        <p class="text-xl font-black text-gray-800 leading-none">{{ $stats->responses }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes shine {
            100% {
                left: 125%;
            }
        }
        .animate-shine {
            animation: shine 0.8s ease-in-out;
        }
    </style>
@endsection

@section('content')

<!-- Search and Filter Section -->
<div class="bg-white p-4 rounded-xl shadow-sm mb-6 border border-gray-100 flex flex-col md:flex-row justify-between items-center">
    <form action="{{ route('forum.index') }}" method="get" class="w-full relative flex items-center">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="text" name="filter" placeholder="Pesquisar fóruns pelo assunto ou texto..." value="{{ $filters['filter'] ?? '' }}" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none text-gray-700 placeholder-gray-400">
        <button type="submit" class="absolute right-2 px-4 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-md transition-colors">
            Filtrar
        </button>
    </form>
</div>

<!-- Forums List (Cards) -->
@if(count($forums->items()) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($forums->items() as $forum)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col h-full hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-xl font-bold text-gray-800 line-clamp-1" title="{{ $forum->subject }}">
                        {{ $forum->subject }}
                    </h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                        {{ $forum->status === 'A' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $forum->status === 'A' ? 'Ativo' : ($forum->status === 'P' ? 'Pendente' : $forum->status) }}
                    </span>
                </div>
                
                <p class="text-gray-600 text-sm flex-grow mb-6 line-clamp-3">
                    {{ $forum->body }}
                </p>
                
                <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-50">
                    <div class="flex space-x-2">
                        <a href="{{ route('forum.show', $forum->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm transition-colors flex items-center">
                            Visualizar
                        </a>
                        <span class="text-gray-300">|</span>
                        <a href="{{ route('forum.edit', $forum->id) }}" class="text-blue-600 hover:text-blue-900 font-medium text-sm transition-colors flex items-center">
                            Editar
                        </a>
                    </div>
                    
                    <form action="{{ route('forum.destroy', $forum->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja apagar este fórum?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm transition-colors flex items-center cursor-pointer" title="Apagar fórum">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum fórum encontrado</h3>
        <p class="mt-1 text-sm text-gray-500">Comece criando um novo tópico de discussão.</p>
        <div class="mt-6">
            <a href="{{ route('forum.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Nova Dúvida
            </a>
        </div>
    </div>
@endif

<!-- Pagination -->
<div class="mt-6">
    <x-pagination :paginator="$forums" :appends="$filters"/>
</div>

@endsection