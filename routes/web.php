<?php

use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\DashboardController;
use \App\Http\Middleware\AuthenticateMiddleware;
use \App\Http\Middleware\LoginMiddeware;


Route::get('/', function () {
    return view('welcome');
});

#BACKEND ROUTE
Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')
->middleware('admin');

#USER ROUTE
Route::group(['prefix'=>'user'],function (){
    Route::get('index',[UserController::class,'index'])->name('user.index')
        ->middleware('admin');
    Route::get('create',[UserController::class,'create'])->name('user.create')
        ->middleware('admin');
    Route::get('update',[UserController::class,'update'])->name('user.update')
        ->middleware('admin');
    Route::get('destroy',[UserController::class,'destroy'])->name('user.destroy')
        ->middleware('admin');
});

#AJAX
Route::get('ajax/location/getLocation',[LocationController::class,'getLocation'])->name('ajax.location.index')
    ->middleware('admin');


Route::get('admin',[AuthController::class,'index'])->name('auth.admin');
Route::post('login',[AuthController::class,'login'])->name('auth.login')->middleware('login');
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
