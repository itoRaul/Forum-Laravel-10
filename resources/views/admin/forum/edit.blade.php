
@extends('admin.layouts.app')

@section('title', 'Editar Dúvida')

@section('header')
    <div class="relative mb-8 overflow-hidden rounded-3xl border border-gray-100 bg-white p-7 shadow-xl shadow-gray-200/40 transition-all duration-500">
        <div class="absolute -top-24 -right-20 h-56 w-56 rounded-full bg-indigo-50/70 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 h-56 w-56 rounded-full bg-purple-50/70 blur-3xl"></div>

        <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.24em] text-indigo-600">Editar tópico</span>
                    <span class="h-1 w-1 rounded-full bg-gray-200"></span>
                    <span class="text-xs font-medium text-gray-400">Fórum</span>
                </div>

                <div class="space-y-2">
                    <h1 class="text-3xl font-black tracking-tight text-gray-900 sm:text-4xl">
                        Editar <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Dúvida</span>
                    </h1>
                </div>
            </div>

            <div class="grid gap-3 sm:grid-cols-3 lg:min-w-[26rem]">
                <div class="rounded-2xl border border-gray-100 bg-gray-50/70 p-4 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-gray-400">Assunto</p>
                    <p class="mt-2 text-sm font-semibold text-gray-800">Resumo direto do problema</p>
                </div>
                <div class="rounded-2xl border border-gray-100 bg-gray-50/70 p-4 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-gray-400">Descrição</p>
                    <p class="mt-2 text-sm font-semibold text-gray-800">Contexto e detalhes úteis</p>
                </div>
                <div class="rounded-2xl border border-gray-100 bg-gray-50/70 p-4 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-gray-400">Publicação</p>
                    <p class="mt-2 text-sm font-semibold text-gray-800">Vai direto para o fórum</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="mx-auto max-w-3xl">
        <form action="{{ route('forum.update', $forum->id) }}" method="POST" class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-xl shadow-gray-200/40">
            @csrf
            @method('PUT')

            <div class="border-b border-gray-100 px-6 py-5 sm:px-8">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Editar dúvida</h2>
                    </div>
                </div>
            </div>

            <div class="px-6 py-6 sm:px-8">
                <x-alert/>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label for="subject" class="text-sm font-semibold text-gray-700">Assunto</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            value="{{ old('subject', $forum->subject) }}"
                            placeholder="Escolha um título objetivo para facilitar a busca."
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50/70 px-4 py-3 text-gray-900 shadow-sm outline-none transition duration-200 placeholder:text-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100"
                        >
                    </div>

                    <div class="space-y-2">
                        <label for="body" class="text-sm font-semibold text-gray-700">Descrição</label>
                        <textarea
                            name="body"
                            id="body"
                            cols="30"
                            rows="8"
                            placeholder="Explique o contexto, o que já tentou e onde está travando..."
                            class="w-full resize-y rounded-2xl border border-gray-200 bg-gray-50/70 px-4 py-3 text-gray-900 shadow-sm outline-none transition duration-200 placeholder:text-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100"
                        >{{ old('body', $forum->body) }}</textarea>
                        <p class="text-xs text-gray-400">Quanto mais contexto útil, melhor será a resposta.</p>
                    </div>

                    <div class="flex justify-end">

                        <button
                            type="submit"
                            class="inline-flex items-right justify-center rounded-2xl bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-200 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-indigo-200 focus:outline-none focus:ring-4 focus:ring-indigo-200 active:translate-y-0"
                        >
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Atualizar Dúvida
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
