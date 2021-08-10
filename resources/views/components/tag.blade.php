<div {{ $attributes->merge(['class' => "px-2 py-1 rounded text-xs {$applyTheme()}"]) }}>
    {{ $slot }}
</div>
