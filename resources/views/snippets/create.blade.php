<x-layout>
    <form method="POST" action="{{ route('snippets.create') }}">
        @csrf

        <livewire:components.snippet-form-component :snippet="$snippet" />

    </form>
</x-layout>
