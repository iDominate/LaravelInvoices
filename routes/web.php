<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('invoices', InvoiceController::class);

Route::get('section/{id}', [InvoiceController::class, 'getProducts']);

Route::resource('sections', SectionController::class);

Route::resource('products', ProductController::class);

Route::get('invoice/details/{id}', [InvoiceDetailsController::class, 'index'])->name('invoice.details');


Route::group(['prefix' => 'file'], function(){
    Route::get('view/{invoice_number}/{file_name}', [InvoiceDetailsController::class, 'openFile'])->name('file.view');
    Route::get('download{invoice_number}/{file_name}', [InvoiceDetailsController::class, 'download'])->name('file.download');
});




Route::view('/test', 'table-data');
Route::get('/{page}', [AdminController::class, 'index']);