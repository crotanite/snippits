<x-form.fieldset>
    <!-- language -->
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2 md:col-span-1">
            <x-form.label for="language">{{ __('Language') }}</x-form.label>
            <x-form.select name="language" wire:model="language">
                @foreach($languages as $lang)
                    <option value="{{ $lang['language'] }}">{{ $lang['language'] }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div class="col-span-2 md:col-span-1">
            <x-form.label for="theme">{{ __('Theme') }}</x-form.label>
            <x-form.select name="theme" wire:model="theme">
                @foreach($themes as $th)
                    <option value="{{ $th['key'] }}">{{ $th['name'] }}</option>
                @endforeach
            </x-form.select>
        </div>
    </div>

    <!-- snippet -->
    <div>
        <x-form.label for="snippet">{{ __('Snippet') }}</x-form.label>
        @if($preview)
            <pre><x-torchlight-code language="{{ $language }}" name="preview" theme="{{ $theme }}">{!! $snippet !!}</x-torchlight-code></pre>
        @else
            <pre><code class="language-html">{!! $snippet !!}<div></code></pre>
            <x-form.textarea id="demotext" name="snippet" rows="5" wire:model="snippet" />
        @endif
    </div>
</x-form.fieldset>

<script type="text/javascript">
    var editor = CodeMirror.fromTextArea(document.getElementById("demotext"), {
        lineNumbers: true,
        mode: "javascript",
        theme: "nord"
    });
</script>
