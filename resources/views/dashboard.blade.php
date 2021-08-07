<x-layout>
    <div class="grid grid-cols-2 gap-4">
        @foreach($snippets as $snippet)
            <div class="col-span-2 md:col-span-1">
                <pre><x-torchlight-code language="{{ $snippet->language }}" theme="{{ $snippet->theme }}">{!! $snippet->snippet !!}</x-torchlight-code></pre>
            </div>
        @endforeach
    </div>
</x-layout>
