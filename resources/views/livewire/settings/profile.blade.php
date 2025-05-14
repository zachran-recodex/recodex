<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public string $name = '';
    public string $username = '';
    public string $position = '';
    public string $about = '';
    public $photo;
    public $existingPhoto = '';
    public array $socialLinks = [
        'twitter' => '',
        'linkedin' => '',
        'github' => '',
        'instagram' => ''
    ];

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        /** @var User $user */
        $user = Auth::user();
        $this->name = $user->name;
        $this->username = $user->username;
        $this->position = $user->position ?? '';
        $this->about = $user->about ?? '';
        $this->existingPhoto = $user->photo_path;
        $this->socialLinks = $user->social_links ?? [
            'twitter' => '',
            'linkedin' => '',
            'github' => '',
            'instagram' => ''
        ];
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                'lowercase',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'position' => ['nullable', 'string', 'max:255'],
            'about' => ['nullable', 'string', 'max:1000'],
            'photo' => ['nullable', 'image', 'max:1024'], // 1MB max
            'socialLinks.twitter' => ['nullable', 'url', 'max:255'],
            'socialLinks.linkedin' => ['nullable', 'url', 'max:255'],
            'socialLinks.github' => ['nullable', 'url', 'max:255'],
            'socialLinks.instagram' => ['nullable', 'url', 'max:255'],
        ]);

        // Handle photo upload
        if ($this->photo) {
            // Delete old photo if exists
            if ($user->photo_path && Storage::disk('public')->exists($user->photo_path)) {
                Storage::disk('public')->delete($user->photo_path);
            }

            $photoPath = $this->photo->store('profile-photos', 'public');
            $user->photo_path = $photoPath;
        }

        // Update model attributes individually instead of using fill()
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->position = $validated['position'];
        $user->about = $validated['about'];
        $user->social_links = $this->socialLinks;

        // Check for email changes manually
        if ($user->getOriginal('email') !== $user->email) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section class="w-full">
    @include('components.partials.settings-heading')

    <x-settings.layout heading="Profile" subheading="Update your profile information">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <!-- Profile Photo -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profile Photo</h3>

                <div class="flex items-center space-x-6">
                    <div class="flex-shrink-0">
                        @if($existingPhoto)
                            <img class="h-16 w-16 rounded-lg object-cover" src="{{ Storage::url($existingPhoto) }}" alt="{{ $name }}" />
                        @elseif($photo)
                            <img class="h-16 w-16 rounded-lg object-cover" src="{{ $photo->temporaryUrl() }}" alt="{{ $name }}" />
                        @else
                            <div class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500 font-medium">{{ auth()->user()->initials() }}</span>
                            </div>
                        @endif
                    </div>

                    <flux:input wire:model="photo" label="Photo" type="file" accept="image/*" />
                </div>
            </div>

            <!-- Basic Information -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Basic Information</h3>

                <flux:input wire:model="name" label="Name" type="text" required autofocus autocomplete="name" />

                <flux:input wire:model="username" label="Username" required autocomplete="username" />

                <flux:input wire:model="position" label="Position" type="text" placeholder="e.g. Full Stack Developer" />
            </div>

            <!-- About -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">About</h3>

                <flux:textarea wire:model="about" label="About Me" rows="4" placeholder="Share a little about yourself" />
            </div>

            <!-- Social Links -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Social Links</h3>

                <flux:input wire:model="socialLinks.twitter" label="Twitter" type="url" placeholder="https://twitter.com/yourusername" />

                <flux:input wire:model="socialLinks.linkedin" label="LinkedIn" type="url" placeholder="https://linkedin.com/in/yourusername" />

                <flux:input wire:model="socialLinks.github" label="GitHub" type="url" placeholder="https://github.com/yourusername" />

                <flux:input wire:model="socialLinks.instagram" label="Instagram" type="url" placeholder="https://instagram.com/yourusername" />
            </div>

            <!-- Email Verification Section -->
            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                <div>
                    <flux:text class="mt-4">
                        Your email address is unverified.

                        <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                            Click here to re-send the verification email.
                        </flux:link>
                    </flux:text>

                    @if (session('status') === 'verification-link-sent')
                        <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                            A new verification link has been sent to your email address.
                        </flux:text>
                    @endif
                </div>
            @endif

            <!-- Submit Button -->
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">Save</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    Saved.
                </x-action-message>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
