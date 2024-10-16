<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('frontend/introduce', [FrontendController::class, 'introduce']);
Route::get('frontend/login', [FrontendController::class, 'login']);
Route::get('frontend/apparel', [FrontendController::class, 'apparel']);
// Route::get('upcoming/index', [FrontendController::class, 'upcoming']);
Route::get('frontend/music', [FrontendController::class, 'music']);

Route::controller(\App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('products','products')->name('frontend.products');
    Route::get('product/{slug}','productShow')->name('frontend.product.show');

    Route::get('product-add-cart','productAddCart')->name('frontend.product.add.cart')
        ->middleware('auth');

    Route::get('orders','orders')->name('frontend.orders');

    Route::get('/','index')->name('index');
    Route::get('upcoming','upcomings')->name('frontend.upcomings');
    Route::get('upcoming/{slug}','upcomingShow')->name('frontend.upcoming.show');

    Route::get('upcoming-add-cart','upcomingAddCart')->name('frontend.upcoming.add.cart')
        ->middleware('auth');
//    Route::get('carts','carts')->name('frontend.carts');
});

Route::controller(\App\Http\Controllers\Frontend\CartController::class)->middleware('auth')->group(function () {
    Route::get('cart','index')->name('frontend.carts');
    Route::post('add-cart/{id}', 'store')->name('frontend.add-cart');
    Route::post('update-cart', 'update')->name('frontend.update-cart');
    Route::post('remove-cart-item', 'destroy')->name('remove-cart');
});


Route::controller(\App\Http\Controllers\Frontend\CheckoutController::class)->middleware('auth')->group(function () {
    Route::get('checkout','index')->name('checkout');
    Route::post('checkout', 'store')->name('checkout-store');
});
Route::controller(\App\Http\Controllers\Frontend\ContactController::class)->middleware('auth')->group(function () {
    Route::get('contact','index')->name('contact-requests');
    Route::post('contact', 'store')->name('contact-store');
});



Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');
        Route::get('category/edit/{id}', 'edit');
        Route::put('category/{id}', 'update');
        Route::get('category/delete/{id}', 'destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('brand', 'index');
        Route::get('brand/create', 'create');
        Route::post('brand', 'store');
        Route::get('brand/edit/{id}', 'edit');
        Route::put('brand/{id}', 'update');
        Route::get('brand/delete/{id}', 'destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\SubCategoryController::class)->group(function () {
        Route::get('subcategory', 'index');
        Route::get('subcategory/create', 'create');
        Route::post('subcategory', 'store');
        Route::get('subcategory/edit/{id}', 'edit');
        Route::put('subcategory/{id}', 'update');
        Route::get('subcategory/delete/{id}', 'destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('product', 'index');
        Route::get('product/create', 'create');
        Route::post('product', 'store');
        Route::get('product/edit/{id}', 'edit');
        Route::put('product/{id}', 'update');
        Route::get('product/delete/{id}', 'destroy');

        Route::get('product/image/{id}', 'showImage');
        Route::post('product/image/{id}', 'postImage');
        Route::get('product/image/delete/{id}', 'removeImage');
    });

    Route::controller(\App\Http\Controllers\Admin\UpcomingController::class)->group(function () {
        Route::get('upcoming', 'index');
        Route::get('upcoming/create', 'create');
        Route::post('upcoming', 'store');
        Route::get('upcoming/edit/{id}', 'edit');
        Route::put('upcoming/{id}', 'update');
        Route::get('upcoming/delete/{id}', 'destroy');

        Route::get('upcoming/image/{id}', 'showImage');
        Route::post('upcoming/image/{id}', 'postImage');
        Route::get('upcoming/image/delete/{id}', 'removeImage');
    });

    Route::controller(\App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('slider', 'index');
        Route::get('slider/create', 'create');
        Route::post('slider', 'store');
        Route::get('slider/edit/{id}', 'edit');
        Route::put('slider/{id}', 'update');
        Route::get('slider/delete/{id}', 'destroy');
    });
});
