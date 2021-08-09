<div {{ $attributes->merge(['class' => 'mb-8 overflow-hidden rounded w-full']) }}>
    @if($header ?? null)
        <div class="bg-white flex items-center p-4 space-x-2 text-sm">
            {{ $header }}
        </div>
    @endif

    <!-- snippet -->
    <textarea id="snippet-{{ $snippet->id }}" name="snippet">{!! $snippet->snippet !!}</textarea>

    <!-- footer -->
    <div class="bg-white flex items-center p-4 space-x-2 text-sm">
        @if($footer ?? null)
            {{ $footer }}
        @else
            <x-snippet.tags :snippet="$snippet" />
            <!-- gap -->
            <x-gap />
            @if($snippet->anonymous)
                <x-heroicon-o-user-circle class="cursor-not-allowed text-gray-500" />
            @else
                @if($snippet->user && $snippet->user->url !== null)
                    <x-link href="{{ $snippet->user->url }}" target="_blank"><x-heroicon-o-user-circle /></x-link>
                @endif
            @endif
            @if($snippet->direct_url !== null)
                <x-link href="{{ $snippet->direct_url }}" target="_blank"><x-heroicon-o-link /></x-link>
            @endif
        @endif
    </div>
</div>

<script>
    window.CodeMirror.fromTextArea(document.getElementById('snippet-{{ $snippet->id }}'), {
        mode: "{{ $snippet->language }}",
        theme: "{{ $snippet->theme }}",
        highlightMatches: true,
        indentWithTabs: true,
        lineNumbers: false,
        matchBrackets: true,
        readOnly: "{{ $readonly }}",
        styleActiveLine: true,
        styleActiveSelected: true,
        tabSize: 4,
    })
</script>
