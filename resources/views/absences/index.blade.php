<x-layout>
  <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-2xl lg:px-8">
    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($absences as $absence)
        <li class="gap-x-6 py-5 bg-slate-100">
          <a class="flex justify-between" href="/absences/{{ $absence['id'] }}">
            <div class="flex min-w-0 gap-x-4">
              {{-- <img class="size-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}
              <div class="min-w-0 flex-auto">
                <p class="text-sm/6 font-semibold text-gray-900">{{ $absence->user->first_name }} {{ $absence->user->last_name }}</p>
                <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $absence->user->email }}</p>
              </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
              <p class="text-sm/6 text-gray-900">Hora de ausencia: {{ $absence->hour }}</p>
              <p class="mt-1 text-xs/5 text-gray-500"><time>Fecha de ausencia: {{ $absence->date }}</time></p>
            </div>
          </a>
        @endforeach
        </ul>
    </div>
    
    {{ $absences->links() }}
</x-layout>