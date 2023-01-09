<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @livewireStyles
  <title>Document</title>
</head>

<body>
  LiveWireテスト
  {{--
  <livewire:counter /> --}}
  <div>
    @if (session()->has('message'))
    <div class="">
      {{ session('message') }}
    </div>
    @endif
  </div>

  @livewire('counter')

  @livewireScripts
</body>

</html>