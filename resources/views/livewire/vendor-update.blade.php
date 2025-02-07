<div class="bg-white shadow-lg rounded-lg p-6">
    <button wire:click="updateVendor" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
        Update Vendor
    </button>

    <div class="bg-black text-green-500 font-mono p-4 mt-4 h-96 overflow-auto">
        <div id="output" class="whitespace-pre-wrap">
            {!! $output !!}
        </div>
    </div>
</div>

<script>
    Livewire.on('vendorUpdateOutput', output => {
        let outputDiv = document.getElementById('output');
        outputDiv.innerHTML = output;
        outputDiv.scrollTop = outputDiv.scrollHeight; // Auto-scroll
    });
</script>
