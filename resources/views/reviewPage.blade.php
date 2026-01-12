
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Avaliar jogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- largura menor e centralizado -->
        <div class="mx-auto max-w-xl sm:px-6">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800">
                <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-100">
                        Envie sua avaliação
                    </h3>
                </div>

                <div class="p-4">
                    <form method="post" class="space-y-4">
                        @csrf
                        <input name="idGame" type="hidden" value={{$idGame}}>
                        <!-- Título -->
                        <div>
                            <label class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">
                                Título
                            </label>
                            <input
                                type="text"
                                name="title"
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600
                                    bg-gray-100 dark:bg-gray-700
                                    px-3 py-2 text-gray-800 dark:text-gray-100
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                    transition"
                                placeholder="Nome da análise"
                            >
                        </div>

                        <!-- Nota -->
                        <div>
                            <label class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">
                                Nota
                            </label>
                            <div class="flex items-center gap-3">
                                <input
                                    type="range"
                                    name="score"
                                    max="10"
                                    min="0"
                                    step="1"
                                    value="5"
                                    class="w-full accent-indigo-600"
                                    oninput="this.nextElementSibling.innerText = this.value"
                                >
                                <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">5</span>
                            </div>
                        </div>

                        <!-- Comentário -->
                        <div>
                            <label class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">
                                Comentário
                            </label>
                            <textarea
                                name="text"
                                rows="4"
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600
                                    bg-gray-100 dark:bg-gray-700
                                    px-3 py-2 text-gray-800 dark:text-gray-100
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                    transition"
                                placeholder="Escreva sua avaliação"
                            ></textarea>
                        </div>

                        <!-- Botão -->
                        <div class="text-center">
                            <input
                                type="submit"
                                value="Avaliar"
                                class="cursor-pointer rounded-md bg-white dark:bg-gray-200 px-6 py-2 
                                    text-gray-800 font-medium shadow-md transition-all duration-200"
                                onmouseover="
                                    this.style.background='#6366f1';
                                    this.style.boxShadow='0 6px 12px rgba(0,0,0,0.2)';
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
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>