<button {{ $attributes->merge(['class' => "font-bold px-4 py-2 rounded text-xs tracking-wide uppercase {$applyTheme()}"]) }}>
    {{ $slot }}
</button>
