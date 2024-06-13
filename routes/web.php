<?php

use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\ResetPasswordController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\UserController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\DashboardController;
use \App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use \App\Http\Middleware\AuthenticateMiddleware;
use \App\Http\Middleware\LoginMiddeware;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return view('welcome');
});

#BACKEND ROUTE
Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')
    ->middleware(['auth','verified']);


#USER ROUTE
Route::group(['prefix'=>'user'],function (){
    Route::get('index',[UserController::class,'index'])->name('user.index')
        ->middleware('admin');

    #CREATE
    Route::get('create',[UserController::class,'create'])->name('user.create')
        ->middleware('admin');
    Route::post('store',[UserController::class,'store'])->name('user.store')
        ->middleware('admin');

    #UPDATE
    Route::get('{id}/edit',[UserController::class,'edit'])->where(['id'=>'[0-9]+'])->name('user.edit')
        ->middleware('admin');
    Route::post('{id}/update',[UserController::class,'update'])->where(['id'=>'[0-9]+'])->name('user.update')
        ->middleware('admin');

    #DELETE
    Route::get('{id}/delete',[UserController::class,'delete'])->where(['id'=>'[0-9]+'])->name('user.delete')
        ->middleware('admin');
    Route::post('{id}/destroy',[UserController::class,'destroy'])->where(['id'=>'[0-9]+'])->name('user.destroy')
        ->middleware('admin');

});

#USER CATALOGUE ROUTE
Route::group(['prefix'=>'user/catalogue'],function (){
    Route::get('index',[UserCatalogueController::class,'index'])->name('user.catalogue.index')
        ->middleware('admin');

    #CREATE
    Route::get('create',[UserCatalogueController::class,'create'])->name('user.catalogue.create')
        ->middleware('admin');
    Route::post('store',[UserCatalogueController::class,'store'])->name('user.catalogue.store')
        ->middleware('admin');

    #UPDATE
    Route::get('{id}/edit',[UserCatalogueController::class,'edit'])->where(['id'=>'[0-9]+'])->name('user.catalogue.edit')
        ->middleware('admin');
    Route::post('{id}/update',[UserCatalogueController::class,'update'])->where(['id'=>'[0-9]+'])->name('user.catalogue.update')
        ->middleware('admin');

    #DELETE
    Route::get('{id}/delete',[UserCatalogueController::class,'delete'])->where(['id'=>'[0-9]+'])->name('user.catalogue.delete')
        ->middleware('admin');
    Route::post('{id}/destroy',[UserCatalogueController::class,'destroy'])->where(['id'=>'[0-9]+'])->name('user.catalogue.destroy')
        ->middleware('admin');

});

#AJAX
Route::get('ajax/location/getLocation',[LocationController::class,'getLocation'])->name('ajax.location.index')
    ->middleware('admin');
Route::post('ajax/dashboard/changeStatus',[AjaxDashboardController::class,'changeStatus'])->name('ajax.dashboard.changeStatus')
    ->middleware('admin');
Route::post('ajax/dashboard/changeStatusAll',[AjaxDashboardController::class,'changeStatusAll'])->name('ajax.dashboard.changeStatusAll')
    ->middleware('admin');

#AUTHEN ROUTE

Route::get('admin',[AuthController::class,'index'])->name('auth.admin');
Route::post('login',[AuthController::class,'login'])->name('auth.login')->middleware('login');
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');


Route::get('create', [AuthController::class, 'showRegistrationForm'])->name('auth.create');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

#PASSWORD
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


#EMAIL VERIFY
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])
        ->name('verification.notice');
    Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail'])
        ->middleware(['throttle:6,1'])->name('verification.resend');
});

Route::get('/email/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verification.verify');


#COURSE ROUTE
Route::group(['prefix'=>'course'],function (){
    Route::get('index',[CourseController::class,'index'])->name('course.index')
        ->middleware('admin');

    #CREATE
    Route::get('create',[CourseController::class,'create'])->name('course.create')
        ->middleware('admin');
    Route::post('store',[CourseController::class,'store'])->name('course.store')
        ->middleware('admin');

    #UPDATE
    Route::get('{id}/edit',[CourseController::class,'edit'])->where(['id'=>'[0-9]+'])->name('course.edit')
        ->middleware('admin');
    Route::post('{id}/update',[CourseController::class,'update'])->where(['id'=>'[0-9]+'])->name('course.update')
        ->middleware('admin');

    #DELETE
    Route::get('{id}/delete',[CourseController::class,'delete'])->where(['id'=>'[0-9]+'])->name('course.delete')
        ->middleware('admin');
    Route::post('{id}/destroy',[CourseController::class,'destroy'])->where(['id'=>'[0-9]+'])->name('course.destroy')
        ->middleware('admin');

});

