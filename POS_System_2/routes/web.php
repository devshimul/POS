<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\POS\categoryController;
use App\Http\Controllers\POS\productController;
use App\Http\Controllers\POS\purchaseController;
use App\Http\Controllers\POS\saleController;
use App\Http\Controllers\POS\supplierController;
use App\Http\Controllers\POS\unitController;
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

// Route::get('/', function () {
//     return view('index')->name('main.dashboard');
// });
Route::middleware(['auth'])->group( function(){

    Route::get('/', [HomeController::class, 'index'])->name('main.dashboard');
    Route::get('/view-user', [HomeController::class, 'viewUser'])->name('user.view');
    Route::get('/setting', [HomeController::class, 'setting'])->name('setting.index');

    #################################################################
    ####################[[[[[ Product Route ]]]]]####################
    #################################################################
    Route::get('/add-product', [productController::class, 'index'])->name('product.add');
    Route::post('/store-product', [productController::class, 'store'])->name('product.store');
    Route::get('/view-product', [productController::class, 'view'])->name('product.view');

    #################################################################
    ####################[[[[[ Supplier Route ]]]]]###################
    #################################################################
    Route::get('/add-supplier', [supplierController::class, 'index'])->name('supplier.add');
    Route::post('/store-supplier', [supplierController::class, 'store'])->name('supplier.store');
    Route::get('/view-supplier', [supplierController::class, 'view'])->name('supplier.view');

    #################################################################
    ####################[[[[[ Purchase Route ]]]]]###################
    #################################################################
    Route::get('/stock', [purchaseController::class, 'stock'])->name('stock.index');
    Route::get('/purchase', [purchaseController::class, 'purchase'])->name('purchase.index');
    Route::post('/store-purchase', [purchaseController::class, 'store'])->name('purchase.store');

    #################################################################
    ####################[[[[[ Sales Route ]]]]]###################
    #################################################################
    Route::get('/sale', [saleController::class, 'index'])->name('sale.index');
    Route::get('/sale-report', [saleController::class, 'report'])->name('sale.report');

    #################################################################
    ####################[[[[[ Category Route ]]]]]###################
    #################################################################
    Route::get('/add-category', [categoryController::class, 'add'])->name('category.add');
    Route::get('/view-category', [categoryController::class, 'view'])->name('category.view');

    #################################################################
    ####################[[[[[ Unit Route ]]]]]###################
    #################################################################
    Route::get('/add-unit', [unitController::class, 'add'])->name('unit.add');
    Route::get('/view-unit', [unitController::class, 'view'])->name('unit.view');

});


require __DIR__.'/auth.php';
