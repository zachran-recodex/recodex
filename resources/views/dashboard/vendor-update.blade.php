<x-dashboard-layout>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-4 border-b border-gray-200">
                <form id="updateForm" method="POST" action="{{ route('vendor.update.execute') }}">
                    @csrf
                    <x-button type="submit" id="updateButton" class="bg-green-600 hover:bg-green-700">
                        {{ __('Update Vendor') }}
                    </x-button>
                </form>
            </div>

            <div class="bg-black p-4">
                <div id="terminal" class="h-96"></div> <!-- Terminal Container -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/xterm/lib/xterm.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const term = new Terminal({
                cursorBlink: true,
                theme: {
                    background: "#000000",
                    foreground: "#00ff00"
                }
            });

            term.open(document.getElementById("terminal"));

            document.getElementById("updateForm").addEventListener("submit", async function(e) {
                e.preventDefault();

                const button = document.getElementById("updateButton");
                button.disabled = true;
                term.clear();
                term.writeln("$ composer update");

                try {
                    const response = await fetch(this.action, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value }
                    });

                    const reader = response.body.getReader();
                    const decoder = new TextDecoder();

                    while (true) {
                        const { value, done } = await reader.read();
                        if (done) break;

                        const text = decoder.decode(value, { stream: true });
                        term.write(text.replace(/\n/g, "\r\n")); // Output ke terminal
                    }
                } catch (error) {
                    term.writeln("\r\nError: " + error.message);
                } finally {
                    button.disabled = false;
                }
            });
        });
    </script>
</x-dashboard-layout>
