<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\Frontend\userController;
use App\Http\Controllers\Frontend\workController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::post('forgetcode', [AuthController::class,'sendForgetEmail'])->name('sendForgetEmail');
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', [AuthController::class,'me']);
    Route::post('forget', [AuthController::class,'forget']);

});

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
   

], function ($router) {
    Route::get('ask', [FrontendController::class,'ask']);
    Route::get('payment', [FrontendController::class,'payment_method'])->name('payment');
    Route::post('deposit', [FrontendController::class,'deposit']);
    Route::get('transaction', [FrontendController::class,'transaction']);
    Route::get('vip', [FrontendController::class,'vip']);
    Route::get('work', [workController::class,'work']);
    Route::post('work.store', [workController::class,'workstor']);
    Route::post('useredit', [userController::class,'userEdit']);
    Route::post('payment.store', [adminController::class,'payment_method_create']);
    Route::post('vip.store', [adminController::class,'vip_store']);
    Route::post('work.create', [adminController::class,'work_store']);
  

});
