<x-snippet.item :readonly="false" :snippet="$snippet">
    <x-slot name="header">
        <!-- language -->
        <div>
            <x-form.label for="language">{{ __('Language') }}</x-form.label>
            <x-form.select name="language" @change="document.querySelector('.CodeMirror').CodeMirror.setOption('mode', $event.target.value)" wire:model="snippet.language">
                @foreach($languages as $lang)
                    <option value="{{ $lang['code'] }}">{{ $lang['key'] }}</option>
                @endforeach
            </x-form.select>
        </div>
        <!-- theme -->
        <div>
            <x-form.label for="theme">{{ __('Theme') }}</x-form.label>
            <x-form.select name="theme" @change="document.querySelector('.CodeMirror').CodeMirror.setOption('theme', $event.target.value)" wire:model="snippet.theme">
                @foreach($themes as $th)
                    <option value="{{ $th['key'] }}">{{ $th['key'] }}</option>
                @endforeach
            </x-form.select>
        </div>
        <!-- gap -->
        <x-gap />
        <!-- direct url -->
        <div>
            <x-form.label for="direct_url">{{ __('Direct URL') }}</x-form.label>
            <x-form.input name="direct_url" type="url" :value="$snippet->direct_url" />
        </div>
        <!-- anonymous -->
        <div>
            <x-form.label for="anonymous">{{ __('Anonymous?') }}</x-form.label>
            <div class="text-center"><x-form.checkbox name="anonymous" :value="$snippet->anonymous" /></div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <!-- tags -->
        <div>
            <x-form.label for="tags">{{ __('Tags') }}</x-form.label>
            <x-form.input name="tags" placeholder="e.g. laravel, array" :value="$snippet->listTags()" />
        </div>
        <x-gap />
        @if(request()->routeIs('snippets.create'))
            <x-button theme="success">{{ __('Create') }}</x-button>
        @else
            <x-button theme="success">{{ __('Save Changes') }}</x-button>
        @endif
    </x-slot>
</x-snippet.item>
