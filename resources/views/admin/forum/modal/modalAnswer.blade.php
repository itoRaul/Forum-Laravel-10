<dialog id="modalAnswer" class="rounded-2xl bg-white shadow-2xl p-0 w-full max-w-lg m-auto border-0 backdrop:backdrop-blur-sm">
    <div class="p-6 sm:p-8">
        <div class="mb-5 flex items-start justify-between">
            <div class="pr-4">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Responder ao Tópico</h3>
                <p class="text-sm leading-relaxed text-gray-500">Escreva sua resposta detalhada para a dúvida <strong>"{{ $forum->subject }}"</strong>.</p>
            </div>
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-green-50 shadow-inner shadow-green-100 ring-4 ring-green-50">
                <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
            </div>
        </div>
        
        <form action="{{ route('forum.answer', $forum->id) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="answer" class="block text-sm font-bold uppercase tracking-wider text-gray-500 mb-2">Sua Resposta</label>
                <textarea id="answer" name="answer" rows="5" required class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-5 py-4 text-sm text-gray-800 focus:border-green-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-green-500/10 transition-all placeholder:text-gray-400" placeholder="Escreva aqui a sua resposta de forma clara e objetiva..."></textarea>
            </div>
            
            <div class="flex flex-col-reverse sm:flex-row gap-3 mt-8 border-t border-gray-100 pt-6">
                <button type="button" onclick="document.getElementById('modalAnswer').close()" class="inline-flex w-full sm:w-auto items-center justify-center rounded-xl bg-white border border-gray-200 px-6 py-3 text-sm font-bold text-gray-700 transition-all duration-200 hover:bg-gray-50 hover:border-gray-300 focus:ring-4 focus:ring-gray-100 sm:mr-auto">
                    Cancelar
                </button>
                <button type="submit" class="inline-flex w-full sm:w-auto items-center justify-center bg-green-600 rounded-xl px-6 py-3 text-sm font-bold text-white shadow-lg shadow-green-200 transition-all duration-300 hover:bg-green-700 hover:-translate-y-0.5 focus:ring-4 focus:ring-green-500/20 active:translate-y-0">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    Enviar Resposta
                </button>
            </div>
        </form>
    </div>
</dialog>

<style>
    dialog[open] {
        animation: modalFadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    dialog::backdrop {
        background: rgba(17, 24, 39, 0.4);
        backdrop-filter: blur(4px);
        animation: backdropFadeIn 0.3s ease-out forwards;
    }
    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(15px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    @keyframes backdropFadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>