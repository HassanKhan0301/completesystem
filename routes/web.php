<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BuyingController;
use App\Http\Controllers\CuttingController;
use App\Http\Controllers\StitchController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\CroppingController;
use App\Http\Controllers\PackingController;
use App\Http\Controllers\DeliveryController;



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

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'logon'])->name('loginPost');
Route::middleware(['auth'])->group(function () {
  Route::get('/', function () {
        return view('dashboard');
    })->name('index');


    Route::resource('order',OrderController::class);
    Route::get('/order/{id}/bill', [OrderController::class, 'generateBill'])->name('order.bill');
    Route::get('/order/{orderId}/invoice', [OrderController::class, 'generateInvoice'])->name('order.invoice');
    Route::get('order/{orderId}', [OrderController::class, 'show'])->name('order.show');



   
    Route::resource('buying', BuyingController::class);  
    Route::get('buying/create/{orderId?}', [BuyingController::class, 'create'])->name('buying.create');
  
    Route::resource('cutting', CuttingController::class);  
    Route::get('cutting/create/{orderId?}', [CuttingController::class, 'create'])->name('cutting.create');

    Route::resource('stitch', StitchController::class);  
    Route::get('stitch/create/{orderId?}', [StitchController::class, 'create'])->name('stitch.create');

    Route::resource('print', PrintController::class);  
    Route::get('print/create/{orderId?}', [PrintController::class, 'create'])->name('print.create');

    Route::resource('crop', CroppingController::class); 
    Route::get('crop/create/{orderId?}', [CroppingController::class, 'create'])->name('crop.create');
    
    Route::resource('packing', PackingController::class);   
    Route::get('packing/create/{orderId?}', [PackingController::class, 'create'])->name('packing.create');
  
    Route::resource('delivery', DeliveryController::class);  

    


    
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
