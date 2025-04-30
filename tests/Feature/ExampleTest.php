<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\HeroSeeder;

uses(RefreshDatabase::class);

it('returns a successful response', function () {
    $this->seed(HeroSeeder::class);

    $response = $this->get('/');

    $response->assertStatus(200);
});
