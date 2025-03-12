@props([
    'variant' => 'default',
    'divided' => true,
])

@php
    $classes = Flux::classes([
        'px-4 py-3',
        'border-b' => $divided,
        'border-zinc-200 dark:border-zinc-700' => $variant === 'default' && $divided,
        'border-primary-200 dark:border-primary-800' => $variant === 'primary' && $divided,
        'border-success-200 dark:border-success-800' => $variant === 'success' && $divided,
        'border-warning-200 dark:border-warning-800' => $variant === 'warning' && $divided,
        'border-danger-200 dark:border-danger-800' => $variant === 'danger' && $divided,
    ]);
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>