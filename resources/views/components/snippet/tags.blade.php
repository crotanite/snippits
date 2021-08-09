<!-- language -->
<x-tag style="background-color:{{ $snippet->lang->bg_color }}; text-color: {{ $snippet->lang->text_color }}">
    {{ $snippet->lang->key }}
</x-tag>

<!-- tagging -->
@foreach($snippet->tagging as $tag)
    <x-tag style="background-color: {{ $tag->bg_color }}; text-color: {{ $tag->text_color }}">
        {{ $tag->tag }}
    </x-tag>
@endforeach
