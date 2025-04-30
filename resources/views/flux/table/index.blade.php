@props([
    'variant' => null,
])

@php
$classes = Flux::classes()
    ->add('w-full')
    ->add('border-collapse')
    ->add('text-sm')
    ;
@endphp

<table {{ $attributes->class($classes) }} data-flux-table>
    {{ $slot }}
</table>