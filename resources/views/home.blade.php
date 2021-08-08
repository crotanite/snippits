<x-layout>
    @if($snippets->count() === 0)
        <div class="text-center">
            {{ __('There are no Snippets to display.') }}
        </div>
    @else
        <x-snippets>
            @foreach($snippets as $snippet)
                <x-snippet :snippet="$snippet" />
            @endforeach
        </x-snippets>
    @endif
</x-layout>
