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
                <x-form-label for="date">Fecha</x-form-label>
                <div class="mt-2">
                  <x-form-input type="date" name="date" id="date" placeholder="fecha" required />
                  <x-form-error name="date" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="hour">Hora</x-form-label>
                <div class="mt-2">
                  <x-form-select :hours="$hours" name="hour" id="hour" placeholder="hora" required />
                  <x-form-error name="hour" />
                </div>
              </x-form-field>
              
              <x-form-field>
                <x-form-label for="comment">Motivo de ausencia</x-form-label>
                <div class="mt-2">
                  <x-form-input name="comment" id="comment" placeholder="motivo" />
                    <x-form-error name="comment" />
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
