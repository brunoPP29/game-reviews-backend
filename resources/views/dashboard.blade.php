<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Seus jogos avaliados') }}
        </h2>
    </x-slot>

<div class="py-12">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800">
      
      <!-- Header -->
      <div class="flex items-center justify-between p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
          {{ __("Jogos avaliados recentemente") }}
        </h2>

            <a
            href="/review"
            class="inline-flex items-center cursor-pointer
                    rounded-md bg-white px-4 py-2
                    text-md font-medium text-gray-800
                    shadow-md transition-all duration-200"
                    onmouseover="
                            this.style.background='#6366f1';
                            this.style.color='#ffffff';
                            this.style.boxShadow='0 8px 15px rgba(0,0,0,0.2)';
                            this.style.transform='translateY(-2px)';
                        "
                    onmouseout="
                            this.style.background='';
                            this.style.boxShadow='';
                            this.style.transform='';
                            this.style.color='';
                        "
            >
            Joguei um novo Jogo!
            </a>

      </div>

      <!-- Content -->
      <div class="border-t border-gray-200 p-6 dark:border-gray-700">
        
      </div>

    </div>
  </div>
</div>

</x-app-layout>
