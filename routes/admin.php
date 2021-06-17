<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryDeleteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




Route::get('home', [HomeController::class, 'index'])->name('home');

//user route
Route::resource('user', UserController::class);

//role route
Route::resource('role', RoleController::class);

//category route
Route::resource('category', CategoryController::class);
Route::get('/category/data', [CategoryController::class, 'category'])->name('category.data');
Route::get('/get-category', [CategoryController::class, 'getCategory']);

//subcategory route
Route::resource('subcategory', SubCategoryController::class);

//Brand route
Route::resource('brand', BrandController::class);

//Product route
Route::resource('product', ProductController::class);

//Coupons route
Route::resource('coupon', CuponController::class);

//order controller route
Route::get('order', [OrderController::class, 'orderIndex'])->name('order');
Route::get('show-order/{id}', [OrderController::class, 'showOrder'])->name('showOrder');
Route::get('create-invoice/{id}', [OrderController::class, 'createInvoice'])->name('createInvoice');
Route::get('approved-payment/{id}', [OrderController::class,'approvedPayment'])->name('approvedPayment');
Route::get('approved-order/{id}', [OrderController::class,'approvedOrder'])->name('approvedOrder');

//ajax published and unpublished
Route::get('product/published/status', [ProductController::class, 'ajaxpublished'])->name('product.published');

//product attribute controller
Route::get('product-attribute-form/{id}', [ProductAttributeController::class, 'index'])->name('product-att-form');



Route::get('delete/category/{id}', [CategoryDeleteController::class, 'deleteCat'])->name('delete.cat');