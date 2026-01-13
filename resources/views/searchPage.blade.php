<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Avaliar jogo') }}
            </h2>
        </x-slot>

        <div class="py-12">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800">
      
            <!-- Header -->
            <div class="flex items-center justify-between px-6 pt-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                {{ __("Pesquise o jogo que quer avaliar") }}

            </h2>
            
        </div>
        
        <!-- Content -->
        <form method="post" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md max-w-full space-y-4">                                   
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Título</label>
                        <input
                            type="text"
                            name="search"
                            class="w-full rounded-md border border-gray-300 dark:border-gray-600
                                bg-gray-100 dark:bg-gray-700
                                px-3 py-2 text-gray-800 dark:text-gray-100
                                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                transition, mb-6"
                            placeholder="Digite o título do jogo"
                        >
                    </div>

                    <input name="page" type="hidden" value="1">

                        <input
                            type="submit"
                            value="Buscar"
                            class="cursor-pointer rounded-md bg-white px-6 py-2 
                                text-gray-800 font-medium shadow-md transition-all duration-200
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
        </div>
        </div>
</x-app-layout>