<?php


use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('index',IndexController::class )->name('dashboard');

// user address route
Route::resource('address', AddressController::class);
Route::post('update-user-address', [AddressController::class, 'updateUserAddress'])->name('update.user.address');




Route::post('logout', [IndexController::class, 'userLogout'])->name('logout');
