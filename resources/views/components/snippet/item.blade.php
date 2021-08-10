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
            <!-- language and tags -->
            <x-snippet.tags :snippet="$snippet" />
            <!-- gap -->
            <x-gap />
            <!-- view snippet -->
            @if(!request()->routeIs('snippets.show', ['snippet_id' => $snippet->id]))
                <x-link href="{{ route('snippets.show', ['snippet_id' => $snippet->id]) }}">
                    <x-heroicon-o-eye />
                </x-link>
            @endif
            <!-- actions -->
            @if(auth()->check() && auth()->user()->snippets->contains($snippet->id))
                <x-link href="{{ route('snippets.edit', ['snippet_id' => $snippet->id]) }}">
                    <x-heroicon-o-pencil />
                </x-link>
                <x-form.delete action="{{ route('snippets.destroy', ['snippet_id' => $snippet->id]) }}">
                    <x-heroicon-o-trash class="text-red-500" />
                </x-form.delete>
            @endif
            <!-- user -->
            @if(!$snippet->anonymous)
                @if($snippet->user && $snippet->user->url !== null)
                    <x-link href="{{ $snippet->user->url }}" target="_blank"><x-heroicon-o-user-circle /></x-link>
                @endif
                @if($snippet->direct_url !== null)
                    <x-link href="{{ $snippet->direct_url }}" target="_blank"><x-heroicon-o-link /></x-link>
                @endif
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
