<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CheckproductController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
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
Route::get('/sub-category', [SubCategoryController::class, 'allSubCategory'])->name('subcategory.api');
Route::post('/edit-sub-category', [SubCategoryController::class, 'editSubCat'])->name('subcategory.edit');
Route::post('/update-sub-category', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::post('/delete-sub-category', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');


//Brand route
Route::resource('brand', BrandController::class);
Route::get('/all-brand', [BrandController::class, 'allBrand'])->name('brand.all.show');
Route::post('/edit-brand', [BrandController::class, 'editBrand'])->name('brand.edit');
Route::post('/update-brand', [BrandController::class, 'updateBrand'])->name('brand.update');
//Route::post('/delete-brand', [BrandController::class, 'deleteBrand'])->name('brand.delete');


//Product route
Route::resource('product', ProductController::class);
Route::get('/ajax-category', [ProductController::class, 'getCategoryAjax'])->name('active.category');
Route::post('/ajax-sub-category', [ProductController::class, 'getSubCategoryAjax'])->name('active.subcategory');



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


//slider resource controller
Route::resource('slider', SliderController::class);


//check for product variation in this route
Route::resource('check', CheckproductController::class);























