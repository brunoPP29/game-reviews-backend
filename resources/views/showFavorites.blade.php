<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jogos Favoritados') }}
        </h2>
    </x-slot>

    <div class="mt-8 flex justify-center">
        <div class="w-full max-w-2xl space-y-4">

            @forelse($favorite_data as $fav)
                <div class="rounded-lg bg-white dark:bg-gray-800 shadow-sm 
                            border border-gray-200 dark:border-gray-700">

                    <!-- Header -->
                    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                            {{ $fav['game_name'] }}
                        </h4>
                    </div>

                    <!-- Body -->
                    <div class="p-4 text-xs text-gray-500 dark:text-gray-400">
                        @php
                            $item = $fav['data']->first();
                        @endphp

                        @if($item)
                            <div class="flex justify-between">
                                <span>Favoritado por: {{ $user_name }}</span>
                                <span>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Footer -->
                    <div class="p-4 flex justify-end">
                        <a href="/game/{{ $item->id_game }}"
                           class="inline-flex items-center px-4 py-2 
                                  bg-indigo-600 text-white text-xs font-bold 
                                  rounded-md uppercase tracking-widest 
                                  hover:bg-indigo-700 transition">
                            Ver jogo
                        </a>
                    </div>

                </div>
            @empty
                <div class="rounded-lg bg-white dark:bg-gray-800 shadow-sm 
                            border border-gray-200 dark:border-gray-700 
                            p-6 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Nenhum jogo favoritado ainda.
                    </p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
