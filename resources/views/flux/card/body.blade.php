@props([
    'padding' => true,
])

@php
    $classes = Flux::classes([
        'p-0' => $padding,
    ]);
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>