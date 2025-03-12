@props([
    'sortable' => false,
    'direction' => null,
])

@php
    $classes = Flux::classes([
        'px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300',
        'cursor-pointer hover:bg-zinc-100 dark:hover:bg-zinc-700' => $sortable,
    ]);
@endphp

<th scope="col" {{ $attributes->class($classes) }}>
    <div class="flex items-center gap-2">
        {{ $slot }}

        @if($sortable)
            <span class="text-zinc-400">
                @if($direction === 'asc')
                    <flux:icon.chevron-up />
                @elseif($direction === 'desc')
                    <flux:icon.chevron-down />
                @else
                    <flux:icon.chevron-up-down />
                @endif
            </span>
        @endif
    </div>
</th>