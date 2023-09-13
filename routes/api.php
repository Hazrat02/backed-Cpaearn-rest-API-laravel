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
    Route::post('ask.store', [adminController::class,'ask_store']);
    Route::get('all.user', [adminController::class,'all_user']);
    Route::get('user.delete/{id}', [adminController::class,'user_delete']);
    Route::get('vip.delete/{id}', [adminController::class,'vip_delete']);
    Route::get('work.delete/{id}', [adminController::class,'work_delete']);
    Route::get('ask.delete/{id}', [adminController::class,'ask_delete']);
    Route::get('payment.delete/{id}', [adminController::class,'payment_delete']);
    Route::get('vip.edit/{id}', [adminController::class,'vip_edit']);
    Route::get('work.edit/{id}', [adminController::class,'work_edit']);
    Route::get('ask.edit/{id}', [adminController::class,'ask_edit']);
    Route::get('payment.edit/{id}', [adminController::class,'payment_edit']);
    Route::get('transaction.edit/{id}', [adminController::class,'transaction_edit']);
  

});
