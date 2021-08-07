@php
$classes = 'border-b-2 font-medium inline-flex items-center px-1 text-sm';
$classes .= $active
            ? ' border-blue-400'
            : ' border-transparent';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
