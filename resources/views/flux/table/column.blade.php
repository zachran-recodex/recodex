@props([
    'variant' => null,
])

@php
$classes = Flux::classes([
    'px-4 py-3',
    'text-left text-xs font-medium',
    'text-zinc-500 dark:text-zinc-400',
]);
@endphp

<th {{ $attributes->class($classes) }} data-flux-table-column>
    {{ $slot }}
</th>
