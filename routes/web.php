<?php

use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('admin.login.auth');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function(){
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'movie'], function(){
        Route::get('/',[MovieController::class, 'index'])->name('admin.movie');
        Route::get('/create',[MovieController::class, 'create'])->name('admin.movie.create');
        Route::post('/store',[MovieController::class, 'store'])->name('admin.movie.store');
        Route::get('/edit/{id}',[MovieController::class, 'edit'])->name('admin.movie.edit');
        Route::put('/update/{id}',[MovieController::class, 'update'])->name('admin.movie.update');
        Route::delete('/destroy/{id}',[MovieController::class, 'destroy'])->name('admin.movie.destroy');

    });

    Route::get('transaction', [TransactionController::class, 'index'])->name('admin.transaction.transactions');


});  
