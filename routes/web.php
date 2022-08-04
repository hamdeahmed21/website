<?php

use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\RingtoneController;
use App\Http\Controllers\Frontend\RingtoneFrontController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => 'auth'], function (){
    Route::get('/ringtones',[RingtoneController::class,'index'])->name('ringtones.index');
    Route::get('/ringtones/create',[RingtoneController::class,'create'])->name('ringtones.create');
    Route::post('/ringtones/store',[RingtoneController::class,'store'])->name('ringtones.store');
    Route::get('/ringtones/edit/{id}',[RingtoneController::class,'edit'])->name('ringtones.edit');
    Route::post('/ringtones/update/{id}',[RingtoneController::class,'update'])->name('ringtones.update');
    Route::get('/ringtones/delete/{id}',[RingtoneController::class,'destroy'])->name('ringtones.destroy');
    Route::get('/photos',[PhotoController::class,'index'])->name('photos.index');
    Route::get('/photos/create',[PhotoController::class,'create'])->name('photos.create');
    Route::post('/photos/store',[PhotoController::class,'store'])->name('photos.store');
    Route::get('/photos/edit/{id}',[PhotoController::class,'edit'])->name('photos.edit');
    Route::post('/photos/update/{id}',[PhotoController::class,'update'])->name('photos.update');
    Route::get('/photos/delete/{id}',[PhotoController::class,'destroy'])->name('photos.destroy');

});

    Route::get('/', [RingtoneFrontController::class,'index']);

    Route::get('/ringtones/{id}/{slug}', [RingtoneFrontController::class,'show'])->name('ringtones.show');
    Route::post('/ringtones/download/{id}', [RingtoneFrontController::class,'downloadRingtone'])->name('ringtones.download');
    Route::get('/category/{id}', [RingtoneFrontController::class,'category'])->name('ringtones.category');
Auth::routes([
    'register'=>false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
