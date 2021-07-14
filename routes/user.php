<?php


use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('index',IndexController::class )->name('dashboard');

Route::resource('address', AddressController::class);




Route::post('logout', [IndexController::class, 'userLogout'])->name('logout');
