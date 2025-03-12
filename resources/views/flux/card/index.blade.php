@props([
    'variant' => 'default',
    'hover' => false,
])

@php
    $classes = Flux::classes([
        'overflow-hidden rounded-lg border',
        'border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-800' => $variant === 'default',
        'border-primary-200 bg-primary-50 dark:border-primary-800 dark:bg-primary-900/20' => $variant === 'primary',
        'border-success-200 bg-success-50 dark:border-success-800 dark:bg-success-900/20' => $variant === 'success',
        'border-warning-200 bg-warning-50 dark:border-warning-800 dark:bg-warning-900/20' => $variant === 'warning',
        'border-danger-200 bg-danger-50 dark:border-danger-800 dark:bg-danger-900/20' => $variant === 'danger',
        'transition-all duration-200 hover:shadow-md' => $hover,
    ]);
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>