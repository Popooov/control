<x-layout>
    <x-slot:heading>
      Añadir ausencia
    </x-slot:heading>
    <form method="POST" action="/absences">
        @csrf
        <div class="space-y-12">
          <div class="flex flex-col justify-center items-center border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:w-1/2 sm:grid-cols-2 sm:gap-x-8">
              
              <x-form-field>
                <x-form-label for="fecha">Fecha</x-form-label>
                <div class="mt-2">
                  <x-form-input type="date" name="fecha" id="fecha" placeholder="fecha" required />
                  <x-form-error name="fecha" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="hora">Hora</x-form-label>
                <div class="mt-2">
                  <x-form-select :hours="$hours" name="hora" id="hora" placeholder="hora" required />
                  <x-form-error name="hora" />
                </div>
              </x-form-field>
              
              <x-form-field>
                <x-form-label for="motivo">Motivo de ausencia</x-form-label>
                <div class="mt-2">
                  <x-form-input name="motivo" id="motivo" placeholder="motivo" />
                    <x-form-error name="motivo" />
                </div>
              </x-form-field>
            </div>
            <div class="mt-10 flex items-center justify-center gap-x-6">
              <a href="/absences" class="text-sm/6 font-semibold text-gray-700">Cancelar</a>
              <x-form-button>Añadir</x-form-button>
            </div>
          </div>
        </div>

      </form>
</x-layout>
