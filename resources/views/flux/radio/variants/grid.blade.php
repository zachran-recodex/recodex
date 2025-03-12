@aware([ 'size' ])

@props([
    'iconTrailing' => null,
    'iconVariant' => null,
    'label' => null,
    'icon' => null,
    'size' => null,
])

@php
$classes = Flux::classes()
    ->add('flex flex-col items-center justify-center gap-2 p-4')
    ->add('rounded-lg border border-zinc-200 dark:border-white/10')
    ->add('hover:bg-zinc-50 dark:hover:bg-white/5')
    ->add('data-checked:border-[var(--color-accent)] data-checked:bg-[var(--color-accent)]/5')
    ->add('text-sm font-medium text-zinc-600 hover:text-zinc-800 dark:text-white/70 dark:hover:text-white')
    ->add('data-checked:text-[var(--color-accent)]')
    ->add('[&[disabled]]:opacity-50 dark:[&[disabled]]:opacity-75 [&[disabled]]:cursor-default [&[disabled]]:pointer-events-none')
    ;

$iconVariant ??= 'outline';

$iconClasses = Flux::classes()
    ->add('size-6')
    ->add('text-zinc-400 dark:text-zinc-500')
    ->add('[ui-radio[data-checked]_&]:text-[var(--color-accent)]')
    ;
@endphp

<ui-radio {{ $attributes->class($classes) }} data-flux-control data-flux-radio-grid tabindex="-1">
    @if (is_string($icon) && $icon !== '')
        <flux:icon :$icon :variant="$iconVariant" class="{!! $iconClasses !!}" />
    @elseif ($icon)
        {{ $icon }}
    @endif

    {{ $label ?? $slot }}

    @if (is_string($iconTrailing) && $iconTrailing !== '')
        <flux:icon :icon="$iconTrailing" variant="micro" />
    @elseif ($iconTrailing)
        {{ $iconTrailing }}
    @endif
</ui-radio>