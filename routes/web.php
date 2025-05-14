<?php

use App\Http\Controllers\AdminControlller;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminControlller::class,'index'])->name('admin.dashboard');
    Route::get('/admin/users/create', [AdminControlller::class,'create'])->name('admin.users');
    Route::post('/admin/users/store', [AdminControlller::class,'store'])->name('admin.users.store');
});

Route::middleware(['auth', 'role:realtor'])->group(function () {
    Route::get('/realtor/dashboard', function () {return view('realtor.dashboard');})->name('realtor.dashboard');
});

//logout
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/')->with('success', 'Logged out successfully.');
})->name('logout');


require __DIR__.'/auth.php';
