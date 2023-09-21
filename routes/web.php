<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillsController;
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
Route::resource('/sales', SalesController::class);

// thuoc
Route::resource('/medicines', MedicineController::class);

///////////////ncc
Route::resource('/suppliers', SupplierController::class);

///////////////nsx
Route::resource('/producers', ProducerController::class);

///////////////nhomthuoc
Route::resource('/druggr', DruggrController::class);

// kho
Route::resource('/importmedicines', ImportmedicinesController::class);//phieunhap
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


