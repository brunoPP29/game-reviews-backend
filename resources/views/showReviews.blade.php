<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Reviews
        </h2>
    </x-slot>

    <div class="mt-8 flex justify-center">
        <div class="w-full max-w-2xl space-y-4">

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

                        <span class="px-2 py-1 text-xs font-bold rounded-md 
                            bg-indigo-100 text-indigo-700 
                            dark:bg-indigo-900 dark:text-indigo-300">
                            {{ $review['score'] }}/10
                        </span>
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
