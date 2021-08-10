<x-layout>
    <form method="POST" action="{{ route('snippets.edit', ['snippet_id' => $snippet->id]) }}">
        @csrf
        @method('PATCH')

        <livewire:components.snippet-form-component :snippet="$snippet" />

    </form>
</x-layout>
