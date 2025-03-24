<x-layouts.auth>
    <div class="mb-4 text-sm text-gray-600">
        Please enter your new password to complete the password reset process.
    </div>

    <form method="POST" action="{{ route('email.update-password', $token) }}" class="flex flex-col gap-6">
        @csrf

        <!-- Password -->
        <flux:input
            id="password"
            label="Password"
            type="password"
            name="password"
            required
            autocomplete="new-password"
            placeholder="Password"
        />

        <!-- Confirm Password -->
        <flux:input
            id="password_confirmation"
            label="Confirm password"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            placeholder="Confirm password"
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                Reset password
            </flux:button>
        </div>
    </form>
</x-layouts.auth>
