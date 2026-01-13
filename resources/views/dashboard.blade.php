<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
            {{ __('Seus Jogos Avaliados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8 space-y-6">
            
            {{-- Substitua $userReviews pelo nome da variável que vem do seu controller --}}
            @forelse($userReviews ?? [] as $review)
                <div class="overflow-hidden rounded-xl bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 transition hover:shadow-md">
                    <div class="p-6 flex flex-col sm:flex-row justify-between gap-4">
                        
                        <div class="flex-1 space-y-2">
                            <div class="flex items-center gap-2">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $review['game_name'] ?? 'Jogo Desconhecido' }}
                                </h3>
                                <span class="px-2 py-0.5 rounded text-xs font-semibold bg-indigo-100 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-300">
                                    Sua Nota: {{ $review['score'] }}
                                </span>
                            </div>
                            
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-gray-400">
                                "{{ $review['title'] }}"
                            </h4>
                            
                            <p class="text-gray-500 dark:text-gray-300 text-sm leading-relaxed line-clamp-3">
                                {{ $review['text'] }}
                            </p>
                        </div>

                        <div class="flex sm:flex-col items-center justify-center gap-2 border-t sm:border-t-0 sm:border-l border-gray-100 dark:border-gray-700 pt-4 sm:pt-0 sm:pl-4 mt-4 sm:mt-0">
                            <a href="/game/{{ $review['id_game'] }}" 
                               class="text-sm font-medium text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center gap-1">
                                Ver Jogo
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center p-12 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-dashed border-gray-300 dark:border-gray-700">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 dark:bg-gray-700 mb-4 text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Você ainda não avaliou nenhum jogo</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Comece pesquisando seus jogos favoritos e compartilhe sua opinião.</p>
                    <div class="mt-6">
                        <a href="{{ route('searchByName') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Pesquisar Jogos
                        </a>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>