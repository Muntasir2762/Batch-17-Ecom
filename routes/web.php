<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/return-process', [HomeController::class, 'returnProcess']);
Route::get('/view-cart', [HomeController::class, 'viewCart']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/category-products', [HomeController::class, 'categoryProducts']);
Route::get('/sub-category-products', [HomeController::class, 'subCategoryProducts']);
Route::get('/product-details', [HomeController::class, 'productDetails']);
Route::get('/view-type-products', [HomeController::class, 'viewTypeProducts']);