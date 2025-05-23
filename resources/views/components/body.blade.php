<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script type="importmap">
    {
        "imports": {
            "https://esm.sh/v135/prosemirror-model@1.22.3/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.19.3/es2022/prosemirror-model.mjs", 
            "https://esm.sh/v135/prosemirror-model@1.22.1/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.19.3/es2022/prosemirror-model.mjs"
        }
    }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/5fd2369345.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css"> --}}
    <link rel="stylesheet"
        href="https://gistcdn.githack.com/mfd/09b70eb47474836f25a21660282ce0fd/raw/e06a670afcb2b861ed2ac4a1ef752d062ef6b46b/Gilroy.css">

</head>

<body
    class="{{ request()->routeIs('play') && collect(json_decode($paket, true))->get('flat') == 0 ? 'bg-gradient-to-b from-gray-400  to-gray-300' : '' }} min-h-svh ">
    @if (!request()->routeIs('play'))
        <x-navbar />
        <x-sidebar />
    @elseif(collect(json_decode($paket, true))->get('flat') == 1)
        <x-navbar />
    @endif

    <div
        class="max-w-screen-2xl {{ request()->routeIs('play') ? ($paket && collect(json_decode($paket, true))->get('flat') == 1 ? 'p-8 mt-14' : '') : 'sm:ml-64 p-8 mt-14' }}">
        {{-- <div class="p-4  "> --}}
        {{ $slot }}
        {{-- </div> --}}
    </div>
    @stack('html')
</body>
@session('title')
    <x-alert title="{{ session('title') }}" message="{{ session('message') }}" icon="{{ session('icon') }}"></x-alert>
@endsession
@stack('scripts')

</html>
