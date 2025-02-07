<x-layout>
    <x-slot:heading>
      Registrarse
    </x-slot:heading>
    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <x-form-field>
                <x-form-label for="first_name">Nombre</x-form-label>
                <div class="mt-2">
                  <x-form-input name="first_name" id="first_name" required />
                  <x-form-error name="first_name" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="last_name">Apelldios</x-form-label>
                <div class="mt-2">
                  <x-form-input name="last_name" id="last_name" required />
                  <x-form-error name="last_name" />
                </div>
              </x-form-field>
              
              <x-form-field>
                <x-form-label for="email">Correo electrónico</x-form-label>
                <div class="mt-2">
                  <x-form-input name="email" id="email" type="email" required />
                  <x-form-error name="email" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="department_id">Departamento</x-form-label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <select class="rounded-md block min-w-0 grow py-2.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <x-form-error name="department_id" />
                </div>
              </x-form-field>
              
              <x-form-field>
                <x-form-label for="password">Contraseña</x-form-label>
                <div class="mt-2">
                  <x-form-input name="password" id="password" type="password" required />
                  <x-form-error name="password" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="password_confirmation">Confirmar contraseña</x-form-label>
                <div class="mt-2">
                  <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />
                  <x-form-error name="password_confirmation" />
                </div>
              </x-form-field>

          </div>
        </div>
      

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/" class="text-sm/6 font-semibold text-gray-700">Cancelar</a>
          <x-form-button>Registrarse</x-form-button>
        </div>
      </form>
</x-layout>
