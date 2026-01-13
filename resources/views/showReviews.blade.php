<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Reviews
        </h2>
    </x-slot>

    <div class="mt-8 flex justify-center">
        <div class="w-full max-w-2xl space-y-4">

            @if(session('success'))
                <div class="bg-green-500 text-white p-2 rounded">
                    {{ session('success') }}
                </div>
            @endif
            @forelse($reviewsNameGame as $review)
                <div class="rounded-lg bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700">

                    <!-- Header -->
                    <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                {{ $review['title'] }}
                            </h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Jogo: {{ $review['game_name'] }} • Usuário: {{ $review['user_name'] }}
                            </p>
                        </div>

                        <p class="text-center px-2 py-1 text-sm font-bold rounded-md 
                            bg-indigo-100 text-indigo-700 
                            dark:bg-indigo-900 dark:text-indigo-300">
                            {{ $review['score'] }}/10
                            <br>
                            <a 
                            href="/game/{{ $review['id_game'] }}"
                            class="inline-flex items-center my-2 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            >
                            Ver jogo
                            </a>
                        </p>
                    </div>

                    <!-- Body -->
                    <div class="p-4">
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $review['text'] }}
                        </p>
                    </div>

                </div>
            @empty
                <div class="rounded-lg bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Nenhuma review encontrada.
                    </p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
