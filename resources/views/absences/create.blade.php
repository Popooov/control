<x-layout>
    <x-slot:heading>
      Añadir ausencia
    </x-slot:heading>
    <form method="POST" action="/absences">
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              
              <x-form-field>
                <x-form-label for="fecha">Fecha</x-form-label>
                <div class="mt-2">
                  <x-form-input type="datetime-local" name="fecha" id="fecha" placeholder="fecha" required />
                  <x-form-error name="fecha" />
                </div>
              </x-form-field>
              
              <x-form-field>
                <x-form-label for="motivo">Motivo de ausencia</x-form-label>
                <div class="mt-2">
                  <x-form-input name="motivo" id="motivo" placeholder="motivo" required />
                    <x-form-error name="motivo" />
                </div>
              </x-form-field>
            </div>
          </div>
        </div>
      

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/absences" class="text-sm/6 font-semibold text-gray-700">Cancelar</a>
          <x-form-button>Añadir</x-form-button>
        </div>
      </form>
</x-layout>
