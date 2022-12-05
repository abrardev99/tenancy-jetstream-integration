<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\PreventAccessFromUnwantedDomains;

Route::middleware([
    'web',
    PreventAccessFromUnwantedDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


Route::middleware([
    'web',
    PreventAccessFromUnwantedDomains::class,
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
