<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Livewire\Volt\Volt;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('reset password link screen can be rendered', function () {
    $response = $this->get('/forgot-password');

    $response->assertStatus(200);
});

test('reset password link can be requested', function () {
    Notification::fake();

    $user = User::factory()->create();

    $response = Volt::test('auth.forgot-password')
        ->set('email', $user->email)
        ->call('sendPasswordResetLink');

    $response->assertHasNoErrors();
    Notification::assertSentTo($user, ResetPassword::class);
});

test('reset password screen can be rendered', function () {
    Notification::fake();

    $user = User::factory()->create();

    $token = Password::createToken($user);

    $response = $this->get('/reset-password/'.$token.'?email='.urlencode($user->email));

    $response->assertStatus(200);
});

test('password can be reset with valid token', function () {
    Notification::fake();

    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('old-password'),
    ]);

    $token = Password::createToken($user);

    $response = Volt::test('auth.reset-password', ['token' => $token])
        ->set('email', $user->email)
        ->set('password', 'new-password')
        ->set('password_confirmation', 'new-password')
        ->call('resetPassword');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('login', absolute: false));

    // Verify the password was actually changed
    expect(Hash::check('new-password', $user->fresh()->password))->toBeTrue();
});
