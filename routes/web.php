<?php

use App\Http\Controllers\Backend\RingtoneController;
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
});

Auth::routes([
    'register'=>false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
