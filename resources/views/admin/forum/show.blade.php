@extends('admin.layouts.app')

@section('title', 'Detalhes da Dúvida')

@section('header')
    <div class="relative mb-8 overflow-hidden rounded-3xl border border-gray-100 bg-white p-7 shadow-xl shadow-gray-200/40 transition-all duration-500">
        <div class="absolute -top-24 -right-20 h-56 w-56 rounded-full bg-indigo-50/70 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 h-56 w-56 rounded-full bg-purple-50/70 blur-3xl"></div>

        <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.24em] text-indigo-600">Detalhes do tópico</span>
                    <span class="h-1 w-1 rounded-full bg-gray-200"></span>
                    <span class="text-xs font-medium text-gray-400">Fórum</span>
                </div>

                <div class="space-y-2">
                    <h1 class="text-3xl font-black tracking-tight text-gray-900 sm:text-4xl">
                        {{ $forum->subject }}
                    </h1>
                </div>
            </div>

            <div class="grid gap-2 sm:grid-cols-2 lg:min-w-[20rem]">
                <div class="rounded-2xl border border-gray-100 bg-gray-50/70 p-4 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-gray-400">Status</p>
                    <p class="mt-2 text-sm font-semibold text-gray-800">
                        {{ isset($forum->status) ? ($forum->status === 'A' ? 'Aberta' : ($forum->status === 'C' ? 'Fechada' : ($forum->status === 'P' ? 'Pendente' : $forum->status))) : 'Não informado' }}
                    </p>
                </div>
                <div class="rounded-2xl border border-gray-100 bg-gray-50/70 p-4 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-gray-400">ID</p>
                    <p class="mt-2 text-sm font-semibold text-gray-800">{{ $forum->id }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="mx-auto max-w-5xl space-y-6">
        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_20rem]">
            <section class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-xl shadow-gray-200/40">
                <div class="border-b border-gray-100 px-6 py-5 sm:px-8">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-200">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-gray-900">Conteúdo da dúvida</h2>
                                <p class="text-sm text-gray-500">Leia os detalhes publicados pelo usuário.</p>
                            </div>
                        </div>

                        <div class="inline-flex items-center gap-2 self-start rounded-full bg-gray-50 px-3 py-1.5 text-xs font-semibold text-gray-600">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            Publicado no fórum
                        </div>
                    </div>
                </div>

                <div class="px-6 py-6 sm:px-8">
                    <div class="space-y-6">
                        <div class="rounded-2xl border border-gray-100 bg-gray-50/60 p-5">
                            <div class="mb-3 flex items-center gap-2">
                                <span class="text-[10px] font-bold uppercase tracking-[0.22em] text-gray-400">Assunto</span>
                            </div>
                            <p class="text-xl font-bold leading-8 text-gray-900 sm:text-2xl">
                                {{ $forum->subject }}
                            </p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] font-bold uppercase tracking-[0.22em] text-gray-400">Descrição</span>
                            </div>
                            <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
                                <p class="whitespace-pre-line text-sm leading-7 text-gray-600 sm:text-base -mt-8 mb-2">
                                    {{ $forum->body }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-8 pt-8 border-t border-gray-100">
                            <div class="flex items-center gap-2 mb-6">
                                <span class="text-[10px] font-bold uppercase tracking-[0.24em] text-indigo-500">Respostas ({{ isset($forum->answers) ? count($forum->answers) : 0 }})</span>
                            </div>
                            
                            <div class="space-y-4">
                                @if(isset($forum->answers) && count($forum->answers) > 0)
                                    @foreach($forum->answers as $answer)
                                        <div class="rounded-2xl border border-indigo-50 bg-indigo-50/20 p-5 transition hover:bg-indigo-50/40">
                                            <div class="flex items-center gap-3 mb-4">
                                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-bold text-sm shadow-md">
                                                    {{ strtoupper(substr($answer['user']['name'] ?? 'U', 0, 1)) }}
                                                </div>
                                                <div>
                                                    <p class="text-sm font-bold text-gray-900">{{ $answer['user']['name'] ?? 'Usuário' }}</p>
                                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($answer['created_at'])->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                            <p class="whitespace-pre-line text-sm leading-relaxed text-gray-700 pl-13">
                                                {{ $answer['body'] }}
                                            </p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-8 text-center flex flex-col items-center justify-center">
                                        <svg class="w-10 h-10 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        <p class="text-sm font-medium text-gray-500">Ainda não há respostas.</p>
                                        <p class="text-xs text-gray-400 mt-1">Clique em "Responder" para ser o primeiro a interagir neste tópico.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <aside class="space-y-6">
                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-xl shadow-gray-200/40">
                    <div class="border-b border-gray-100 px-6 py-5">
                        <h3 class="text-sm font-bold uppercase tracking-[0.24em] text-gray-500">Ações</h3>
                    </div>

                    <div class="space-y-3 px-6 py-6">
                        <a href="{{ route('forum.index') }}" class="inline-flex w-full items-center justify-center rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm font-semibold text-gray-700 transition duration-200 hover:border-gray-300 hover:bg-gray-50">
                            Voltar para o fórum
                        </a>

                        <button onclick="document.getElementById('modalAnswer').showModal()" type="button" class="inline-flex w-full items-center justify-center rounded-2xl bg-green-600 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-green-200 transition duration-300 hover:-translate-y-0.5 hover:bg-green-700">
                            Responder
                        </button>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    @include('admin.forum.modal.modalAnswer')
@endsection
