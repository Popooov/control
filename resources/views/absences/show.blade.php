<x-layout>
    <x-slot:heading>
        Ausencia
    </x-slot:heading>
    <div class="bg-white">
      <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
        <div>
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $absence->date }}</h2>
          <p class="mt-4 text-gray-500">{{ $absence->reason }}</p>
          
          <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
            <div class="border-t border-gray-200 pt-4">
              <dt class="font-medium text-gray-900">Genero</dt>
              <dd class="mt-2 text-sm text-gray-500">{{ $absence->genero }}</dd>
            </div>
          </dl>
        </div>   
        @can('edit', $absence)
          <div>
            <x-button href="/absences/{{ $absence->id }}/edit">Editar ausencia</x-button>
          </div>
        @endcan
      </div>

    </div>
</x-layout>
