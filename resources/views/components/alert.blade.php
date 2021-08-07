<div {{ $attributes->merge(['class' => "mb-8 px-8 py-4 rounded text-sm {$applyTheme()}"]) }}>
    {{ $slot }}
</div>
