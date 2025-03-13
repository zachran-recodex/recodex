@props([
    'padding' => true,
])

@php
    $classes = Flux::classes([
        'p-4' => $padding,
    ]);
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>