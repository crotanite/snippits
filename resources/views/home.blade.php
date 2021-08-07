<x-layout>
    <div class="grid grid-cols-2 gap-4">
        @foreach($snippets as $snippet)
            <div class="col-span-2 md:col-span-1">
                <pre class="rounded-b-none"><x-torchlight-code language="{{ $snippet->language }}" theme="{{ $snippet->theme }}">{!! $snippet->snippet !!}</x-torchlight-code></pre>
                <div class="bg-white p-4 rounded-b">
                    <div class="flex justify-end space-x-2 text-sm">
                        @if($snippet->anonymous)
                            <x-heroicon-o-user-circle class="text-gray-500" />
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
            </div>
        @endforeach
    </div>
</x-layout>
