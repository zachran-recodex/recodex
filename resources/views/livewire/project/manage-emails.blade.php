<flux:container class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <flux:heading size="xl" class="font-bold!">Manage Emails</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}">Project</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Manage Email</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex justify-between items-center">
                <flux:heading size="lg" class="semi-bold!">List Email</flux:heading>

                <flux:modal.trigger name="form">
                    <flux:button type="button" variant="primary" class="w-fit" icon="plus" wire:click="create">
                        Add New
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column>Email</flux:table.column>
                        <flux:table.column>Password</flux:table.column>
                        <flux:table.column>Password Updated At</flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($emails as $email)
                            <flux:table.row>

                                <flux:table.cell>
                                    {{ $email->email }}
                                </flux:table.cell>

                                <flux:table.cell>
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
                                </flux:table.cell>

                                <flux:table.cell>
                                    @if($email->password_updated_at)
                                        {{ $email->password_updated_at->format('d M Y H:i') }}
                                    @else
                                        <span class="text-gray-400">Never updated</span>
                                    @endif
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $email->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $email->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:button variant="primary" wire:click="sendResetPasswordLink({{ $email->id }})"
                                        icon="envelope"></flux:button>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="4" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:heading size="lg">No emails found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new email.
                                        </flux:subheading>
                                    </div>
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

    <flux:modal name="form" class="min-w-4xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $email_id ? 'Edit Email' : 'Add New Email' }}
            </flux:heading>

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-6">
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

                        <div class="flex">
                            <flux:spacer />
                            <flux:button type="submit" variant="primary" class="w-fit">
                                {{ $email_id ? 'Update' : 'Create' }}
                            </flux:button>
                        </div>
                    </div>
                </flux:fieldset>
            </form>
        </div>
    </flux:modal>

    <flux:modal name="delete" class="min-w-sm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete email?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this email?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:button type="button" variant="danger" wire:click="deleteEmail">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
