<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/codemirror.min.css" integrity="sha512-xIf9AdJauwKIVtrVRZ0i4nHP61Ogx9fSRAkCLecmE2dL/U8ioWpDvFCAy4dcfecN72HHB9+7FfQj3aiO68aaaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/theme/nord.min.css" integrity="sha512-sPc4jmw78pt6HyMiyrEt3QgURcNRk091l3dZ9M309x4wM2QwnCI7bUtsLnnWXqwBMECE5YZTqV6qCDwmC2FMVA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/codemirror.min.js" integrity="sha512-6Q5cHfb86ZJ3qWx47Pw7P5CN1/pXcBMmz3G0bXLIQ67wOtRF7brCaK5QQLPz2CWLBqjWRNH+/bV5MwwWxFGxww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
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
            <br>
            {{ __('Syntax Highlighting by') }} <x-link href="https://torchlight.dev/" target="_blank">Torchlight</x-link>
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

            const snippets = document.getElementsByClassName('snippet')
            for (let i = 0; i < snippets.length; i++) {
                CodeMirror.fromTextArea(snippets[i], {
                    theme: "nord",
                    highlightMatches: true,
                    indentWithTabs: true,
                    lineNumbers: false,
                    matchBrackets: true,
                    readOnly: "nocursor",
                    styleActiveLine: true,
                    styleActiveSelected: true,
                    tabSize: 4,
                });
            }
        </script>
    </body>
</html>
