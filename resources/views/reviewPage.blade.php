<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
            {{ __('Avaliar Jogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-2xl sm:px-6">
            <div class="overflow-hidden rounded-xl bg-white shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                
                <div class="bg-gray-50 dark:bg-gray-700/50 p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Nova avaliação para:
                    </h3>
                    <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mt-1">
                        {{$gameName}}
                    </h1>
                </div>

                <div class="p-8">
                    @if(session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="post" class="space-y-6">
                        @csrf
                        <input name="idGame" type="hidden" value={{$idGame}}>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" /></svg>
                                Título da Análise
                            </label>
                            <input type="text" name="title" required
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm placeholder-gray-400"
                                placeholder="Resuma sua experiência em poucas palavras...">
                        </div>

                        <div class="bg-indigo-50 dark:bg-gray-700/30 p-4 rounded-lg border border-indigo-100 dark:border-gray-600">
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                Sua Nota (0 a 10)
                            </label>
                            <div class="flex items-center gap-4">
                                <input type="range" name="score" max="10" min="0" step="1" value="5"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-indigo-600 dark:bg-gray-700"
                                    oninput="document.getElementById('scoreDisplay').innerText = this.value">
                                <div class="flex items-center justify-center bg-indigo-600 text-white w-10 h-10 rounded-lg font-bold shadow-md" id="scoreDisplay">
                                    5
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                Comentário Completo
                            </label>
                            <textarea name="text" rows="5" required
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 px-4 py-3 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm placeholder-gray-400"
                                placeholder="O que você gostou? O que poderia ser melhor? Escreva sua opinião detalhada."></textarea>
                        </div>

                        <div class="pt-4">
                            <input type="submit" value="Publicar Avaliação"
                                class="w-full cursor-pointer rounded-lg bg-indigo-600 px-6 py-3 text-white font-bold shadow-md hover:bg-indigo-700 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>