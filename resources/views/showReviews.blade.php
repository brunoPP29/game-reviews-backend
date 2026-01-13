<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            Feed de Avaliações
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="flex items-center gap-2 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    {{ session('success') }}
                </div>
            @endif

            @forelse($reviewsNameGame as $review)
                <div class="overflow-hidden rounded-xl bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 transition hover:shadow-md">
                    
                    <div class="p-5 border-b border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50/50 dark:bg-gray-700/30">
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-white dark:bg-gray-600 rounded-full shadow-sm text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-gray-100 text-lg leading-tight">
                                    {{ $review['title'] }}
                                </h4>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    <span class="font-semibold text-indigo-600 dark:text-indigo-400">{{ $review['game_name'] }}</span>
                                    <span>•</span>
                                    <span>{{ $review['user_name'] }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="flex flex-col items-center justify-center w-12 h-12 rounded-lg bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 font-bold border border-indigo-200 dark:border-indigo-800">
                                <span class="text-lg">{{ $review['score'] }}</span>
                                <span class="text-[10px] uppercase">Nota</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4 relative pl-4 border-l-4 border-gray-200 dark:border-gray-600 italic">
                            "{{ $review['text'] }}"
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="/game/{{ $review['id_game'] }}" 
                               class="inline-flex items-center gap-1 text-xs font-bold text-indigo-600 hover:text-indigo-800 uppercase tracking-wide transition">
                                Ver Detalhes do Jogo
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="flex flex-col items-center justify-center p-12 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-dashed border-gray-300 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a8.6 8.6 0 01-5.358-1.865L2 20l1.293-3.754A8.6 8.6 0 012 12c0-4.418 3.582-8 8-8s8 3.582 8 8z" /></svg>
                    <p class="text-gray-500 dark:text-gray-400 font-medium">Nenhuma review encontrada.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>