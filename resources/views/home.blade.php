<x-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Iniciar sesión</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form method="POST" action="/login">
          @csrf
          <div class="space-y-12">
            
            <div class="grid grid-cols-1 gap-x-6 gap-y-8">
              
              <x-form-field>
                <x-form-label for="email">Correo electrónico</x-form-label>
                <div class="mt-2">
                  <x-form-input name="email" id="email" :value="old('email')" type="email" required />
                    <x-form-error name="email" />
                </div>
              </x-form-field>
              
              <x-form-field>
                <x-form-label for="password">Contraseña</x-form-label>
                <div class="mt-2">
                  <x-form-input name="password" id="password" type="password" required />
                    <x-form-error name="password" />
                </div>
              </x-form-field>
              
            </div>
            
            <div class="mt-6 flex items-center justify-start gap-x-6">
              <x-form-button>Iniciar sesión</x-form-button>
            </div>
  
        </form>
    </div>
</x-layout>