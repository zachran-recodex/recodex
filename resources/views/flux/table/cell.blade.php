@props([
    'variant' => null,
])

@php
$classes = Flux::classes()
    ->add('px-4 py-3')
    ->add('text-sm text-zinc-700 dark:text-zinc-300')
    ->add(match ($variant) {
        'strong' => 'font-medium',
        default => '',
    })
    ;
@endphp

<td {{ $attributes->class($classes) }} data-flux-table-cell>
    {{ $slot }}
</td>
