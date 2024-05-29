<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\Ceklis\ResponseTimeCheckingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SP2BJController;

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
    
        Route::resource('sp2bj', SP2BJController::class);
        Route::post('sp2bj-showdata', [SP2BJController::class, 'datatable'])->name('sp2bj.datatable');
    
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [HomeController::class, 'profile'])->name('profile');
            Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
        });
    
        Route::controller(AkunController::class)
            ->prefix('akun')
            ->as('akun.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('showdata', 'dataTable')->name('dataTable');
                Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
                Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
                Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
            });
    });
    
    Route::group(['prefix' => 'ceklis', 'as' => 'ceklis.'], function () {
        Route::get('/', [ResponseTimeCheckingController::class, 'index'])->name('index');
        Route::post('showdata', [ResponseTimeCheckingController::class, 'dataTable'])->name('dataTable');
    
        Route::get('create', [ResponseTimeCheckingController::class, 'create'])->name('create');
        Route::post('store', [ResponseTimeCheckingController::class, 'store'])->name('store');
    });
});
