@props(['active' => false])
@php
    $classes = 'block px-2 text-sm text-black-700 hover:bg-blue-500 text-left hover:bg-blue-500 hover:text-white focus:text-white focus:bg-gray-300 leading-6 ';
    if ($active) {
        $classes .= ' bg-blue-500 text-white';
    }
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
