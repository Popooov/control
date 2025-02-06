<x-layout>
    <x-slot:heading>
        Editar ausencia
    </x-slot:heading>
    <form method="POST" action="/absences/{{ $absence->id }}">

        @csrf
        @method('PATCH')

        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="reason" class="block text-sm/6 font-medium text-gray-900">Motivo</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input
                        type="text"
                        name="reason"
                        id="reason"
                        class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                        required
                        placeholder="motivo de ausencia"
                        value="{{ $absence->reason }}"
                    >
                  </div>

                  @error('reason')
                    <p class="text-xs text-red-600 font-semibold mt-1">{{ $message }}</p>
                  @enderror

                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="fecha" class="block text-sm/6 font-medium text-gray-900">Fecha</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input
                    type="text"
                    name="fecha"
                    id="fecha"
                    class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                    required
                    placeholder="fecha"
                    value="{{ $absence->date }}"
                >
                  </div>

                  @error('fecha')
                    <p class="text-xs text-red-600 font-semibold mt-1">{{ $message }}</p>
                  @enderror

                </div>
              </div>
          </div>
        </div>
      
        
        <div class="mt-6 flex items-center justify-between gap-x-6">
            @can('delete')
              <button form="delete-form" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Eliminar</button>
            @endcan
            <div></div>
            <div class="flex items-center justify-end gap-x-6">
                <a href="/absences/{{ $absence->id }}" class="text-sm/6 font-semibold text-gray-700">Cancelar</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
            </div>
        </div>
        
      </form>
      
      <form method="POST" action="/{{ $absence->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
      </form>
</x-layout>
