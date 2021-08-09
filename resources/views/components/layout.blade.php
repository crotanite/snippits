<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <!-- custom styles -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ mix('/js/alpine.js') }}"></script>
        <!-- livewire -->
        @livewireStyles
    </head>
    <body class="antialiased bg-gray-200 flex flex-col min-h-screen text-gray-900">
        <!-- topbar -->
        <div class="bg-white h-16 px-8">
            <x-container class="flex h-full space-x-4">
                <!-- navigation -->
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Snippets') }}
                </x-nav-link>
                @auth
                    <x-nav-link :href="route('snippets.create')" :active="request()->routeIs('snippets.create')">
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
                    <x-nav-link :href="route('snippets.index')" :active="request()->routeIs('snippets.index')">
                        {{ __('My Snippets') }}
                    </x-nav-link>
                    <x-nav-link :href="route('invites.index')" :active="request()->routeIs('invites.index')">
                        {{ __('Invites') }}
                    </x-nav-link>
                    <x-nav-link :href="route('logout')" :active="request()->routeIs('logout')">
                        {{ __('Logout') }}
                    </x-nav-link>
                @endguest
            </x-container>
        </div>

        <main class="flex-grow p-8">
            <x-container>
                <x-sessions />
                {{ $slot }}
            </x-container>
        </main>

        <footer class="bg-white py-4 text-center text-sm">
            <strong>{{ __('Created by') }} <x-link href="https://paigejones.me/" target="_blank">paigejones.me</x-link></strong>
        </footer>

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
