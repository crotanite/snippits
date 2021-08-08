<x-layout>
    <div class="grid grid-cols-2 gap-4">
        @if($snippets->count() === 0)
            <div class="col-span-2 text-center">
                {{ __('There are no Snippets to display.') }}
            </div>
        @else
            @foreach($snippets as $snippet)
                <x-snippet :snippet="$snippet" />
            @endforeach
        @endif
    </div>
</x-layout>
