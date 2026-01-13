<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                {{ __('Detalhes do Jogo') }}
            </h2>
            <a href="{{ url()->previous() }}" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center gap-1 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Voltar
            </a>
        </div>
    </x-slot>

    @php
        $gameData = $gameInfos[0]['data']['games'][0] ?? null;
        $developerName = $gameInfos[1] ?? 'N/A';
        $platformName  = $gameInfos[2] ?? 'N/A';
    @endphp

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">

            @if($gameData)
            <div class="overflow-hidden rounded-xl bg-white shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                
                <div class="bg-gradient-to-br from-indigo-50 to-white dark:from-gray-700 dark:to-gray-800 p-8 text-center border-b border-gray-200 dark:border-gray-700">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full bg-indigo-600 text-white shadow-sm mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        {{ $platformName }}
                    </span>
                    
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-gray-100 tracking-tight mb-2">
                        {{ $gameData['game_title'] }}
                    </h1>
                    <p class="text-xs font-mono text-gray-400 dark:text-gray-500">
                        ID: #{{ $gameData['id'] }}
                    </p>
                </div>

                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-700/50 border border-gray-100 dark:border-gray-600 flex items-start gap-4">
                        <div class="p-2 bg-white dark:bg-gray-800 rounded-md shadow-sm text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">Desenvolvedora</p>
                            <p class="text-lg font-bold text-gray-800 dark:text-gray-100">{{ $developerName }}</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-700/50 border border-gray-100 dark:border-gray-600 flex items-start gap-4">
                        <div class="p-2 bg-white dark:bg-gray-800 rounded-md shadow-sm text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">Data de Lançamento</p>
                            <p class="text-lg font-bold text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($gameData['release_date'])->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-indigo-50 dark:bg-gray-900/50 text-center border-t border-indigo-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Já jogou este título?</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">Deixe sua opinião e ajude a comunidade a descobrir os melhores jogos.</p>
                    
                    <a href="/avaliar/{{ $gameData['id'] }}" 
                       class="inline-flex items-center gap-2 px-8 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-lg hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        AVALIAR AGORA
                    </a>
                </div>
            </div>
            @else
            <div class="p-12 text-center bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-red-100">
                <p class="text-gray-500 font-medium">Dados do jogo não encontrados.</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>