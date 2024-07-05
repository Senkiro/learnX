<?php

use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Manage\AuthController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\Student\BalanceController;
use App\Http\Controllers\Student\CartController;
use App\Http\Controllers\Manage\CourseController;
use App\Http\Controllers\Manage\ForgotPasswordController;
use App\Http\Controllers\Manage\ResetPasswordController;
use App\Http\Controllers\Student\MyCourseController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Manage\RoleController;
use App\Http\Controllers\Manage\UserController;
use App\Http\Controllers\Student\VNPayController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manage\DashboardController;
use \App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use \App\Http\Middleware\AuthenticateMiddleware;
use \App\Http\Middleware\LoginMiddeware;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return view('welcome');
});

#BACKEND ROUTE
//Route::get('dashboard/index', function (){
//    $user = Auth::user();
//    $permissions = $user->getAllPermissions();
////    dd($permissions);
//})->name('dashboard.index')
//    ->middleware(['auth','verified', 'permission:manage articles']);
Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')
        ->middleware(['auth','verified','permission:manage articles']);

Route::get('studentdashboard/index', [StudentDashboardController::class, 'index'])->name('student_dashboard.index');

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
    Route::get('index',[RoleController::class,'index'])->name('user.catalogue.index')
        ->middleware('admin');

    #CREATE
    Route::get('create',[RoleController::class,'create'])->name('user.catalogue.create')
        ->middleware('admin');
    Route::post('store',[RoleController::class,'store'])->name('user.catalogue.store')
        ->middleware('admin');

    #UPDATE
    Route::get('{id}/edit',[RoleController::class,'edit'])->where(['id'=>'[0-9]+'])->name('user.catalogue.edit')
        ->middleware('admin');
    Route::post('{id}/update',[RoleController::class,'update'])->where(['id'=>'[0-9]+'])->name('user.catalogue.update')
        ->middleware('admin');

    #DELETE
    Route::get('{id}/delete',[RoleController::class,'delete'])->where(['id'=>'[0-9]+'])->name('user.catalogue.delete')
        ->middleware('admin');
    Route::post('{id}/destroy',[RoleController::class,'destroy'])->where(['id'=>'[0-9]+'])->name('user.catalogue.destroy')
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


#VERIFY EMAIL ROUTE
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

#=====================================================STUDENT ROUTE =====================================================

#CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');


#VNPAY
    Route::post('/vnpay_payment', [VNPayController::class, 'vnpay_payment'])->name('payment.create');
    Route::get('/payment/vnpay_return', [VNPayController::class, 'vnpayReturn'])->name('payment.vnpay_return');
});

#MY COURSE
    Route::get('myCourse/index', [MyCourseController::class, 'index'])->name('myCourse.index');

Route::get('/add-funds', [BalanceController::class, 'index'])->name('add.funds.form');

Route::post('/add-funds', [BalanceController::class, 'addFunds'])->name('add.funds');







