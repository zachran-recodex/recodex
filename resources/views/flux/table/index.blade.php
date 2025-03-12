@props([
    'striped' => false,
    'hover' => true,
    'bordered' => false,
    'compact' => false,
])

@php
    $classes = Flux::classes([
        'w-full table-auto',
        'border border-zinc-200 dark:border-zinc-700' => $bordered,
    ]);
@endphp

<table {{ $attributes->class($classes) }}>
    {{ $slot }}
</table>