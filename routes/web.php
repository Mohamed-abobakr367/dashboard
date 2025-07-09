<?php

use App\Http\Controllers\Admin\AddItemController;
use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardContoller::class,'index'])->name('dashboard');

Route::get('/login',[LoginController::class,'loginForm']);
Route::post('/login',[LoginController::class,'login'])->name('login');

// Route::post('/logout',[LogoutController::class,'logout']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register',[RegisterController::class,'registrationForm']);
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::get('/users',[UsersController::class,'index'])->name('users');
Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');

Route::get('/orders',[OrdersController::class,'index'])->name('orders');

Route::get('/sales',[SalesController::class,'index'])->name('sales');

Route::prefix('items')->controller(AddItemController::class)->name('items.')->group(function(){
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
});



Route::prefix('items')->controller(ItemsController::class)->name('items.')->group(function(){;
    Route::get('/',  'index')->name('index');

    });