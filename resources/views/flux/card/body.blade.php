@props([
    'padding' => true,
])

@php
    $classes = Flux::classes([
        'p-6' => $padding,
    ]);
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>