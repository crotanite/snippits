<form method="POST" action="{{ route('snippets.create') }}">
    @csrf

    <x-snippet.item :readonly="false" :snippet="$snippet">
        <x-slot name="header">
            <!-- language -->
            <div>
                <x-form.label for="language">{{ __('Language') }}</x-form.label>
                <x-form.select name="language" @change="document.querySelector('.CodeMirror').CodeMirror.setOption('mode', $event.target.value)">
                    @foreach($languages as $lang)
                        <option value="{{ $lang['code'] }}">{{ $lang['key'] }}</option>
                    @endforeach
                </x-form.select>
            </div>
            <!-- theme -->
            <div>
                <x-form.label for="theme">{{ __('Theme') }}</x-form.label>
                <x-form.select name="theme" @change="document.querySelector('.CodeMirror').CodeMirror.setOption('theme', $event.target.value)">
                    @foreach($themes as $th)
                        <option value="{{ $th['key'] }}">{{ $th['key'] }}</option>
                    @endforeach
                </x-form.select>
            </div>
            <!-- gap -->
            <x-gap />
            <!-- direct url -->
            <div>
                <x-form.label for="url">{{ __('Direct URL') }}</x-form.label>
                <x-form.input name="url" type="url" />
            </div>
            <!-- anonymous -->
            <div>
                <x-form.label for="anonymous">{{ __('Anonymous?') }}</x-form.label>
                <div class="text-center"><x-form.checkbox name="anonymous" /></div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-gap />
            <x-button theme="success">{{ __('Create') }}</x-button>
        </x-slot>
    </x-snippet.item>
</form>
