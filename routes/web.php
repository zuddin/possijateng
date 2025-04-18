<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;



//route login
Route::get('/login', Auth\Login::class)->name('login');

//route group account
Route::middleware('auth:atlet')->group(function () {
    
    Route::group(['prefix' => 'account'], function () {
        
        //route my order
        Route::get('/my-orders', Account\MyOrders\Index::class)->name('account.my-orders.index');
        Route::get('/my-orders/{id}', Account\MyOrders\Show::class)->name('account.my-orders.show');
        //Route::get('/my-order', Account\MyOrders\Show::class)->name('account.my-orders.show');
        Route::get('/my-profile', Account\MyProfile\Index::class)->name('account.my-profile');
        //route password
        Route::get('/password', Account\Password\Index::class)->name('account.password');
  
    });

});

//route home
Route::get('/', Web\Home\Index::class)->name('home');

//route products index
Route::get('/nomor_perlombaan', Web\NomorPerlombaan\Index::class)->name('web.nomorperlombaan.index');

//route cart
Route::get('/cart', Web\Cart\Index::class)->name('web.cart.index')->middleware('auth:atlet');
Route::get('/checkout', Web\Checkout\Index::class)->name('web.checkout.index')->middleware('auth:atlet');
Route::get('/checkout/btn-checkout', Web\Checkout\BtnCheckout::class)->name('web.checkout.btn-checkout')->middleware('auth:atlet');
//Route::get('/checkout', Index::class)->name('checkout');

//Route::get('/konfirmasi/{transaction}', [KonfirmasiController::class, 'index'])->name('konfirmasi');
//use App\Http\Livewire\Web\Checkout\Konfirmasi;

//Route::get('/checkout/konfirmasi/{id?}', Web\Checkout\Konfirmasi::class)->name('web.checkout.konfirmasi');

//Route::get('/checkout', Web\Checkout\Index::class)->name('web.checkout.index')->middleware('auth:atlet');
//Route::get('/checkout/btn-checkout', Web\Checkout\BtnCheckout::class)->name('web.checkout.btn-checkout')->middleware('auth:atlet');
//Route::get('/checkout/konfirmasi', Web\Checkout\Konfirmasi::class)->name('web.checkout.konfirmasi')->middleware('auth:atlet');
//Route::get('/checkout/konfirmasi/{transaction_id}', Web\Checkout\Konfirmasi::class)->name('web.checkout.konfirmasi')->middleware('auth:atlet');
//Route::get('/checkout/confirmation/{transaction_id}', Web\Checkout\Konfirmasi::class)->name('web.checkout.confirmation')->middleware('auth:atlet');
//Route::get('/checkout/confirmation/{transaction_id}', Web\Checkout\Konfirmasi::class)->name('web.checkout.confirmation')->middleware('auth:atlet');
//Route::get('/checkout/confirmation/{transaction_id}', Web\Checkout\Konfirmasi::class)->name('web.checkout.confirmation')->middleware('auth:atlet');
//Route::get('/checkout/confirmation/{transaction_id}', Web\Checkout\Konfirmasi::class)->name('web.checkout.confirmation')->middleware('auth:atlet');
//Route::get('/checkout/confirmation/{transaction_id}', Web\Checkout\Konfirmasi::class)->name('web.checkout.confirmation')->middleware('auth:atlet');
//Route::get('/checkout/confirmation/{transaction_id}', Web\Checkout\Konfirmasi::class)->name('web.checkout.confirmation')->middleware('auth:atlet');
//use App\Http\Livewire\Web\Checkout\Index;

//Route::get('/checkout', Index::class)->name('checkout.index');

//use App\Http\Livewire\Web\Checkout\Konfirmasi;

//Route::get('/checkout/confirmation/{transaction_id}', Konfirmasi::class)->name('checkout.confirmation');
//Route::get('/checkout', Index::class)->name('checkout');
