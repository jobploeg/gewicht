<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <footer class="sticky top-[100vh]">
        <nav x-data="{ open: false }"
             class="bg-gradient-to-r from-indigo-200 via-red-200 to-yellow-100 border-b border-gray-100 mt-20 w-full block">
            <div class="py-7 sm:ml-6">
                <x-nav-link :href="route('stats')">
                    {{ __('/Statistieken') }}
                </x-nav-link>

                <x-nav-link :href="route('stats')">
                    {{ __('/Profiel') }}
                </x-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('/Uitloggen') }}
                    </x-nav-link>
                </form>

                <div>
                    <header class="max-w-lg mx-auto mb-3">
                        <h2 class="text-l text-black text-center">Job van der Ploeg</h2>
                    </header>
                </div>
                <div>
                    @if(Auth::user()->image)
                        <img class="sm:w-36 sm:w-auto w-36 ml-32 rounded-lg sm:ml-0" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="Rounded avatar">
                    @endif
                </div>

            </div>
        </nav>
    </footer>
</div>
</body>
</html>
