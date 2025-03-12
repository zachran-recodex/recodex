@props([
    'selected' => false,
])

@php
    $classes = Flux::classes([
        'border-b border-zinc-200 dark:border-zinc-700',
        'bg-zinc-50 dark:bg-zinc-800/50' => $selected,
        'hover:bg-zinc-50 dark:hover:bg-zinc-800/50' => !$selected,
    ]);
@endphp

<tr {{ $attributes->class($classes) }}>
    {{ $slot }}
</tr>