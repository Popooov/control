<x-layout>
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Añadir ausencia</h2>
  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form method="POST" action="/absences">
        @csrf
        <div class="space-y-12">
          <div class="flex flex-col justify-center">
            <div class="mt-10 grid gap-x-6 gap-y-8 sm:gap-x-8">
              
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
                  <x-form-select :items="$hours" name="hour" id="hour" placeholder="hora" required />
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
          </div>
          <div class="mt-2 flex flex-col items-center justify-start gap-x-6">
            <x-form-button>Añadir</x-form-button>
            <a href="/absences" class="mt-5 text-sm/6 font-semibold text-gray-700">Cancelar</a>
          </div>
        </div>

      </form>
  </div>
</x-layout>
