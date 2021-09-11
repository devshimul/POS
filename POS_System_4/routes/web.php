<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\POS\categoryController;
use App\Http\Controllers\POS\customerController;
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
    Route::post('/setting', [HomeController::class, 'save'])->name('setting.save');
    Route::get('/{id}/profile', [HomeController::class, 'profile'])->name('profile.index');
    Route::post('/profile', [HomeController::class, 'profileupdate'])->name('profile.save');

    #################################################################
    ####################[[[[[ Product Route ]]]]]####################
    #################################################################
    Route::get('/add-product', [productController::class, 'index'])->name('product.add');
    Route::post('/store-product', [productController::class, 'store'])->name('product.store');
    Route::get('/view-product', [productController::class, 'view'])->name('product.view');
    Route::post('/edit-product', [productController::class, 'edit'])->name('product.edit');
    Route::post('/update-product', [productController::class, 'update'])->name('product.update');
    Route::post('/delete-product', [productController::class, 'delete'])->name('product.delete');
    Route::get('/stock', [productController::class, 'stock'])->name('product.stock');

    #################################################################
    ####################[[[[[ Supplier Route ]]]]]###################
    #################################################################
    Route::get('/add-supplier', [supplierController::class, 'index'])->name('supplier.add');
    Route::post('/store-supplier', [supplierController::class, 'store'])->name('supplier.store');
    Route::get('/view-supplier', [supplierController::class, 'view'])->name('supplier.view');
    Route::post('/edit-supplier', [supplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/update-supplier', [supplierController::class, 'update'])->name('supplier.update');
    Route::post('/delete-supplier', [supplierController::class, 'delete'])->name('supplier.delete');

    #################################################################
    ####################[[[[[ Purchase Route ]]]]]###################
    #################################################################
    Route::get('/purchase', [purchaseController::class, 'purchase'])->name('purchase.index');
    Route::post('/store-purchase', [purchaseController::class, 'store'])->name('purchase.store');
    
    Route::get('/getproducts', [purchaseController::class, 'getProducts'])->name('getproducts');
    Route::get('/getProductDetails', [purchaseController::class, 'getProductDetails'])->name('getProductDetails');
    
    #################################################################
    ####################[[[[[ Customer Route ]]]]]###################
    #################################################################
    Route::get('/add-customer', [customerController::class, 'index'])->name('customer.add');
    Route::post('/store-customer', [customerController::class, 'store'])->name('customer.store');
    Route::get('/view-customer', [customerController::class, 'view'])->name('customer.view');
    Route::post('/edit-customer', [customerController::class, 'edit'])->name('customer.edit');
    Route::post('/update-customer', [customerController::class, 'update'])->name('customer.update');
    Route::post('/delete-customer', [customerController::class, 'delete'])->name('customer.delete');

    #################################################################
    #####################[[[[[ Sales Route ]]]]]#####################
    #################################################################
    Route::get('/sale', [saleController::class, 'index'])->name('sale.index');
    Route::get('/sale-report', [saleController::class, 'report'])->name('sale.report');

    #################################################################
    ####################[[[[[ Category Route ]]]]]###################
    #################################################################
    Route::get('/add-category', [categoryController::class, 'add'])->name('category.add');
    Route::post('/add-category', [categoryController::class, 'store']);
    Route::post('/edit-category', [categoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category', [categoryController::class, 'update'])->name('category.update');
    Route::get('/view-category', [categoryController::class, 'view'])->name('category.view');
    Route::post('/delete-category', [categoryController::class, 'delete'])->name('category.delete');

    #################################################################
    ####################[[[[[ Unit Route ]]]]]#######################
    #################################################################
    Route::get('/add-unit', [unitController::class, 'add'])->name('unit.add');
    Route::post('/add-unit', [unitController::class, 'store']);
    Route::get('/view-unit', [unitController::class, 'view'])->name('unit.view');
    Route::post('/edit-unit', [unitController::class, 'edit'])->name('unit.edit');
    Route::post('/update-unit', [unitController::class, 'update'])->name('unit.update');
    Route::post('/delete-unit', [unitController::class, 'delete'])->name('unit.delete');

});


require __DIR__.'/auth.php';
