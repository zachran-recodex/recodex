<x-layouts.auth>
    <div class="mb-4 text-sm text-center text-zinc-600 dark:text-zinc-200">
        Please enter your new password to complete the password reset process.
    </div>

    <form
        method="POST"
        action="{{ route('project.update-password', $token) }}"
        class="flex flex-col gap-6"
        x-data="passwordManager"
    >
        @csrf

        <!-- Password -->
        <div>
            <flux:input
                id="password"
                label="Password"
                type="password"
                name="password"
                :value="$suggestedPassword ?? ''"
                required
                autocomplete="new-password"
                placeholder="Password"
                x-model="password"
                @input="checkPasswordStrength"
                viewable
            />

            <!-- Password Strength Indicator -->
            <div class="mt-2">
                <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                    <div
                        class="h-full transition-all duration-300 ease-in-out"
                        :class="{
                            'bg-red-500': strengthLevel < 2,
                            'bg-yellow-500': strengthLevel === 2,
                            'bg-green-500': strengthLevel > 2
                        }"
                        :style="{ width: strengthPercentage + '%' }"
                    ></div>
                </div>
                <p
                    class="mt-1 text-sm"
                    :class="{
                        'text-red-500': strengthLevel < 2,
                        'text-yellow-500': strengthLevel === 2,
                        'text-green-500': strengthLevel > 2
                    }"
                >
                    <span x-text="strengthDescription"></span>
                </p>
            </div>

            <!-- Generate Password Button -->
            <div class="mt-2">
                <button
                    type="button"
                    @click="generatePassword"
                    class="text-sm text-blue-600 hover:underline"
                >
                    Generate Strong Password
                </button>
            </div>
        </div>

        <!-- Confirm Password -->
        <flux:input
            id="password_confirmation"
            label="Confirm password"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            placeholder="Confirm password"
            x-model="confirmPassword"
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                Reset password
            </flux:button>
        </div>
    </form>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('passwordManager', () => ({
                password: '{{ $suggestedPassword ?? '' }}',
                confirmPassword: '',
                strengthLevel: 0,
                strengthPercentage: 0,
                strengthDescription: 'Very Weak',

                generatePassword() {
                    const lowercase = this.generateRandomString(4);
                    const uppercase = lowercase.toUpperCase();
                    const numbers = Math.floor(Math.random() * 90 + 10).toString();
                    const specialChars = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')'];
                    const specialChar = specialChars[Math.floor(Math.random() * specialChars.length)];

                    this.password = this.shuffleString(lowercase + uppercase + numbers + specialChar);
                    this.checkPasswordStrength();
                },

                generateRandomString(length) {
                    const characters = 'abcdefghijklmnopqrstuvwxyz';
                    let result = '';
                    for (let i = 0; i < length; i++) {
                        result += characters.charAt(Math.floor(Math.random() * characters.length));
                    }
                    return result;
                },

                shuffleString(str) {
                    // Konversi string ke array
                    const array = str.split('');

                    // Algoritma shuffle Fisher-Yates
                    for (let i = array.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [array[i], array[j]] = [array[j], array[i]];
                    }

                    // Kembalikan array ke string
                    return array.join('');
                },

                checkPasswordStrength() {
                    let strength = 0;
                    const password = this.password;

                    // Length check
                    if (password.length >= 12) strength++;
                    if (password.length >= 16) strength++;

                    // Complexity checks
                    if (/[a-z]/.test(password)) strength++;
                    if (/[A-Z]/.test(password)) strength++;
                    if (/\d/.test(password)) strength++;
                    if (/[!@#$%^&*()]/.test(password)) strength++;

                    this.strengthLevel = strength;
                    this.strengthPercentage = (strength / 5) * 100;

                    // Set description based on strength
                    switch(strength) {
                        case 0:
                        case 1:
                            this.strengthDescription = 'Very Weak';
                            break;
                        case 2:
                            this.strengthDescription = 'Weak';
                            break;
                        case 3:
                            this.strengthDescription = 'Moderate';
                            break;
                        case 4:
                            this.strengthDescription = 'Strong';
                            break;
                        case 5:
                            this.strengthDescription = 'Very Strong';
                            break;
                    }
                }
            }));
        });
    </script>
</x-layouts.auth>