<?php


use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PromosController;
use Illuminate\Support\Facades\Route;

Route::get('index',IndexController::class )->name('dashboard');

// user address route
Route::resource('address', AddressController::class);
Route::post('update-user-address', [AddressController::class, 'updateUserAddress'])->name('update.user.address');

//promos route
Route::get('promos', [PromosController::class, 'promosIndex'])->name('promos.index');

//my order route
Route::get('my-orders', [OrderController::class, 'myOrderIndex'])->name('my.order');


Route::get('verify', [\App\Http\Controllers\VerifyController::class, 'getVerify'])->name('getVerify');
Route::post('verify', [\App\Http\Controllers\VerifyController::class, 'postVerify'])->name('postVerify');











Route::post('logout', [IndexController::class, 'userLogout'])->name('logout');
