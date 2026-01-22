<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7m-9 14V9m0 0L5 10m7-1l5 1"/>
            </svg>
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8 space-y-8">

            {{-- PERFIL --}}
            <div class="overflow-hidden rounded-xl bg-white shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                <div class="p-6 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/30">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5.121 17.804A9 9 0 1119.07 5.93M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Perfil
                    </h3>
                </div>

                <div class="p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Usuário</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Conta criada em {{ Auth::user()->created_at->format('d/m/Y') }}
                        </p>
                    </div>

                    <a href="/profile"
                       class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-indigo-600 text-white font-semibold shadow-md
                              hover:bg-indigo-700 transition">
                        Ir para o perfil
                    </a>
                </div>
            </div>

            {{-- ÚLTIMA AÇÃO --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Última Review --}}
                <div class="overflow-hidden rounded-xl bg-white shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                    <div class="p-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/30">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 8h10M7 12h6M5 20h14V4H5z"/>
                            </svg>
                            Última review
                        </h3>
                    </div>

                    <div class="p-6">
                        @if($lastReview)
                            <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                {{ $lastReview['game_name'] }}
                            </p>

                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Nota: {{ $lastReview['score'] }}/10
                            </p>

                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 line-clamp-2">
                                {{ $lastReview['title'] }}
                            </p>

                            <a href="{{ route('showReviews') }}"
                               class="inline-flex mt-4 items-center gap-1 text-sm font-semibold text-indigo-600 hover:underline">
                                Ver todas as reviews
                            </a>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Nenhuma review feita ainda.
                            </p>
                        @endif
                    </div>
                </div>

                {{-- Último Favorito --}}
                <div class="overflow-hidden rounded-xl bg-white shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                    <div class="p-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/30">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 21l-1-1C5 15 2 12 2 8a4 4 0 018-1 4 4 0 018 1c0 4-3 7-9 12z"/>
                            </svg>
                            Último favorito
                        </h3>
                    </div>

                    <div class="p-6">
                        @if($lastFavorite)
                            <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                {{ $lastFavorite['game_name'] }}
                            </p>

                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Adicionado em {{ \Carbon\Carbon::parse($lastFavorite['created_at'])->format('d/m/Y') }}
                            </p>

                            <a href="{{ route('showFavorites') }}"
                               class="inline-flex mt-4 items-center gap-1 text-sm font-semibold text-indigo-600 hover:underline">
                                Ver favoritos
                            </a>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Nenhum favorito adicionado ainda.
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- CARDÃO DE PESQUISA --}}
            <div class="overflow-hidden rounded-xl bg-white shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                <div class="p-6 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/30">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Pesquisar jogos
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Encontre jogos para avaliar ou favoritar.
                    </p>
                </div>

                <div class="p-6 flex justify-end">
                    <a href="/search"
                       class="inline-flex items-center gap-2 px-8 py-3 rounded-lg bg-indigo-600 text-white font-bold
                              shadow-md hover:bg-indigo-700 hover:shadow-lg transition">
                        Pesquisar
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
