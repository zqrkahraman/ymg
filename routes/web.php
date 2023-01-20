<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactUsSendMailController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FilterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Cookie;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'affiliate']
], function()
{
    Route::get('/{filter}', [ShopController::class, 'index'])->whereIn('filter', ['popular', 'new-audio-guides', 'best-city', 'all'])->name("filter");
	Route::get('/', [HomeController::class, 'index'])->name("home");

    Route::prefix('audioguides', [ShopController::class, 'index'])->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name("shop");
        Route::get('/{country?}', [CountryController::class, 'index'])->name("category");
        Route::get('/{country?}/{city?}', [CityController::class, 'index'])->name("sub-category");
        Route::get('/{country?}/{city?}/{product?}', [ProductController::class, 'index'])->name("product");
    });

    Route::prefix('info')->group(function () {
        Route::get('/{page?}', [InfoController::class, 'index'])->name('info');
    });

    Route::post('/availability', [AvailabilityController::class, 'store']);
    Route::post('/cart', [CartController::class, 'store']);

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment/stripe', [PaymentController::class, 'stripe'])->name('payment.stripe');
    Route::post('/payment/order', [PaymentController::class, 'order'])->name('payment.order');
    Route::get('/payment/completed', [PaymentController::class, 'completed'])->name('payment.completed');

	Route::get('/search', [SearchController::class, 'index'])->name("search");
    Route::post('/comments', [CommentsController::class, 'store']);
    Route::post("/contact-us-send-mail", [ContactUsSendMailController::class, "index"])->name('contact-us-send-mail');
});