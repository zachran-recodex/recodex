@props([
    'sticky' => false,
])

@php
    $classes = Flux::classes([
        'bg-zinc-50 dark:bg-zinc-800 border-y border-zinc-200 dark:border-zinc-700',
        'sticky top-0' => $sticky,
    ]);
@endphp

<thead {{ $attributes->class($classes) }}>
    <tr>
        {{ $slot }}
    </tr>
</thead>