<?php

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
Route::get('/', function () {
    return view('welcome');
});
// banhang
Route::get('sales', [SalesController::class, 'salesindex'])->name('/sales');
Route::resource('/customers', SalesController::class);

Route::get('/prescription', [SalesController::class, 'pre_index'])->name('prescription');
Route::match(['get','post'],'/prescription', [SalesController::class, 'pre_create'])->name('prescription.pre_create');
// Route::post('/prescription', [SalesController::class, 'pre_store'])->name('prescription.pre_store');
Route::get('/prescription/{ToaID}', [SalesController::class, 'pre_edit'])->name('prescription.pre_edit');
Route::get('/prescription', [SalesController::class, 'pre_update'])->name('prescription.pre_update');
Route::get('/prescription', [SalesController::class, 'pre_destroy'])->name('prescription.pre_destroy');

// thuoc
Route::resource('/medicines', MedicineController::class);
////////////
Route::get('prices/{ngay_id}/{medicine_id}/edit', [PriceController::class, 'priceEdit'])->name('prices.priceEdit');
Route::match(['put', 'patch'], 'prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceUpdate'])->name('prices.priceUpdate');
Route::delete('prices/{ngay_id}/{medicine_id}', [PriceController::class, 'priceDestroy'])->name('prices.priceDestroy');

Route::resource('/prices', PriceController::class);

//
//
///////////////ncc
Route::resource('/suppliers', SupplierController::class);

///////////////nsx
Route::resource('/producers', ProducerController::class);

///////////////nhomthuoc
Route::resource('/druggr', DruggrController::class);

// kho
Route::get('/createpn', [ImportmedicinesController::class, 'createpn'])->name('importmedicines.createpn');
Route::post('/createpn', [ImportmedicinesController::class, 'createAndStore'])->name('importmedicines.createAndStore');
Route::match(['get', 'head'],'/importmedicines', [ImportmedicinesController::class, 'index'])->name('importmedicines');

Route::resource('/checkinventory', CheckinventoryController::class);//kiemkho

// nhanvien
Route::resource('/staffs', StaffController::class);

// hoadon
Route::resource('/bills', BillsController::class); //hoadonban
Route::resource('/revenue', RevenueController::class); //doanhthu


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


