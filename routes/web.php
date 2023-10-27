<?php

use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\GhihdController;
use App\Http\Controllers\GhipnController;
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
    //<ghihd>
        Route::get('ghihds', [GhihdController::class, 'index'])->name('ghihds')->middleware('permission.checker:admin|staff');
        Route::get('ghihds/create', [GhihdController::class, 'create'])->name('ghihds.create')->middleware('permission.checker:admin|staff');
        Route::post('ghihds',[GhihdController::class,'store'])->name('ghihds.store')->middleware('permission.checker:admin');
        Route::get('ghihds/{bill_id}/{medicine_id}', [GhihdController::class, 'edit'])->name('ghihds.edit')->middleware('permission.checker:admin|staff');
        Route::match(['put','patch'],'ghihds/{bill_id}/{medicine_id}', [GhihdController::class, 'update'])->name('ghihds.update')->middleware('permission.checker:admin|staff');
        Route::delete('ghihds/{bill_id}/{medicine_id}',[GhihdController::class, 'destroy'])->name('ghihds.destroy')->middleware('permission.checker:admin|staff');
    //</ghihd>
    //<customer>
        Route::get('customers', [SalesController::class, 'index'])->name('customers')->middleware('permission.checker:admin|cashier|staff');
        Route::get('customers/create', [SalesController::class, 'create'])->name('customers.create')->middleware('permission.checker:admin|staff');
        Route::post('customers',[SalesController::class,'store'])->name('customers.store')->middleware('permission.checker:admin|staff');
        Route::get('customers/{KHID}', [SalesController::class, 'edit'])->name('customers.edit')->middleware('permission.checker:admin|staff');
        Route::match(['put','patch'],'customers/{KHID}', [SalesController::class, 'update'])->name('customers.update')->middleware('permission.checker:admin|staff');
        Route::delete('customers/{KHID}',[SalesController::class, 'destroy'])->name('customers.destroy')->middleware('permission.checker:admin|staff');
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
    Route::get('medicines', [MedicineController::class, 'index'])->name('medicines')->middleware('permission.checker:admin|staff');
    Route::get('medicines/create', [MedicineController::class, 'create'])->name('medicines.create')->middleware('permission.checker:admin|staff');
    Route::post('medicines',[MedicineController::class,'store'])->name('medicines.store')->middleware('permission.checker:admin|staff');
    Route::get('medicines/{ThuocID}', [MedicineController::class, 'edit'])->name('medicines.edit')->middleware('permission.checker:admin|staff');
    Route::match(['put','patch'],'medicines/{ThuocID}', [MedicineController::class, 'update'])->name('medicines.update')->middleware('permission.checker:admin|staff');
    Route::delete('medicines/{ThuocID}',[MedicineController::class, 'destroy'])->name('medicines.destroy')->middleware('permission.checker:admin|staff');
    // Route::resource('/medicines', MedicineController::class)->middleware('permission.checker:admin|staff');
//</thuoc>
//<price>
    Route::get('prices', [PriceController::class, 'index'])->name('prices')->middleware('permission.checker:admin|staff');
    Route::get('prices/create', [PriceController::class, 'create'])->name('prices.create')->middleware('permission.checker:admin');
    Route::post('prices',[PriceController::class,'store'])->name('prices.store')->middleware('permission.checker:admin');
    Route::get('prices/{ngay_id}/{medicine_id}/edit', [PriceController::class, 'priceEdit'])->name('prices.priceEdit')->middleware('permission.checker:admin');
    Route::match(['put', 'patch'], 'prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceUpdate'])->name('prices.priceUpdate')->middleware('permission.checker:admin');
    Route::delete('prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceDestroy'])->name('prices.priceDestroy')->middleware('permission.checker:admin');
    // Route::resource('/prices', PriceController::class);
//</price>

//<ncc>
    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers')->middleware('permission.checker:admin|cashier|staff');
    Route::get('suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create')->middleware('permission.checker:admin|staff');
    Route::post('suppliers',[SupplierController::class,'store'])->name('suppliers.store')->middleware('permission.checker:admin|staff');
    Route::get('suppliers/{NCCID}', [SupplierController::class, 'edit'])->name('suppliers.edit')->middleware('permission.checker:admin|staff');
    Route::match(['put','patch'],'suppliers/{NCCID}', [SupplierController::class, 'update'])->name('suppliers.update')->middleware('permission.checker:admin|staff');
    Route::delete('suppliers/{NCCID}',[SupplierController::class, 'destroy'])->name('suppliers.destroy')->middleware('permission.checker:admin|staff');
    // Route::resource('/suppliers', SupplierController::class)->middleware('permission.checker:admin|staff');
//</ncc>
//<nsx>
    Route::get('producers', [ProducerController::class, 'index'])->name('producers')->middleware('permission.checker:admin|cashier|staff');
    Route::get('producers/create', [ProducerController::class, 'create'])->name('producers.create')->middleware('permission.checker:admin|staff');
    Route::post('producers',[ProducerController::class,'store'])->name('producers.store')->middleware('permission.checker:admin|staff');
    Route::get('producers/{NSXID}', [ProducerController::class, 'edit'])->name('producers.edit')->middleware('permission.checker:admin|staff');
    Route::match(['put','patch'],'producers/{NSXID}', [ProducerController::class, 'update'])->name('producers.update')->middleware('permission.checker:admin|staff');
    Route::delete('producers/{NSXID}',[ProducerController::class, 'destroy'])->name('producers.destroy')->middleware('permission.checker:admin|staff');
    // Route::resource('/producers', ProducerController::class)->middleware('permission.checker:admin|staff');
//</nsx>
//<nhomthuoc>
    Route::get('druggr', [DruggrController::class, 'index'])->name('druggr')->middleware('permission.checker:admin|staff');
    Route::get('druggr/create', [DruggrController::class, 'create'])->name('druggr.create')->middleware('permission.checker:admin|staff');
    Route::post('druggr',[DruggrController::class,'store'])->name('druggr.store')->middleware('permission.checker:admin|staff');
    Route::get('druggr/{NhomthuocID}', [DruggrController::class, 'edit'])->name('druggr.edit')->middleware('permission.checker:admin|staff');
    Route::match(['put','patch'],'druggr/{NhomthuocID}', [DruggrController::class, 'update'])->name('druggr.update')->middleware('permission.checker:admin|staff');
    Route::delete('druggr/{NhomthuocID}',[DruggrController::class, 'destroy'])->name('druggr.destroy')->middleware('permission.checker:admin|staff');
    // Route::resource('/druggr', DruggrController::class)->middleware('permission.checker:admin|staff');
//</nhomthuoc>
//<kho>
    Route::get('/createpn', [ImportmedicinesController::class, 'createpn'])->name('importmedicines.createpn')->middleware('permission.checker:admin|staff');
    Route::post('/createpn', [ImportmedicinesController::class, 'createAndStore'])->name('importmedicines.createAndStore')->middleware('permission.checker:admin|staff');
    Route::match(['get', 'head'],'/importmedicines', [ImportmedicinesController::class, 'index'])->name('importmedicines')->middleware('permission.checker:admin|staff');
    Route::get('importmedicines/{PNID}', [ImportmedicinesController::class, 'edit'])->name('importmedicines.edit')->middleware('permission.checker:admin|staff');
    Route::match(['put','patch'],'importmedicines/{PNID}', [ImportmedicinesController::class, 'update'])->name('importmedicines.update')->middleware('permission.checker:admin|staff');
    Route::delete('importmedicines/{PNID}', [ImportmedicinesController::class, 'destroy'])->name('importmedicines.destroy')->middleware('permission.checker:admin|staff');
//</kho>
//<kiemkho>
    Route::get('/checkinventory', [CheckinventoryController::class, 'index'])->name('checkinventory')->middleware('permission.checker:admin|staff');
    Route::get('checkinventory/create', [CheckinventoryController::class, 'create'])->name('checkinventory.create')->middleware('permission.checker:admin');
    Route::post('checkinventory',[CheckinventoryController::class,'store'])->name('checkinventory.store')->middleware('permission.checker:admin');
    Route::get('checkinventory/{warehouse_id}/{medicine_id}', [CheckinventoryController::class, 'edit'])->name('checkinventory.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'checkinventory/{warehouse_id}/{medicine_id}', [CheckinventoryController::class, 'update'])->name('checkinventory.update')->middleware('permission.checker:admin');
    Route::delete('checkinventory/{warehouse_id}/{medicine_id}',[CheckinventoryController::class, 'destroy'])->name('checkinventory.destroy')->middleware('permission.checker:admin');
//</kiemkho>
//<ghipn>
    Route::get('ghipns', [GhipnController::class, 'index'])->name('ghipns')->middleware('permission.checker:admin|staff');
    Route::get('ghipns/create', [GhipnController::class, 'create'])->name('ghipns.create')->middleware('permission.checker:admin|staff');
    Route::post('ghipns',[GhipnController::class,'store'])->name('ghipns.store')->middleware('permission.checker:admin|staff');
    Route::get('ghipns/{phieunhap_id}/{medicine_id}', [GhipnController::class, 'edit'])->name('ghipns.edit')->middleware('permission.checker:admin|staff');
    Route::match(['put','patch'],'ghipns/{phieunhap_id}/{medicine_id}', [GhipnController::class, 'update'])->name('ghipns.update')->middleware('permission.checker:admin|staff');
    Route::delete('ghipns/{phieunhap_id}/{medicine_id}',[GhipnController::class, 'destroy'])->name('ghipns.destroy')->middleware('permission.checker:admin|staff');
//</ghipn>
//<nhanvien>
    Route::get('staffs', [StaffController::class, 'index'])->name('staffs')->middleware('permission.checker:admin');
    Route::get('staffs/create', [StaffController::class, 'create'])->name('staffs.create')->middleware('permission.checker:admin');
    Route::post('staffs',[StaffController::class,'store'])->name('staffs.store')->middleware('permission.checker:admin');
    Route::get('staffs/{NVID}', [StaffController::class, 'edit'])->name('staffs.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'staffs/{NVID}', [StaffController::class, 'update'])->name('staffs.update')->middleware('permission.checker:admin');
    Route::delete('staffs/{NVID}',[StaffController::class, 'destroy'])->name('staffs.destroy')->middleware('permission.checker:admin');
    // Route::resource('/staffs', StaffController::class)->middleware('permission.checker:admin');
//</nhanvien>
//<checks>
    Route::get('/bills', [BillsController::class, 'index'])->name('bills')->middleware('permission.checker:admin|staff'); //hoadonban
    Route::get('pay/{HDID}', [BillsController::class, 'indexpay'])->name('pay')->middleware('permission.checker:admin|staff');
    Route::match(['put', 'patch'], 'pay/{HDID}', [BillsController::class, 'updatehd'])->name('updatehd')->middleware('permission.checker:admin|staff');
    Route::get('bills/{HDID}', [BillsController::class, 'edit'])->name('bills.edit')->middleware('permission.checker:admin|staff');
    Route::match(['put','patch'],'bills/{HDID}', [BillsController::class, 'update'])->name('bills.update')->middleware('permission.checker:admin|staff');
    Route::delete('bills/{HDID}', [BillsController::class, 'destroy'])->name('bills.destroy')->middleware('permission.checker:admin');

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


