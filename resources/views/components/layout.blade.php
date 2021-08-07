<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="antialiased bg-gray-200 text-gray-900">
        <!-- topbar -->
        <div class="bg-white h-16 px-8">
            <x-container class="flex h-full space-x-4">
                <!-- navigation -->
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Snippets') }}
                </x-nav-link>
                @auth
                    <x-nav-link :href="route('create')" :active="request()->routeIs('create')">
                        {{ __('Create Snippet') }}
                    </x-nav-link>
                @endauth
                <div class="flex-grow"></div>
                <!-- user -->
                @guest
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('logout')" :active="request()->routeIs('logout')">
                        {{ __('Logout') }}
                    </x-nav-link>
                @endguest
            </x-container>
        </div>

        <main class="p-8">
            <x-container>
                <x-sessions />
                {{ $slot }}
            </x-container>
        </main>

        @livewireScripts

        <script>
            const textareas = document.getElementsByClassName('allow-tab');
            const count = textareas.length;

            for(let i=0; i < count; i++) {
                textareas[i].addEventListener('keydown', function(e) {
                    if (e.key == 'Tab') {
                        e.preventDefault();
                        var start = this.selectionStart;
                        var end = this.selectionEnd;

                        // set textarea value to: text before caret + tab + text after caret
                        this.value = this.value.substring(0, start) +
                        "\t" + this.value.substring(end);

                        // put caret at right position again
                        this.selectionStart =
                        this.selectionEnd = start + 1;
                    }
                });
            }
        </script>
    </body>
</html>
