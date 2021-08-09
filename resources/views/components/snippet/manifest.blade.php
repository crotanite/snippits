<div>
    <div class="flex mb-4 space-x-4">
        <!-- language -->
        <div>
            <x-form.label for="language">{{ __('Language') }}</x-form.label>
            <x-form.select name="language" wire:model="language">
                <option value="">{{ __('Any') }}</option>
                @foreach($languages as $lang)
                    <option value="{{ $lang['code'] }}">{{ $lang['key'] }}</option>
                @endforeach
            </x-form.select>
        </div>
        <!-- theme -->
        <div>
            <x-form.label for="theme">{{ __('Theme') }}</x-form.label>
            <x-form.select name="theme" wire:model="theme">
                <option value="">{{ __('Any') }}</option>
                @foreach($themes as $theme)
                    <option value="{{ $theme['key'] }}">{{ $theme['key'] }}</option>
                @endforeach
            </x-form.select>
        </div>
        <x-gap />
    </div>

    @if($sortedSnippets->count() === 0)
        <div class="text-center text-gray-500">
            {{ __('There are no snippets to display.') }}
        </div>
    @else
        <div data-masonry='{ "gutter": ".gutter-sizer", "itemSelector": ".grid-item", "percentPosition": true }'>
            <div class="gutter-sizer md:w-gutter"></div>

            @foreach($sortedSnippets as $snippet)
                <x-snippet.item class="grid-item md:w-masonry" :snippet="$snippet" />
            @endforeach
        </div>
    @endif
</div>
