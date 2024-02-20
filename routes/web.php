<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardOrdersController;
use App\Http\Controllers\DashboardPaymentsController;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Starbucks"
    ]);
});

Route::group(["prefix" => "/orders"], function () {
    Route::get('/all', [OrdersController::class, 'index']);
    Route::get('/details/{orders}', [OrdersController::class, 'show']);
    Route::get('/create', [OrdersController::class, 'create']);
    Route::post('/add', [OrdersController::class, 'store']);
    Route::get('/edit/{orders}', [OrdersController::class, 'edit']);
    Route::post('/update/{orders}', [OrdersController::class, 'update']);
    Route::delete('/delete/{orders}', [OrdersController::class, 'destroy']);  
});

Route::group(["prefix" => "/payments"], function () {
    Route::get('/all', [PaymentsController::class, 'index']);
    Route::get('/create', [PaymentsController::class, 'create']);
    Route::post('/add', [PaymentsController::class, 'store']);
    Route::get('/edit/{payments}', [PaymentsController::class, 'edit']);
    Route::post('/update/{payments}', [PaymentsController::class, 'update']);
    Route::delete('/delete/{payments}', [PaymentsController::class, 'destroy']);  
});

Route::group(["prefix" => "/logins"], function () {
    Route::get('/login', [LoginsController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginsController::class,'authenticate']);
    Route::post('/logout',[\App\Http\Controllers\LoginsController::class,'logout']);
});

Route::group(["prefix" => "/registers"], function () {
    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::group(["prefix" => "/dashboards"], function () {
   Route::get('/all', function() {
    return view('dashboards.index', [
        'title' => 'Starbucks'
    ]); }) -> middleware('auth');

   Route::group(["prefix" => "/orders"],function (){
        Route::get('/all',[DashboardOrdersController::class,'index'])-> name('orders.all') -> middleware('auth');
        Route::get('/create',[DashboardOrdersController::class,'create'])-> middleware('auth');
        Route::post('/add',[DashboardOrdersController::class,'store'])-> middleware('auth');
        Route::delete('/delete/{orders}', [DashboardOrdersController::class, 'destroy'])-> middleware('auth');
        Route::get('/edit/{orders}', [DashboardOrdersController::class,'edit'])->name('orders.edit')-> middleware('auth');
        Route::post('/update/{orders}', [DashboardOrdersController::class, 'update'])-> middleware('auth');
        Route::get('/filter/{payments_id}', [DashboardOrdersController::class, 'filter'])->name('dashboards.orders.filter');
    });

    Route::group(["prefix" => "/payments"],function (){
        Route::get('/all',[DashboardPaymentsController::class,'index'])-> name('payments.all') -> middleware('auth');
        Route::get('/create',[DashboardPaymentsController::class,'create'])-> middleware('auth');
        Route::post('/add',[DashboardPaymentsController::class,'store'])-> middleware('auth');
        Route::delete('/delete/{payments}', [DashboardPaymentsController::class, 'destroy'])-> middleware('auth');
        Route::get('/edit/{payments}', [DashboardPaymentsController::class,'edit'])->name('class.edit')-> middleware('auth');
        Route::post('/update/{id}', [DashboardPaymentsController::class, 'update'])-> middleware('auth');
    });
});

