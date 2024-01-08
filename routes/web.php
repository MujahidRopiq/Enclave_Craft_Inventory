<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FinishingController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\FurnitureImageController;
use App\Http\Controllers\Material1Controller;
use App\Http\Controllers\Material2Controller;
use App\Http\Controllers\Material3Controller;
use App\Http\Controllers\Material4Controller;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockInSelectController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\StockOutSelectController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/', function () {return redirect('/dashboard');})->name('dashboard');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/users', UserController::class)->middleware(['UserAccess:1']);
Route::resource('/myaccount', AccountController::class);
Route::resource('/furnitures', FurnitureController::class);
Route::resource('/images', FurnitureImageController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/material1s', Material1Controller::class);
Route::resource('/material2s', Material2Controller::class);
Route::resource('/material3s', Material3Controller::class);
Route::resource('/material4s', Material4Controller::class);
Route::resource('/finishings', FinishingController::class);
Route::resource('/applications', ApplicationController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/invoices', InvoiceController::class);
Route::resource('/purchaseorders', PurchaseOrderController::class);
Route::resource('/stockins', StockInController::class);
Route::resource('/stockinselects', StockInSelectController::class);
Route::resource('/stockouts', StockOutController::class);
Route::resource('/stockoutselects', StockOutSelectController::class);
});