<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            {{ __('Buscar Jogos') }}
        </h2>
    </x-slot>

    @php
    $uniqueGames = collect($data['data']['games'] ?? [])
        ->sortBy(function ($game) { return $game['release_date'] ?? '9999-12-31'; })
        ->unique(function ($game) { return strtolower(trim($game['game_title'])); })
        ->values();
    @endphp

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8 space-y-6">
            
            <div class="overflow-hidden rounded-xl bg-white shadow-sm dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                <div class="p-6">
                    <form method="POST" class="flex flex-col sm:flex-row gap-4 items-end">
                        @csrf
                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                Pesquisar Título
                            </label>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                class="pl-2 w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm"
                                placeholder="Ex: The Legend of Zelda...">
                        </div>
                        <input name="page" type="hidden" value="1">

                        <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            Buscar
                        </button>
                    </form>
                </div>
            </div>

            @if(isset($uniqueGames) && count($uniqueGames) > 0)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                            Resultados Encontrados
                        </h3>
                    </div>

                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach($uniqueGames as $game)
                        <div class="p-4 hover:bg-indigo-50 dark:hover:bg-gray-700/50 transition-colors flex flex-col sm:flex-row items-center justify-between gap-4 group">
                            <div class="flex items-center gap-4 w-full sm:w-auto">
                                <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-full text-indigo-600 dark:text-indigo-400 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 dark:text-gray-100 text-lg">{{ $game['game_title'] }}</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                        Lançamento: {{ isset($game['release_date']) ? \Carbon\Carbon::parse($game['release_date'])->format('d/m/Y') : 'N/A' }}
                                    </p>
                                </div>
                            </div>
                            
                            <a href="/game/{{ $game['id'] }}" class="w-full sm:w-auto px-5 py-2 bg-white border border-indigo-200 text-indigo-600 font-semibold rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-200 shadow-sm flex items-center justify-center gap-2">
                                Avaliar
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </a>
                        </div>
                        @endforeach
                    </div>

                    @if(isset($data['pages']))
                    <div class="bg-gray-50 dark:bg-gray-900/50 p-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700">
                        @if($page > 1)
                            <form method="POST" action="{{ route('searchByName') }}">
                                @csrf
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <input type="hidden" name="page" value="{{ $page - 1 }}">
                                <button type="submit" class="flex items-center gap-1 text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                                    Anterior
                                </button>
                            </form>
                        @else
                            <span></span>
                        @endif

                        <span class="text-xs font-bold text-gray-500 bg-white dark:bg-gray-800 px-3 py-1 rounded-full border dark:border-gray-600">Página {{ $page }}</span>

                        @if(isset($data['pages']['next']))
                            <form method="POST" action="{{ route('searchByName') }}">
                                @csrf
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <input type="hidden" name="page" value="{{ $page + 1 }}">
                                <button type="submit" class="flex items-center gap-1 text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                                    Próxima
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                </button>
                            </form>
                        @endif
                    </div>
                    @endif
                </div>
            @elseif(request('search'))
                <div class="flex flex-col items-center justify-center p-12 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">Nenhum jogo encontrado.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>