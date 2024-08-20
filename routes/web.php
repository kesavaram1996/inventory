<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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


Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('inventory', InventoryItemController::class)->middleware(['auth']);
Route::resource('admin', AdminController::class)->middleware(['auth','role:Super Admin']);
Route::get('settings', [HomeController::class, 'settings'])->name('settings');
Route::post('update_settings', [HomeController::class, 'update_settings'])->name('update_settings');
Route::get('export', [HomeController::class, 'export'])->name('export');
Route::post('import', [HomeController::class, 'import'])->name('import');
Route::get('inventory/search', [InventoryItemController::class, 'search'])->name('inventory.search');