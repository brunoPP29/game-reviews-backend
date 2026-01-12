<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detalhes do Jogo') }}
            </h2>
            <a href="{{ url()->previous() }}" class="text-sm text-indigo-600 hover:underline">
                &larr; Voltar
            </a>
        </div>
    </x-slot>

    @php
        $gameData = $gameInfos[0]['data']['games'][0] ?? null;
        $developerName = $gameInfos[1] ?? 'N/A';
        $platformName  = $gameInfos[2] ?? 'N/A';
    @endphp

    <div class="py-12">
        <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">

            @if($gameData)
            <!-- Card principal -->
            <div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800 mb-6">

                <!-- Header do jogo -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 text-center space-y-2">
                    <span class="inline-block px-3 py-1 text-xs font-medium rounded-md 
                        bg-indigo-100 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-300">
                        {{ $platformName }}
                    </span>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $gameData['game_title'] }}
                    </h1>

                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        DATABASE_ID: #{{ $gameData['id'] }} • STATUS: SYNCED
                    </p>
                </div>

                <!-- Infos -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase mb-1">
                            Developer
                        </p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            {{ $developerName }}
                        </p>
                    </div>

                    <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase mb-1">
                            Release Date
                        </p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            {{ \Carbon\Carbon::parse($gameData['release_date'])->format('d/m/Y') }}
                        </p>
                    </div>

                </div>

                <!-- Avaliação -->
                <div class="p-6 border-t border-gray-200 dark:border-gray-700 text-center space-y-3">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Pronto para avaliar?
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Sua nota ajuda a construir o maior ranking de games da nossa comunidade.
                    </p>
                    <br>
                    <a
                        href="/avaliar/{{ $gameData['id'] }}"
                        class="px-4 py-2 rounded-md bg-white dark:bg-gray-200
                        text-gray-800 font-medium shadow-md transition-all duration-200"
                        onmouseover="
                            this.style.background='#6366f1';
                            this.style.color='#ffffff';
                            this.style.transform='translateY(-2px)';
                            this.style.boxShadow='0 8px 15px rgba(0,0,0,0.2)';
                        "
                        onmouseout="
                            this.style.background='';
                            this.style.color='';
                            this.style.transform='';
                            this.style.boxShadow='';
                        "
                    >
                        AVALIAR AGORA
                    </a>
                </div>

                <!-- Footer -->
                <div class="mt-3 px-6 py-3 bg-gray-100 dark:bg-gray-900 text-center">
                    <p class="text-[10px] text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                        TheGamesDB API • Powered by Laravel
                    </p>
                </div>

            </div>
            @else
            <div class="p-12 text-center bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <p class="text-gray-500 dark:text-gray-400 uppercase">
                    Data not found
                </p>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
