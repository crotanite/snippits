<x-layout>
    <div class="grid grid-cols-2 gap-4">
        @if($snippets->count() === 0)
            <div class="col-span-2 text-center">
                {{ __('There are no Snippets to display.') }}
            </div>
        @else
            @foreach($snippets as $snippet)
                <x-snippet :snippet="$snippet">
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
        @endif
    </div>
</x-layout>
