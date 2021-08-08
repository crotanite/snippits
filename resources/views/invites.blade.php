<x-layout>
    <div class="mb-4 text-right">
        <a href="{{ route('invites.create') }}">
            <x-button theme="success">{{ __('Generate') }}</x-button>
        </a>
    </div>

    <x-card>
        @foreach($invites as $invite)
            <div>{{ $invite->code }}</div>
        @endforeach
    </x-card>
</x-layout>
