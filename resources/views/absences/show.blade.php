<x-layout>
  <div class="bg-white">
    <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Fecha de ausencia: {{ $absence->date }}</h2>
        <p class="text-sm/6 font-semibold text-gray-900">{{ $absence->user->first_name }} {{ $absence->user->last_name }}</p>
        <p class="mt-1 truncate text-xs/5 text-gray-500">Departamento: {{ $absence->user->department }}</p>
        <p class="mt-1 text-xs/5 text-gray-500"><time>creada: {{ $absence->created_at }}</time></p>
        <p class="mt-4 text-gray-900">Motivo de ausencia: </p>
        <p class="mt-4 text-gray-500">{{ $absence->comment }}</p>
        
        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Hora de ausencia:</dt>
            <dd class="mt-2 text-sm text-gray-500">{{ $absence->hour }}</dd>
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
