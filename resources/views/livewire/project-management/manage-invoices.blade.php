@section('meta_tag')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Recodex ID - Jasa pembuatan website profesional dengan teknologi terkini. Kami menyediakan layanan pengembangan web yang responsif, SEO-friendly, dan disesuaikan dengan kebutuhan bisnis Anda.">
    <meta name="keywords" content="jasa pembuatan website, web development, website profesional, website bisnis, website company profile, website toko online, web developer Indonesia">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Recodex ID - Jasa Pembuatan Website Profesional">
    <meta property="og:description" content="Solusi digital terbaik untuk bisnis Anda dengan layanan pembuatan website profesional yang responsif dan SEO-friendly.">
    <meta property="og:image" content="{{ asset('images/hero.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Recodex ID - Jasa Pembuatan Website Profesional">
    <meta name="twitter:description" content="Solusi digital terbaik untuk bisnis Anda dengan layanan pembuatan website profesional yang responsif dan SEO-friendly.">
    <meta name="twitter:image" content="{{ asset('images/hero.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    @production
        <x-google-analytics />
    @endproduction

    <title>Manage Invoices | Project Management</title>
@endsection

<div>
    <header class="mb-6 flex items-center justify-between">
        <flux:heading level="2" class="text-2xl! font-semibold!">Manage Invoices</flux:heading>
        <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Invoices Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Invoice Number
                        </flux:table.column>
                        <flux:table.column>
                            Date
                        </flux:table.column>
                        <flux:table.column>
                            Client
                        </flux:table.column>
                        <flux:table.column>
                            Amount
                        </flux:table.column>
                        <flux:table.column>
                            Status
                        </flux:table.column>
                        <flux:table.column>
                            Actions
                        </flux:table.column>
                    </flux:table.columns>
                    <flux:table.rows>
                        @forelse ($invoices as $invoice)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $invoice->invoice_number }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $invoice->invoice_date->format('d F Y') }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $invoice->client_name }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge :color="$invoice->is_paid ? 'green' : 'red'">
                                        {{ $invoice->is_paid ? 'Paid' : 'Unpaid' }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $invoice->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmInvoiceDeletion({{ $invoice->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No invoices found</p>
                                        @if ($search || $filter_status !== '')
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Try adjusting your search or filter criteria</p>
                                        @else
                                            <flux:button wire:click="create" size="sm" variant="primary">
                                                Create Your First Invoice
                                            </flux:button>
                                        @endif
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="6">
                            {{ $invoices->links() }}
                        </flux:table.column>
                    </flux:table.columns>
                </flux:table>
            </div>
        </div>
    </main>

    <!-- Create/Edit Modal -->
    <flux:modal wire:model="isOpen" class="min-w-sm md:min-w-2xl lg:min-w-3xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $invoiceId ? 'Edit Invoice' : 'Create New Invoice' }}</flux:heading>
                <flux:text class="mt-2">Manage invoices easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Invoice Number -->
                    <flux:field>
                        <flux:label>Invoice Number</flux:label>

                        <flux:input wire:model="invoice_number" placeholder="Enter invoice number" />

                        <flux:error name="invoice_number" />
                    </flux:field>

                    <!-- Invoice Date -->
                    <flux:field>
                        <flux:label>Invoice Date</flux:label>

                        <flux:input type="date" wire:model="invoice_date" />

                        <flux:error name="invoice_date" />
                    </flux:field>

                    <!-- Client Name -->
                    <flux:field>
                        <flux:label>Client Name</flux:label>

                        <flux:input wire:model="client_name" placeholder="Enter client name" />

                        <flux:error name="client_name" />
                    </flux:field>

                    <!-- Payment Status -->
                    <flux:field>
                        <flux:label>Payment Status</flux:label>

                        <flux:switch wire:model.live="is_paid" align="left" label="{{ $is_paid ? 'Paid' : 'Unpaid' }}" />

                        <flux:error name="is_paid" />
                    </flux:field>

                    <!-- Client Address -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Client Address</flux:label>

                        <flux:textarea wire:model="client_address" placeholder="Enter client address" rows="3" />

                        <flux:error name="client_address" />
                    </flux:field>
                </div>

                <!-- Services -->
                <flux:separator class="md:col-span-2" />

                <flux:fieldset class="md:col-span-2">
                    <flux:legend>Services</flux:legend>

                    <div class="grid grid-cols-1 gap-4 mt-2">
                        <!-- Add New Service -->
                        <div class="flex items-end gap-2 mb-4">
                            <div class="flex-grow">
                                <flux:label>Description</flux:label>
                                <flux:input wire:model="new_service_description" placeholder="Service description" />
                            </div>
                            <div class="w-48">
                                <flux:label>Amount (Rp)</flux:label>
                                <flux:input wire:model="new_service_amount" type="number" min="0" step="1" placeholder="0" />
                            </div>
                            <div>
                                <flux:button size="sm" wire:click="addService" icon="plus" variant="outline">Add</flux:button>
                            </div>
                        </div>

                        <!-- Services List -->
                        <div class="space-y-2 max-h-60 overflow-y-auto">
                            @forelse ($services as $index => $service)
                                <div class="flex items-center justify-between p-3 rounded-md border border-zinc-200 dark:border-zinc-700">
                                    <div class="flex-grow">
                                        <p class="font-medium">{{ $service['description'] }}</p>
                                    </div>
                                    <div class="text-right mr-4">
                                        <p class="font-medium">Rp {{ number_format($service['amount'], 0, ',', '.') }}</p>
                                    </div>
                                    <flux:button type="button" icon="x-mark" variant="danger" size="xs" wire:click="removeService({{ $index }})" />
                                </div>
                            @empty
                                <div class="text-center py-4 text-zinc-500">
                                    No services added yet
                                </div>
                            @endforelse
                        </div>

                        <!-- Total Amount -->
                        <div class="flex justify-between items-center p-3 rounded-md bg-zinc-100 dark:bg-zinc-800 mt-2">
                            <p class="font-semibold">Total Amount:</p>
                            <p class="font-semibold">Rp {{ number_format($total_amount, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </flux:fieldset>

                <!-- Company Information -->
                <flux:separator class="md:col-span-2" />

                <flux:fieldset class="md:col-span-2">
                    <flux:legend>Company Information</flux:legend>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <!-- Account Name -->
                        <flux:field>
                            <flux:label>Account Name</flux:label>

                            <flux:input wire:model="account_name" placeholder="Enter account name" />

                            <flux:error name="account_name" />
                        </flux:field>

                        <!-- Bank Name -->
                        <flux:field>
                            <flux:label>Bank Name</flux:label>

                            <flux:input wire:model="bank_name" placeholder="Enter bank name" />

                            <flux:error name="bank_name" />
                        </flux:field>

                        <!-- Account Number -->
                        <flux:field>
                            <flux:label>Account Number</flux:label>

                            <flux:input wire:model="account_number" placeholder="Enter account number" />

                            <flux:error name="account_number" />
                        </flux:field>

                        <!-- Company Phone -->
                        <flux:field>
                            <flux:label>Company Phone</flux:label>

                            <flux:input wire:model="company_phone" placeholder="Enter company phone" />

                            <flux:error name="company_phone" />
                        </flux:field>

                        <!-- Company Email -->
                        <flux:field>
                            <flux:label>Company Email</flux:label>

                            <flux:input wire:model="company_email" placeholder="Enter company email" />

                            <flux:error name="company_email" />
                        </flux:field>

                        <!-- Company Website -->
                        <flux:field>
                            <flux:label>Company Website</flux:label>

                            <flux:input wire:model="company_website" placeholder="Enter company website" />

                            <flux:error name="company_website" />
                        </flux:field>

                        <!-- Company Address -->
                        <flux:field class="md:col-span-2">
                            <flux:label>Company Address</flux:label>

                            <flux:textarea wire:model="company_address" placeholder="Enter company address" rows="3" />

                            <flux:error name="company_address" />
                        </flux:field>
                    </div>
                </flux:fieldset>

                <flux:separator />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button wire:click="closeModal" variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">{{ $invoiceId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingInvoiceDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Invoice?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this invoice.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteInvoice" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
