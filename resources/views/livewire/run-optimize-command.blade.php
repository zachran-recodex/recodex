<button wire:click="optimize"
        wire:loading.attr="disabled"
        class="inline-flex items-center px-4 py-2 bg-primary-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-600 focus:bg-primary-600 active:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150 {{ $isRunning ? 'opacity-75 cursor-not-allowed' : '' }}"
    {{ $isRunning ? 'disabled' : '' }}>
    <div wire:loading wire:target="optimize" class="mr-2">
        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>
    {{ $isRunning ? 'Optimizing...' : 'Run Optimize' }}
</button>

@if ($message)
    <div class="mt-2">
        <p class="{{ $status === 'success' ? 'text-green-600' : ($status === 'error' ? 'text-red-600' : 'text-gray-600') }}">
            {{ $message }}
        </p>
    </div>
@endif
