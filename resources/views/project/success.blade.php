<x-layouts.auth>
    <div class="mb-4 text-sm text-center text-zinc-600 dark:text-zinc-200">
        Your password has been reset successfully.
    </div>

    <div class="flex items-center justify-end">
        <flux:button href="{{ route('home') }}" variant="primary" class="w-full">
            Back to Home
        </flux:button>
    </div>
</x-layouts.auth>