@props([
    'variant' => null,
])

@php
$classes = Flux::classes()
    ->add('border-b border-zinc-200 dark:border-zinc-700')
    ->add('hover:bg-zinc-50 dark:hover:bg-zinc-800/50')
    ;
@endphp

<tr {{ $attributes->class($classes) }} data-flux-table-row>
    {{ $slot }}
</tr>
