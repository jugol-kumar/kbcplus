<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class , 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class , 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout');

Route::get('/', function () {
    return redirect(\route('front.index'));
})->name('index');




Route::group([
    'as' => 'front.',
],
function (){
//  invakable controller for home url
    Route::get('/', HomeController::class);




});







//admin side category and sub category ajax route
Route::get('/category/id/{id}', [AjaxController::class, 'subCategoryByCategoryId']);
Route::get('/sub-category/id/{id}', [AjaxController::class, 'brandsBySubCategoryId'] );

//subcategory get api


Route::group([
    'as' => 'customer.',
    'prefix' => 'customer/',
    'middleware' => ['auth','customer']
], function (){
    Route::get('index', function(){
        return 'this is customer page ';
    })->name('dashboard');
});



Route::get('/clear', function(){
    \Artisan::call('config:clear');
});
