<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Livewire\Backend\CustomerPhone;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\Expense;
use App\Http\Livewire\Backend\ExpenseCategory;
use App\Http\Livewire\Backend\Invoice;
use App\Http\Livewire\Backend\PermissionManagement;
use App\Http\Livewire\Backend\Pos;
use App\Http\Livewire\Backend\Product;
use App\Http\Livewire\Backend\ProductCategory;
use App\Http\Livewire\Backend\Profile;
use App\Http\Livewire\Backend\Report;
use App\Http\Livewire\Backend\Setting;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Documents;


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
    return redirect()->route('login');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin-dashboard', Dashboard::class)->name('dashboard'); //Livewire route
    Route::get('/setting', Setting::class)->name('setting'); //Livewire route
    Route::get('/document', Documents::class)->name('document'); //Livewire route
    
    Route::get('/profile', Profile::class)->name('profile'); //Livewire route
});


require __DIR__.'/auth.php';
