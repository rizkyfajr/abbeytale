<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\HomeBackendController;
use App\Http\Controllers\HomeFrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterCustomerController;
use App\Http\Controllers\CartFrontendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderBackendController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomerBackendController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\ShippingProviderController;
use App\Http\Controllers\DiscountBackendController;
use App\Http\Middleware\IsAdmin;


// Frontend Routes
Route::get('/', [HomeFrontendController::class, 'index'])->name('welcome');
Route::get('/shop', [HomeFrontendController::class, 'shop'])->name('shop');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Customer Auth Routes
Route::view('/customer-auth', 'backend-auth')->name('backend-auth');
Route::get('/customer-regist', [RegisterCustomerController::class, 'index'])->name('customer-regist');
Route::post('/actionRegistCustomer', [RegisterCustomerController::class, 'actionRegistCustomer'])->name('actionRegistCustomer');
Route::post('/customer-login', [RegisterCustomerController::class, 'login'])->name('login-customer');

// Cart & Checkout Routes
Route::post('/cart/add/{product}', [CartFrontendController::class, 'addCart'])->name('cart.add');
Route::delete('/cart/remove/{item}', [CartFrontendController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/history', [CheckoutController::class, 'history'])->name('history.index');
Route::get('/history/{order}', [CheckoutController::class, 'showHistory'])->name('history.showHistory');

// Payment Routes
Route::get('/payment', [CheckoutController::class, 'payment'])->name('frontend.payment.index');
Route::post('/payment/{order}', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/attachment/{order}', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/confirmation/{paymentId}', [PaymentController::class, 'confirmation'])->name('payment.confirmation');

//checkdiscount

Route::get('/discounts/check/{code}', [CheckoutController::class, 'checkDiscount']);

// Admin Routes (With Middleware)
Route::middleware(['auth',IsAdmin::class])->group(function () {
    Route::get('/dashboard', [HomeBackendController::class, 'index'])->name('dashboard');

    Route::resource('pegawai', PegawaiController::class);
    Route::resource('bagian', BagianController::class);
    Route::resource('orders', OrderBackendController::class);
    Route::resource('customers', CustomerBackendController::class);

    // Banner Routes

     Route::resource('banner', SettingController::class)->except(['createBanner','storeBanner']); // Exclude the default 'create' route
    Route::get('banner/createBanner', [SettingController::class, 'createBanner'])->name('banner.createBanner'); // Add a custom 'create' route
    Route::get('banner', [SettingController::class, 'indexBanner'])->name('banner.index');
    Route::post('banner/storeBanner', [SettingController::class, 'storeBanner'])->name('banner.storeBanner');
    Route::post('banner/updateBanner', [SettingController::class, 'updateBanner'])->name('banner.updateBanner');
    Route::post('banner/editBanner/{banner}', [SettingController::class, 'editBanner'])->name('banner.editBanner');
    Route::delete('/banner/destroyBanner/{banner}', [SettingController::class, 'destroyBanner'])->name('banner.destroyBanner');

    Route::resource('product-types', ProductTypeController::class);
    Route::get('/product-types', [ProductTypeController::class, 'index'])->name('product-types.index');
    Route::delete('/product-types/{product_type}', [ProductTypeController::class, 'destroy'])->name('product-types.destroy');

    //produk
    Route::resource('product', ProductController::class);
    // Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    // Route::get('/products/createForm', [ProductController::class, 'createForm'])->name('products.createForm');
    // Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    // Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Order Print Routes
    // Route::resource('order-be', OrderBackendController::class);
    Route::get('/order-be', [OrderBackendController::class, 'index'])->name('order-be.index');
    Route::get('/order-be/{order}', [OrderBackendController::class, 'show'])->name('order-be.show');

    Route::get('/order-be/{orderId}/print', [OrderBackendController::class, 'printOrder'])->name('order-be.print');
    Route::put('/order-be/{orderId}/update-status', [OrderBackendController::class, 'updateOrderStatus'])->name('order-be.updateStatus');

    Route::get('/order-be/print-multiple', [OrderBackendController::class, 'printMultiple'])->name('order-be.printMultiple');
    Route::get('/order-be/{order}/print-invoice', [OrderBackendController::class, 'printInvoice'])->name('order-be.printInvoice');
    Route::get('/order-be/{order}/print-packing-slip', [OrderBackendController::class, 'printPackingSlip'])->name('order-be.printPackingSlip');
    Route::get('/order-be/{order}/print-label', [OrderBackendController::class, 'printLabel'])->name('order-be.printLabel');

    Route::resource('payment-method', PaymentMethodController::class);


    Route::get('/website-setting', [WebsiteSettingController::class, 'index'])->name('website-setting.index');
    Route::put('/website-setting/{id}', [WebsiteSettingController::class, 'update'])->name('website-setting.update');


    Route::resource('discount', DiscountBackendController::class)->except(['storeDiscount']);
    Route::post('discount/storeDiscount', [DiscountBackendController::class, 'storeDiscount'])->name('discount.storeDiscount');

    // Shipping Provider Routes
    Route::resource('shipping_providers', ShippingProviderController::class);

});

// Profile Routes (With Middleware)
Route::middleware('auth')->group(function () {
    Route::resource('profile', ProfileController::class)->only(['edit', 'update', 'destroy']);
});

// Fallback Route
Route::fallback(function () {
    return redirect()->route('welcome');
});

require __DIR__.'/auth.php';
