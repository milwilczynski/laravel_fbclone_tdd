<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('{any}', [App\Http\Controllers\AppController::class, 'index'])
    ->where('any', '.*')
    ->middleware('auth')
    ->name('home');
