<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProductDetails;
use App\Http\Controllers\Frontend\ShippingController;
use App\Http\Controllers\Frontend\WatchlistController;
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

Route::get('/form', function () {
    return view('admin.users.form');
});

Route::group([
    'as' => 'front.',
    'prefix' => 'front/'
], function (){
    Route::get('home', [IndexController::class, 'index'])->name('index');

    //category wise product show route
    Route::get('category-product/{id}', [ProductController::class,'categoryWiseProduct'])->name('category.product');
    Route::get('sub-category-product/{id}', [ProductController::class,'subCategoryWiseProduct'])->name('subcategory.product');
    Route::get('brand-product/{id}', [ProductController::class,'brandWiseProduct'])->name('brand.product');


    //this is route for single product show
    Route::get('product-details/{slug}', [ProductDetails::class, 'index'])->name('single-product');

    //this route for cart product
    Route::post('product-form', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::get('product-cart', [CartController::class, 'goToCart'])->name('go.to.cart');

    //contity update ajax route
    Route::get('increase-quantity/{data}', [CartController::class, 'addQuantity'])->name('add.quantity');
    Route::get('decrease-quantity/{data}', [CartController::class, 'deleteQuantity'])->name('delete.quantity');

    //remove cart item
    Route::get('delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('delete.cart.item');

    //watch list route
    Route::get('watch-lest/index', [WatchlistController::class, 'showWatchlist'])->name('show.watchlist');
    Route::post('watch-lest/add', [WatchlistController::class, 'addWatchlist'])->name('add.watchlist');
    Route::get('watch-lest/delete/{id}', [WatchlistController::class, 'watchDelete'])->name('delete.watchlist');


    //apply coupon code route
    Route::post('apply-coupon', [CartController::class, 'applyCouponCode'])->name('apply.coupon');
    Route::get('candle-destroy-code', [CartController::class, 'destroyCouponCode'])->name('destroy.coupon');

    //checkout route
    Route::get('checkout', [CheckoutController::class, 'goToCheckout'] )->name('go.to.checkout');
    Route::post('customer-save', [CheckoutController::class, 'customerSave'])->name('saveCustomer');
    Route::post('customer-login', [CheckoutController::class, 'customerLogin'])->name('loginCustomer');

    Route::group([
        'as' => 'customer.',
        'prefix' => 'customer/',
        'middleware' => 'customerSession'
    ], function (){
        //autantic customer panel route
       Route::get('panel', [CheckoutController::class, 'customerIndex'])->name('panel');
       Route::get('logout', [CheckoutController::class, 'customerLogout'])->name('logout');

       //save shipping info route
        Route::get('save-shipping', [PaymentController::class, 'goToPayment'])->name('gpto.payment');
        Route::post('shipping', [ShippingController::class, 'saveShipping'])->name('save.shipping');

        Route::post('place-order', [PaymentController::class, 'placeOrder'])->name('save.payment');
    });
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
