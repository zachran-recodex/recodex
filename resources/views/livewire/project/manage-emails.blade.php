<flux:container class="space-y-4 sm:space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage Emails</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}">Project</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage Email</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">List Email</flux:heading>

                <flux:modal.trigger name="form">
                    <flux:button type="button" variant="primary" class="w-full sm:w-fit" icon="plus" wire:click="create">
                        Add New
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column class="min-w-[300px] md:w-auto">Email</flux:table.column>
                        <flux:table.column class="min-w-[120px] md:w-auto">Password</flux:table.column>
                        <flux:table.column class="min-w-[200px] md:w-auto">Password Updated At</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($emails as $email)
                            <flux:table.row>
                                <flux:table.cell class="text-sm md:text-base">{{ $email->email }}</flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">

                                    <flux:tooltip content="Click to copy password">
                                        <button
                                            type="button"
                                            class="hover:text-primary-600 cursor-pointer"
                                            x-data
                                            @click="
                                                navigator.clipboard.writeText($el.innerText);
                                                $dispatch('notify', {
                                                    type: 'success',
                                                    message: 'Password copied to clipboard!'
                                                })
                                            "
                                        >
                                            {{ $email->password }}
                                        </button>
                                    </flux:tooltip>

                                </flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">
                                    @if($email->password_updated_at)
                                        {{ $email->password_updated_at->format('d M Y H:i') }}
                                    @else
                                        <span class="text-gray-400">Never updated</span>
                                    @endif
                                </flux:table.cell>

                                <flux:table.cell>
                                    <div class="flex gap-2">
                                        <flux:tooltip content="Send email for reset password">
                                            <flux:button variant="outline" wire:click="sendResetPasswordLink({{ $email->id }})" icon="envelope" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:tooltip>

                                        <flux:modal.trigger name="form">
                                            <flux:button variant="warning" wire:click="edit({{ $email->id }})" icon="pencil" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" wire:click="confirmDelete({{ $email->id }})" icon="trash" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="4" class="text-center py-6 md:py-8">
                                    <flux:heading size="lg" class="text-base md:text-lg">No data found.</flux:heading>
                                    <flux:subheading class="text-sm md:text-base">Start by creating a new email.</flux:subheading>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </flux:card.body>

        <flux:card.footer>
            {{ $emails->links() }}
        </flux:card.footer>
    </flux:card>

    <flux:modal name="form" class="min-w-sm md:min-w-lg lg:min-w-xl">
        <div class="space-y-4 sm:space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $email_id ? 'Edit Email' : 'Add New Email' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-4 sm:space-y-6">
                        <flux:field>
                            <flux:label>Email</flux:label>

                            <flux:input.group>
                                <flux:input
                                    type="text"
                                    wire:model="email"
                                    placeholder="Enter email username"
                                />

                                <flux:select
                                    wire:model="domain_id"
                                    class="max-w-fit"
                                >
                                    <option value="">Select Domain</option>
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->id }}">{{ '@' . $domain->name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:input.group>

                            <flux:error name="email" />
                            <flux:error name="domain_id" />
                        </flux:field>

                        <flux:field>
                            <flux:label>Password</flux:label>
                            <flux:input wire:model="password" placeholder="{{ $email_id ? 'Leave blank to keep current password' : 'Enter password' }}" />
                            <flux:error name="password" />
                        </flux:field>

                        <div class="flex jusify-end">
                            <flux:button type="submit" variant="primary" class="w-full md:w-fit">
                                {{ $email_id ? 'Update' : 'Create' }}
                            </flux:button>
                        </div>
                    </div>
                </flux:fieldset>
            </form>
        </div>
    </flux:modal>

    <flux:modal name="delete" class="min-w-[280px] sm:min-w-sm">
        <div class="space-y-4 sm:space-y-6">
            <div class="text-center sm:text-left">
                <flux:heading size="lg" class="font-semibold">Delete email?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this email?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex justify-end">
                <flux:button type="button" variant="danger" wire:click="deleteEmail" class="w-full sm:w-fit">
                    Delete
                </flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
