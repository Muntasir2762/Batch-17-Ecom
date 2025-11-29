<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/return-process', [HomeController::class, 'returnProcess']);
Route::get('/view-cart', [HomeController::class, 'viewCart']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/category-products/{id}', [HomeController::class, 'categoryProducts']);
Route::get('/sub-category-products/{slug}', [HomeController::class, 'subCategoryProducts']);
Route::get('/product-details/{slug}', [HomeController::class, 'productDetails']);
Route::get('/view-type-products/{product_type}', [HomeController::class, 'viewTypeProducts']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [HomeController::class, 'termsCondition']);
Route::get('/refund-policy', [HomeController::class, 'refundPolicy']);
Route::get('/payment-policy', [HomeController::class, 'paymentPolicy']);
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/contact-us', [HomeController::class, 'contactUs']);
Route::post('/contact-message-store', [HomeController::class, 'contactMessageStore']);

//Cart Routes...
Route::post('/product-details/addtocart', [HomeController::class, 'addToCartDetails']);
Route::get('/product/addtocart/{id}', [HomeController::class, 'addToCart']);
Route::get('/product/deletecart/{id}', [HomeController::class, 'deleteCart']);

//Checkout Routes...
Route::post('/store-order', [HomeController::class, 'confirmOrder']);
Route::get('/success-order/{order_id}', [HomeController::class, 'successOrder']);


//Admin Login
Route::get('/admin/login',[AuthController::class, 'adminLoginFrom']);

Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

//Category Routes..
Route::get('/admin/create/category', [CategoryController::class, 'createCategory']);
Route::post('/admin/store/category', [CategoryController::class, 'storeCategory']);
Route::get('/admin/list/category', [CategoryController::class, 'listCategory']);
Route::get('/admin/delete/category/{id}', [CategoryController::class, 'deleteCategory']);
Route::get('/admin/edit/category/{id}', [CategoryController::class, 'editCategory']);
Route::post('/admin/update/category/{id}', [CategoryController::class, 'updateCategory']);

//SubCategory Routes...
Route::get('/admin/create/sub-category', [SubCategoryController::class, 'createSubCategory']);
Route::post('/admin/store/sub-category', [SubCategoryController::class, 'storeSubCategory']);
Route::get('/admin/list/sub-category', [SubCategoryController::class, 'showSubCategory']);
Route::get('/admin/delete/sub-category/{id}', [SubCategoryController::class, 'deleteSubCategory']);
Route::get('/admin/edit/sub-category/{id}', [SubCategoryController::class, 'editSubCategory']);
Route::post('/admin/update/sub-category/{id}', [SubCategoryController::class, 'updateSubCategory']);

//Product Routes...
Route::get('/admin/create/product', [ProductController::class, 'createProduct']);
Route::post('/admin/store/product', [ProductController::class, 'storeProduct']);
Route::get('/admin/list/product', [ProductController::class, 'showProduct']);
Route::get('/admin/edit/product/{id}', [ProductController::class, 'editProduct']);
Route::post('/admin/update/product/{id}', [ProductController::class, 'updateProduct']);
Route::get('/admin/delete/product/{id}', [ProductController::class, 'deleteProduct']);

//Color, Size, GalleryImage Delete Routes...
Route::get('/admin/delete/color/{id}', [ProductController::class, 'deleteColor']);
Route::get('/admin/delete/size/{id}', [ProductController::class, 'deleteSize']);
Route::get('/admin/delete/gallerimage/{id}', [ProductController::class, 'deleteGalleryImage']);


//Settings...
Route::get('/admin/show-general-setting', [SettingsController::class, 'showSettings']);
Route::post('/admin/show-general-setting/update', [SettingsController::class, 'updateSettings']);
Route::get('/admin/show-policies', [SettingsController::class, 'showPolicies']);
Route::post('/admin/update-policies', [SettingsController::class, 'updatePolicies']);