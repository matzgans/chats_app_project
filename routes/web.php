<?php

use App\Livewire\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('chatsview', function () {
    return view('page.chats.index', [
        'users' => User::where('id', '!=', Auth::user()->id)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('chatsview');

Route::get('/chats/chats/{user}', Chat::class)
    ->middleware(['auth', 'verified'])
    ->name('chats.user');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
