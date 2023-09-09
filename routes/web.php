<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\DruggrController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\AddstaffController;
use App\Http\Controllers\BillinfoController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ListstaffController;
use App\Http\Controllers\PrescriptionsController;
use App\Http\Controllers\CheckinventoryController;
use App\Http\Controllers\InventoryentryController;

// banhang
Route::get('/', [
    SalesController::class,
    'sales'
]);
Route::get('prescriptions', [
    PrescriptionsController::class,
    'prescriptions'
]);
// thuoc
Route::get('medicines', [
    MedicineController::class,
    'medicines'
]);
Route::get('druggr', [
    DruggrController::class,
    'druggr'
]);
Route::get('themnhomthuoc', [
    DruggrController::class,
    'themnhomthuoc'
]);
// kho
Route::get('producers', [
    ProducerController::class,
    'producers'
]);
Route::get('suppliers', [
    SupplierController::class,
    'suppliers'
]);
Route::get('inventoryentry', [
    InventoryentryController::class
]);
Route::get('checkinventory', [
    CheckinventoryController::class,
    'checkinventory'
]);
// nhanvien
Route::get('liststaff', [
    ListstaffController::class,
    'liststaff'
]);
Route::get('addstaff', [
    AddstaffController::class,
    'addstaff'
]);
// hoadon
Route::get('billinfo', [
    BillinfoController::class,
    'billinfo'
]);
Route::get('revenue', [
    RevenueController::class,
    'revenue'
]);






// Route::get('products', [
//     productscontroller::class,
//     'index'
// ]);
// Route::get('products/{productname}', [
//     productscontroller::class,
//     'detail'
// ]);
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

