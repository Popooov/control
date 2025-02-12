<x-layout>
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Editar ausencia</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form method="POST" action="/absences/{{ $absence->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
              <x-form-field>
                <x-form-label for="date">Fecha</x-form-label>
                <div class="mt-2">
                  <x-form-input type="date" name="date" id="date" placeholder="Fecha" required />
                  <x-form-error name="date" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="hour">Hora</x-form-label>
                <div class="mt-2">
                  <x-form-select :items="$hours" name="hour" id="hour" placeholder="hora" required />
                  <x-form-error name="hour" />
                </div>
              </x-form-field>
                
              <x-form-field>
                <x-form-label for="comment">Motivo de ausencia</x-form-label>
                <div class="mt-2">
                  <x-form-input value="{{ $absence->comment }}" name="comment" id="comment" placeholder="motivo" />
                    <x-form-error name="comment" />
                </div>
              </x-form-field>
          </div>
      
        <div class="mt-6 flex items-center justify-between gap-x-6">
            @can('delete', $absence)
              <button form="delete-form" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Eliminar</button>
            @endcan
            <div></div>
            <div class="flex items-center justify-end gap-x-6">
                <a href="/absences/{{ $absence->id }}" class="text-sm/6 font-semibold text-gray-700">Cancelar</a>
                <x-form-button>Guardar</x-form-button>
            </div>
        </div>
        
      </form>
      
      <form method="POST" action="/absences/{{ $absence->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
      </form>
  </div>
</x-layout>
