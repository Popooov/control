<x-layout>
  <x-slot:heading>
    Ausencias
  </x-slot:heading>
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($absences as $absence)
          <div class="group relative">
            <div class="mt-4 flex justify-between">
              <div>
                <h3 class="text-sm text-gray-700">
                  <a href="/videojuegos/{{ $absence['id'] }}">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $absence['date'] }}
                  </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">{{ $absence['reason'] }}</p>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-900">{{ $videojuego->user->name }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    
    {{ $absences->links() }}
</x-layout>
