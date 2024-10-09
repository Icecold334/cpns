<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/5fd2369345.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css"> --}}
    <link rel="stylesheet"
        href="https://gistcdn.githack.com/mfd/09b70eb47474836f25a21660282ce0fd/raw/e06a670afcb2b861ed2ac4a1ef752d062ef6b46b/Gilroy.css">
</head>

<body>
    <x-navbar />
    @if (!request()->routeIs('play'))
        <x-sidebar />
    @endif
    <div class="p-4 {{ request()->routeIs('play') ? '' : 'sm:ml-64' }}">
        <div class="p-4  mt-14">
            {{ $slot }}
        </div>
    </div>
    @stack('html')
</body>
@session('title')
    <x-alert title="{{ session('title') }}" message="{{ session('message') }}" icon="{{ session('icon') }}"></x-alert>
@endsession
@stack('scripts')

</html>
