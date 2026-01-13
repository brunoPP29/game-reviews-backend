<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Avaliar jogo') }}
        </h2>
    </x-slot>

    @php
    $uniqueGames = collect($data['data']['games'])
        ->sortBy(function ($game) {
            return $game['release_date'] ?? '9999-12-31';
        })
        ->unique(function ($game) {
            return strtolower(trim($game['game_title']));
        })
        ->values();
    @endphp

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Card Principal: Busca -->
            <div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800 mb-6">
                <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        {{ __("Pesquise o jogo que quer avaliar") }}
                    </h2>
                </div>
                
                <div class="p-6">
                    <form method="POST" class="max-w-full space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Título</label>
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600
                                    bg-gray-100 dark:bg-gray-700
                                    px-3 py-2 text-gray-800 dark:text-gray-100
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                    transition mb-6"
                                placeholder="Digite o título do jogo"
                            >
                        </div>
                        <input name="page" type="hidden" value="1">

                        <input
                            type="submit"
                            value="Buscar"
                            class="cursor-pointer rounded-md bg-white dark:bg-gray-200 px-6 py-2 
                                text-gray-800 font-medium shadow-md transition-all duration-200 w-full sm:w-auto
                            "
                            onmouseover="
                                this.style.background='#6366f1';
                                this.style.boxShadow='0 8px 15px rgba(0,0,0,0.2)';
                                this.style.transform='translateY(-2px)';
                                this.style.color='#ffffff';
                            "
                            onmouseout="
                                this.style.background='';
                                this.style.boxShadow='';
                                this.style.transform='';
                                this.style.color='#111827';
                            "
                        >
                    </form>
                </div>
            </div>

            <!-- Card de Resultados -->
            {{-- Acessando o caminho correto: $data['data']['games'] --}}
            @if(isset($uniqueGames) && count($uniqueGames) > 0)
            <div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800">

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($uniqueGames as $game)
                        <div class="flex items-center justify-between p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-[#6366f1] dark:hover:bg-gray-700/50 transition-colors">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $game['game_title'] }}
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    Lançamento: {{ isset($game['release_date']) ? \Carbon\Carbon::parse($game['release_date'])->format('d/m/Y') : 'N/A' }}
                                </span>
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <a
                                    href="/game/{{ $game['id'] }}"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Avaliar') }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Paginação e Status -->
                    @if(isset($data['pages']))
                    <div class="mt-8 flex items-center justify-between">
                        <div>
                            {{-- Se não for a página 1, pode voltar --}}
                            @if($page > 1)
                                <form method="POST" action="{{ route('searchByName') }}">
                                    @csrf
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <input type="hidden" name="page" value="{{ $page - 1 }}">
                                    <button type="submit" class="text-sm text-indigo-600 hover:underline">
                                        &larr; Anterior
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="text-xs text-gray-500">
                            Página: {{ $page }}
                        </div>

                        <div>
                            {{-- Se a API indicou que tem uma próxima página, pode avançar --}}
                        @if(isset($data['pages']['next']))
                            <form method="POST" action="{{ route('searchByName') }}">
                                @csrf
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <input type="hidden" name="page" value="{{ $page + 1 }}">
                                <button type="submit" class="text-sm text-indigo-600 hover:underline">
                                    Próxima &rarr;
                                </button>
                            </form>
                        @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @elseif(request('search'))
            <div class="p-12 text-center bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <p class="text-gray-500 dark:text-gray-400">{{ __("Nenhum jogo encontrado para sua busca.") }}</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
