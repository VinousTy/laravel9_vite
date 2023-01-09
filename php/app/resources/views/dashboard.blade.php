<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('イベントカレンダー') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="event-calender mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
          {{ session('status') }}
        </div>
        @endif
        @livewire('calender')
      </div>
    </div>
  </div>
</x-app-layout>