<?php

use App\Http\Controllers\Admin\AddItemController;
use App\Http\Controllers\Admin\ConfirmController;
use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Routing\MiddlewareRegistrar;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('landing-page', function () {
    return view('land');
});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/dashboard',[DashboardContoller::class,'index'])->name('dashboard');

    Route::resource('users', UsersController::class)->except(['create','store','show','destroy']);

    Route::resource('items',AddItemController::class)->only(['create', 'store']);

    Route::get('/orders',[OrdersController::class,'index'])->name('orders');
    Route::put('/admin/orders/{order}/{status}', [ConfirmController::class, 'confirm'])->name('admin.orders.confirm');

    Route::get('/sales',[SalesController::class,'index'])->name('sales');

    // Route::prefix('items')->controller(AddItemController::class)->name('items.')->group(function(){
    //     Route::get('/create','create')->name('create');
    //     Route::post('/store','store')->name('store');
    // });
});

Route::prefix('items')->controller(ItemsController::class)->name('items.')->group(function(){
    Route::get('/',  'index')->name('index');
    Route::delete('/destroy/{item}','destroy')->name('destroy');
}); 

Route::get('/login',[LoginController::class,'loginForm']);
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/register',[RegisterController::class,'registrationForm']);
Route::post('/register',[RegisterController::class,'register'])->name('register');

