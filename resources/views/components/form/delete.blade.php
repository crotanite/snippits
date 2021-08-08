<form method="POST" action="{{ $action }}">
    @csrf
    @method('DELETE')

    <button onclick="return confirm('{{ $confirm }}');">
        {{ $slot }}
    </button>
</form>
