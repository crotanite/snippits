<div {{ $attributes->merge(['class' => 'grid-item mb-8 overflow-hidden rounded w-full md:w-masonry']) }}>
    @if($slot->toHtml() !== '')
        <div class="bg-white flex items-center p-4 space-x-2 text-sm">
            {{ $slot }}
        </div>
    @endif
    <!-- snippet -->
    <textarea class="snippet">{!! $snippet->snippet !!}</textarea>

    <!-- description -->
    <div class="bg-white flex items-center p-4 space-x-2 text-sm">
        <!-- tags -->
        <div class="flex space-x-1">
            <!-- language -->
            <x-tag style="background-color:{{ $snippet->lang->bg_color }}; text-color: {{ $snippet->lang->text_color }}">
                {{ $snippet->lang->language }}
            </x-tag>
            <!-- tagging -->
            @foreach($snippet->tagging as $tag)
                <x-tag style="background-color: {{ $tag->bg_color }}; text-color: {{ $tag->text_color }}">
                    {{ $tag->tag }}
                </x-tag>
            @endforeach
        </div>
        <!-- gap -->
        <div class="flex-grow"></div>
        <!-- links -->
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
    </div>
</div>
