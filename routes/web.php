<?php

use App\Http\Controllers\frontend\CartDetailsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use App\Http\Controllers\User\IndexController;
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


Route::group([
    'as' => 'front.',
    'prefix' => '/'
],
function (){
    //  invakable controller for home url
    Route::get('/', HomeController::class)->name('index');

    //  single product details route
    Route::get('singel-product/{slug}', [ProductDetailsController::class, 'singleProductDetails'])->name('product.details');

    //  get all size by unique color with ajax
    Route::post('size-by-color', [ProductDetailsController::class, 'getSizeByColor'])->name('product.sizebycolor');

    //  get all size by unique color with ajax
    Route::post('size-by-price', [ProductDetailsController::class, 'getPriceBySize'])->name('product.sizeByPrice');


    //  get all destrict list
    Route::post('all-district', [ProductDetailsController::class, 'allDistrict'])->name('get.allDistrict');
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');

    //update cart quantity
    Route::patch('update-cart-quantity-minus', [CartController::class, 'updateCartQtyMinus'])->name('update.cart.minus');
    Route::patch('update-cart-quantity-plus', [CartController::class, 'updateCartQtyPlus'])->name('update.cart.plus');
    Route::delete('update-cart-delete-by-id', [CartController::class, 'updateCarDeleteById'])->name('cart.delete.byId');
    Route::delete('clear-cart-session', [CartController::class, 'clearCartSession'])->name('clear.cart.session');

    //  Cart Details Page All Route
    Route::get('cart-details', [CartDetailsController::class, 'cartDetailsIndex'])->name('cart.details.index');
    Route::post('save-cart-details', [CartDetailsController::class, 'saveCartDetails'])->name('save.cart.details');

    // this is check out page
    Route::get('go-to-checkout/{id}', [CartDetailsController::class, 'goToCheckout'])->name('goto.checkout');

    //make payment route
    Route::post('make-payment', [CartDetailsController::class, 'makePayment'])->name('makepayment');



});






//admin side category and sub category ajax route
Route::get('/category/id/{id}', [AjaxController::class, 'subCategoryByCategoryId']);
Route::get('/sub-category/id/{id}', [AjaxController::class, 'brandsBySubCategoryId'] );

//subcategory get api
//
//
//Route::group([
//    'as' => 'user.',
//    'prefix' => 'user',
//    'middleware' => ['auth','customer']
//], function (){
//
//    //add user
//
//});
//


Route::get('/clear', function(){
    \Artisan::call('config:clear');
});

