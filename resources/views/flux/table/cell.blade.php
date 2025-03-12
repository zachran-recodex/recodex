@props([
    'compact' => false,
])

@php
    $classes = Flux::classes([
        'px-4 text-sm text-zinc-600 dark:text-zinc-400',
        'py-2' => $compact,
        'py-4' => !$compact,
    ]);
@endphp

<td {{ $attributes->class($classes) }}>
    {{ $slot }}
</td>