<?php

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
Route::get('user/index',[UserController::class,'index'])->name('user.index')
    ->middleware('admin');


Route::get('admin',[AuthController::class,'index'])->name('auth.admin');
Route::post('login',[AuthController::class,'login'])->name('auth.login')->middleware('login');
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
