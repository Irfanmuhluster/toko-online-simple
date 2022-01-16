<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
        
        /** produk */
        Route::resource('product', ProductController::class)->except([
            'show',
        ])->names([
            'index' => 'admin.product.index',
            'create' => 'admin.product.create',
            'store' => 'admin.product.store',
            'update' => 'admin.product.update',
            'destroy' => 'admin.product.destroy',
            'edit'  => 'admin.product.edit'
        ]);

        /** purchase */
        Route::resource('purchase', PurchaseController::class)->except([
            'show',
        ])->names([
            'index' => 'admin.purchase.index',
            'create' => 'admin.purchase.create',
            'store' => 'admin.purchase.store',
            'update' => 'admin.purchase.update',
            'destroy' => 'admin.purchase.destroy',
            'edit'  => 'admin.purchase.edit'
        ]);
        Route::get('/purchase/get/{param}', [PurchaseController::class, 'searchByParam'])->name('get');
        
    });
});

Route::group(['middleware' => ['role:user']], function () {
    //
    Route::prefix('user')->group(function () {
        Route::get('/shop', [App\Http\Controllers\Customer\CustomerController::class, 'index'])->name('user.home');
        Route::post('/shop/store', [App\Http\Controllers\Customer\CustomerController::class, 'store'])->name('user.store.home');
        Route::get('/shop/cart', [App\Http\Controllers\Customer\CustomerController::class, 'cart'])->name('user.cart');
        Route::post('/shop/store/update', [App\Http\Controllers\Customer\CustomerController::class, 'cartupdate'])->name('user.cart.update');
        Route::get('/shop/store/checkout', [App\Http\Controllers\Customer\CustomerController::class, 'checkout'])->name('user.cart.checkout');
        
    });
});
