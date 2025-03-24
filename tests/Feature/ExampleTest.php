<?php

use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::get('/', function () {
        return response()->json(['status' => 'success']);
    });
});

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk();
});