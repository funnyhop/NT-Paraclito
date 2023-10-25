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
    //<customer>
        Route::get('customers', [SalesController::class, 'index'])->name('customers')->middleware('permission.checker:admin|cashier|staff');
        Route::get('customers/create', [SalesController::class, 'create'])->name('customers.create')->middleware('permission.checker:admin');
        Route::post('customers',[SalesController::class,'store'])->name('customers.store')->middleware('permission.checker:admin');
        Route::get('customers/{KHID}', [SalesController::class, 'edit'])->name('customers.edit')->middleware('permission.checker:admin');
        Route::match(['put','patch'],'customers/{KHID}', [SalesController::class, 'update'])->name('customers.update')->middleware('permission.checker:admin');
        Route::delete('customers/{KHID}',[SalesController::class, 'destroy'])->name('customers.destroy')->middleware('permission.checker:admin');
        // Route::resource('/customers', SalesController::class)->middleware('permission.checker:admin|staff');//khach hang
    //</customer>
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
    Route::get('medicines', [MedicineController::class, 'index'])->name('medicines')->middleware('permission.checker:admin|cashier|staff');
    Route::get('medicines/create', [MedicineController::class, 'create'])->name('medicines.create')->middleware('permission.checker:admin');
    Route::post('medicines',[MedicineController::class,'store'])->name('medicines.store')->middleware('permission.checker:admin');
    Route::get('medicines/{KHID}', [MedicineController::class, 'edit'])->name('medicines.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'medicines/{KHID}', [MedicineController::class, 'update'])->name('medicines.update')->middleware('permission.checker:admin');
    Route::delete('medicines/{KHID}',[MedicineController::class, 'destroy'])->name('medicines.destroy')->middleware('permission.checker:admin');
    // Route::resource('/medicines', MedicineController::class)->middleware('permission.checker:admin|staff');
//</thuoc>
//<price>
    Route::get('prices', [PriceController::class, 'index'])->name('prices')->middleware('permission.checker:admin|cashier|staff');
    Route::get('prices/create', [PriceController::class, 'create'])->name('prices.create')->middleware('permission.checker:admin');
    Route::post('prices',[PriceController::class,'store'])->name('prices.store')->middleware('permission.checker:admin');
    Route::get('prices/{ngay_id}/{medicine_id}/edit', [PriceController::class, 'priceEdit'])->name('prices.priceEdit')->middleware('permission.checker:admin');
    Route::match(['put', 'patch'], 'prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceUpdate'])->name('prices.priceUpdate')->middleware('permission.checker:admin');
    Route::delete('prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceDestroy'])->name('prices.priceDestroy')->middleware('permission.checker:admin');
    // Route::resource('/prices', PriceController::class);
//</price>

//<ncc>
    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers')->middleware('permission.checker:admin|cashier|staff');
    Route::get('suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create')->middleware('permission.checker:admin');
    Route::post('suppliers',[SupplierController::class,'store'])->name('suppliers.store')->middleware('permission.checker:admin');
    Route::get('suppliers/{NCCID}', [SupplierController::class, 'edit'])->name('suppliers.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'suppliers/{NCCID}', [SupplierController::class, 'update'])->name('suppliers.update')->middleware('permission.checker:admin');
    Route::delete('suppliers/{NCCID}',[SupplierController::class, 'destroy'])->name('suppliers.destroy')->middleware('permission.checker:admin');
    // Route::resource('/suppliers', SupplierController::class)->middleware('permission.checker:admin|staff');
//</ncc>
//<nsx>
    Route::get('producers', [ProducerController::class, 'index'])->name('producers')->middleware('permission.checker:admin|cashier|staff');
    Route::get('producers/create', [ProducerController::class, 'create'])->name('producers.create')->middleware('permission.checker:admin');
    Route::post('producers',[ProducerController::class,'store'])->name('producers.store')->middleware('permission.checker:admin');
    Route::get('producers/{NSXID}', [ProducerController::class, 'edit'])->name('producers.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'producers/{NSXID}', [ProducerController::class, 'update'])->name('producers.update')->middleware('permission.checker:admin');
    Route::delete('producers/{NSXID}',[ProducerController::class, 'destroy'])->name('producers.destroy')->middleware('permission.checker:admin');
    // Route::resource('/producers', ProducerController::class)->middleware('permission.checker:admin|staff');
//</nsx>
//<nhomthuoc>
    Route::get('druggr', [DruggrController::class, 'index'])->name('druggr')->middleware('permission.checker:admin|cashier|staff');
    Route::get('druggr/create', [DruggrController::class, 'create'])->name('druggr.create')->middleware('permission.checker:admin');
    Route::post('druggr',[DruggrController::class,'store'])->name('druggr.store')->middleware('permission.checker:admin');
    Route::get('druggr/{NhomthuocID}', [DruggrController::class, 'edit'])->name('druggr.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'druggr/{NhomthuocID}', [DruggrController::class, 'update'])->name('druggr.update')->middleware('permission.checker:admin');
    Route::delete('druggr/{NhomthuocID}',[DruggrController::class, 'destroy'])->name('druggr.destroy')->middleware('permission.checker:admin');
    // Route::resource('/druggr', DruggrController::class)->middleware('permission.checker:admin|staff');
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
    Route::get('staffs', [StaffController::class, 'index'])->name('staffs')->middleware('permission.checker:admin|cashier|staff');
    Route::get('staffs/create', [StaffController::class, 'create'])->name('staffs.create')->middleware('permission.checker:admin');
    Route::post('staffs',[StaffController::class,'store'])->name('staffs.store')->middleware('permission.checker:admin');
    Route::get('staffs/{NVID}', [StaffController::class, 'edit'])->name('staffs.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'staffs/{NVID}', [StaffController::class, 'update'])->name('staffs.update')->middleware('permission.checker:admin');
    Route::delete('staffs/{NVID}',[StaffController::class, 'destroy'])->name('staffs.destroy')->middleware('permission.checker:admin');
    // Route::resource('/staffs', StaffController::class)->middleware('permission.checker:admin');
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


