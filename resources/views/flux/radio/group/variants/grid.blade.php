@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'variant' => null,
    'size' => null,
    'cols' => 3,
])

@php
$classes = Flux::classes()
    ->add('grid gap-2')
    ->add(match ((int) $cols) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-2',
        3 => 'grid-cols-3',
        4 => 'grid-cols-4',
        5 => 'grid-cols-5',
        6 => 'grid-cols-6',
        default => 'grid-cols-3',
    })
    ->add('rounded-lg')
    ;
@endphp

<flux:with-field :$attributes>
    <ui-radio-group {{ $attributes->class($classes) }} data-flux-radio-group-grid>
        {{ $slot }}
    </ui-radio-group>
</flux:with-field>