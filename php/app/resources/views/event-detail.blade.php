<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('イベント詳細') }}
    </h2>
  </x-slot>

  <div class="pt-4 pb-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="max-w-2xl mx-auto py-4">
          <x-jet-validation-errors class="mb-4" />

          @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
          </div>
          @endif

          <form method="POST" action="{{ route('events.reserve', ['id' => $event->id]) }}">
            @csrf
            <div>
              <x-jet-label for="event_name" value="{{ __('イベント名') }}" />
              {{$event->name}}
            </div>

            <div class="mt-4">
              <x-jet-label for="information" value="{{ __('イベント詳細') }}" />
              {!! nl2br(e($event->information)) !!}
            </div>

            <div class="md:flex justify-between">
              <div class="mt-4">
                <x-jet-label for="event_date" value="{{ __('日付') }}" />
                {{ $event->eventDate }}
              </div>

              <div class="mt-4">
                <x-jet-label for="start_time" value="{{ __('開始時間') }}" />
                {{ $event->startTime }}
              </div>

              <div class="mt-4">
                <x-jet-label for="end_time" value="{{ __('終了時間') }}" />
                {{ $event->endTime }}
              </div>
              <div class="md:flex justify-between items-end"></div>
            </div>
            <div class="flex items-center justify-end mt-4">
              <div class="mt-4">
                @if ($reservablePeople <= 0) <span class="text-red-500">このイベントは満員です。</span>
                  @else
                  <x-jet-label for="reservable_people" value="{{ __('予約人数') }}" />
                  <select name="reservable_people">
                    @for ($i = 1; $i <= $reservablePeople; $i++) <option value="{{$i}}">{{$i}}</option>
                      @endfor
                  </select>
                  @endif
              </div>
              @if ($isReserved === null)
              <input type="hidden" name="id" value="{{ $event->id }}">
              @if ($reservablePeople > 0)
              <x-jet-button class="ml-4">
                予約する
              </x-jet-button>
              @endif
              @else
              <span class="text-sm">このイベントは既に予約済みです。</span>
              @endif
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>


</x-app-layout>