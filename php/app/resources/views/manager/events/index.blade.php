<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('本日以降のイベント一覧') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <section class="text-gray-600 body-font">
          <div class="container px-5 py-4 mx-auto">

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
            </div>
            @endif

            <div class="flex justify-between">
              <button
                class="flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded mb-4"
                onclick="location.href='{{ route('events.past') }}'">過去のイベント一覧</button>
              <button
                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded mb-4"
                onclick="location.href='{{ route('events.create') }}'">新規登録</button>
            </div>
            <div class="w-full mx-auto overflow-auto">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th
                      class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                      イベント名</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時
                    </th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                      終了日時</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">定員
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">表示・非表示
                    </th>
                    <th
                      class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($events as $event)
                  <tr>
                    <td class="px-4 py-3 text-blue-500 cursor-pointer">
                      <a href="{{ route('events.show',['event' => $event->id]) }}">{{ $event->name }}</a>
                    </td>
                    <td class="px-4 py-3">{{ $event->start_date }}</td>
                    <td class="px-4 py-3">{{ $event->end_date }}</td>
                    <td class="px-4 py-3">
                      @if (is_null($event->number_of_people))
                      0
                      @else
                      {{ $event->number_of_people }}
                      @endif
                    </td>
                    <td class="px-4 py-3">{{ $event->max_people }}</td>
                    <td class="px-4 py-3">{{ $event->is_visible }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $events->links() }}
            </div>
            <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">

            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</x-app-layout>