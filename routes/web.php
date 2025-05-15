<?php

use App\Http\Controllers\AdminControlller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RealtorController;
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
    Route::get('/realtor/dashboard', [RealtorController::class , 'index' ])->name('realtor.dashboard');
    Route::get('/realtor/properties/create', [RealtorController::class, 'create'])->name('realtor.properties.create');
    Route::post('/realtor/properties/store', [PropertyController::class, 'store'])->name('realtor.properties.store');
    Route::get('/realtor/properties', [PropertyController::class, 'index'])->name('realtor.properties.index');
    Route::get('/realtor/properties/edit/{property}', [PropertyController::class, 'show'])->name('realtor.properties.show');
    Route::put('/realtor/properties/update/{property}', [PropertyController::class, 'update'])->name('realtor.properties.update');
    Route::delete('/realtor/properties/delete/{property}', [PropertyController::class, 'destroy'])->name('realtor.properties.delete');
    Route::get('/realtor/properties/timeSlots/{property}', [PropertyController::class, 'timeslots'])->name('realtor.properties.view');
    Route::post('/realtor/properties/storeTimeSlot/{property}', [PropertyController::class, 'storeTimeSlot'])->name('realtor.properties.timeSlots.store');
    Route::delete('/realtor/properties/deleteTimeSlot/{property}', [PropertyController::class, 'deleteTimeSlot'])->name('realtor.properties.timeSlots.delete');
    Route::get('/realtor/check-visits', [PropertyController::class, 'bookings'])->name('realtor.properties.bookings');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [CustomerController::class, 'index'])->name('home');
    Route::get('/properties', [CustomerController::class, 'properties'])->name('properties');
    Route::get('/properties/{property}', [CustomerController::class, 'show'])->name('properties.show');
    Route::get('/properties/book/{property}', [CustomerController::class, 'book'])->name('properties.book');
    Route::post('/customer/timeslot/book/{property}', [CustomerController::class, 'bookStore'])->name('properties.book.store');
});

//logout
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/')->with('success', 'Logged out successfully.');
})->name('logout');


require __DIR__.'/auth.php';
