<?php

use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DruggrController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PrescriptionsController;
use App\Http\Controllers\CheckinventoryController;
use App\Http\Controllers\ImportmedicinesController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['web','guest'])->group(function () {
    Route::match(['get', 'post'], 'login', [Login::class, 'index'])->name('login');
});

Route::middleware(['web','auth'])->group(function () {
    Route::get('/', [Login::class, 'home'])->name('home');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
    Route::get('/profile', [Login::class, 'show'])->name('profile');
    Route::get('profile/{NVID}', [Login::class, 'edit'])->name('profile.edit');
    Route::match(['put','patch'], 'profile/{NVID}', [Login::class, 'update'])->name('profile.update');


//<banhang> ->middleware('permission.checker:admin|staff');
    //<route_sale>
        Route::get('/sales', [SalesController::class, 'salesindex'])->name('sales')->middleware('permission.checker:admin|staff');
        Route::post('/sales', [SalesController::class, 'createAndStore'])->name('sales.createAndStore')->middleware('permission.checker:admin|staff');
    //</route_sale>
    Route::resource('/customers', SalesController::class)->middleware('permission.checker:admin|staff');//khach hang
    //<toa>
        Route::get('/prescription', [SalesController::class, 'pre_index'])->name('prescription')->middleware('permission.checker:admin|staff');
        Route::get('/pre_create', [SalesController::class, 'pre_create'])->name('prescription.pre_create')->middleware('permission.checker:admin|staff');
        Route::post('/pre_create', [SalesController::class, 'pre_store'])->name('prescription.pre_store')->middleware('permission.checker:admin|staff');
        Route::get('/prescription/{ToaID}', [SalesController::class, 'pre_edit'])->name('prescription.pre_edit')->middleware('permission.checker:admin|staff');
        Route::match(['put','patch'],'/prescription/{ToaID}', [SalesController::class, 'pre_update'])->name('prescription.pre_update')->middleware('permission.checker:admin|staff');
        Route::delete('/prescription/{ToaID}', [SalesController::class, 'pre_destroy'])->name('prescription.pre_destroy')->middleware('permission.checker:admin|staff');
    //</toa>
//</banhang>
//<thuoc>
    Route::resource('/medicines', MedicineController::class)->middleware('permission.checker:admin|staff');
//</thuoc>
//<price>
    Route::get('prices/{ngay_id}/{medicine_id}/edit', [PriceController::class, 'priceEdit'])->name('prices.priceEdit')->middleware('permission.checker:admin');
    Route::match(['put', 'patch'], 'prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceUpdate'])->name('prices.priceUpdate')->middleware('permission.checker:admin');
    Route::delete('prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceDestroy'])->name('prices.priceDestroy')->middleware('permission.checker:admin');
    Route::resource('/prices', PriceController::class);
//</price>

//<ncc>
    Route::resource('/suppliers', SupplierController::class)->middleware('permission.checker:admin|staff');
//</ncc>
//<nsx>
    Route::resource('/producers', ProducerController::class)->middleware('permission.checker:admin|staff');
//</nsx>
//<nhomthuoc>
    Route::resource('/druggr', DruggrController::class)->middleware('permission.checker:admin|staff');
//</nhomthuoc>
//<kho>
    Route::get('/createpn', [ImportmedicinesController::class, 'createpn'])->name('importmedicines.createpn');
    Route::post('/createpn', [ImportmedicinesController::class, 'createAndStore'])->name('importmedicines.createAndStore');
    Route::match(['get', 'head'],'/importmedicines', [ImportmedicinesController::class, 'index'])->name('importmedicines');
//</kho>
//<kiemkho>
    Route::get('/checkinventory', [CheckinventoryController::class, 'index'])->name('checkinventory');
//</kiemkho>
//<nhanvien>
    Route::resource('/staffs', StaffController::class)->middleware('permission.checker:admin');
//</nhanvien>
//<checks>
    Route::get('/bills', [BillsController::class, 'index'])->name('bills'); //hoadonban
    Route::get('pay/{HDID}', [BillsController::class, 'indexpay'])->name('pay');
    Route::match(['put', 'patch'], 'pay/{HDID}', [BillsController::class, 'updatehd'])->name('updatehd');

    Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue')->middleware('permission.checker:admin');
    Route::post('/revenue', [RevenueController::class, 'see_revenue'])->name('see_revenue')->middleware('permission.checker:admin');
    //<403>
        Route::get('403', [RevenueController::class, 'index403'])->name('403');
    //</403>
//</checks>

});
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


