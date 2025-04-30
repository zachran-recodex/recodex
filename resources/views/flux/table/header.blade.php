@props([
    'variant' => null,
])

@php
$classes = Flux::classes([
    'px-4 py-3',
    'text-left text-xs font-medium',
    'text-zinc-500 dark:text-zinc-400',
    'border-b border-zinc-200 dark:border-zinc-700',
    'bg-zinc-50 dark:bg-zinc-800',
]);
@endphp

<th {{ $attributes->class($classes) }} data-flux-table-header>
    {{ $slot }}
</th>
