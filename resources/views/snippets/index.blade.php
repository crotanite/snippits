<x-layout>
    @if($snippets->count() === 0)
        <div class="text-center">
            {{ __('There are no Snippets to display.') }}
        </div>
    @else
        <x-snippets>
            @foreach($snippets as $snippet)
                <x-snippet class="grid-item md:w-masonry" :snippet="$snippet">
                    <!-- gap -->
                    <div class="flex-grow"></div>
                    <!-- options -->
                    <div>
                        <x-form.delete action="{{ route('snippets.destroy', ['snippet_id' => $snippet->id]) }}">
                            <x-heroicon-o-trash class="text-red-500" />
                        </x-form.delete>
                    </div>
                </x-snippet>
            @endforeach
        </x-snippets>
    @endif
</x-layout>
