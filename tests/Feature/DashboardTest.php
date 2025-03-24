<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $response = $this->get('/dashboard');
    $response->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
    ]);

    $this->actingAs($user);

    $response = $this->get('/dashboard');
    $response->assertOk();
});