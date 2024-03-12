<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('registration',function(){
//     return view('registration');
// });

Route::get('registration',[App\Http\Controllers\RegistrationControllers::class,'index']);
// Route::post('admin/posting/search/account',[App\Http\Controllers\AdminSearchAccountControllers::class,'index'])->name('admin_posting_search_data');
Route::match(['GET','POST'],'login',[App\Http\Controllers\RegistrationContentProcessingControllers::class,'store'])->name('registration-content');
Route::match(['GET','POST'],'login-page',[App\Http\Controllers\LoginControllers::class,'index']);
Route::get('success',[App\Http\Controllers\SuccessControllers::class,'index'])->name('success');
Route::match(['GET','POST'],'login-posting',[App\Http\Controllers\LoginContentAuthControllers::class,'index'])->name('login-content-posting');
Route::match(['GET','POST'],'user-dashboard',[App\Http\Controllers\UserDashboardControllers::class,'index'])->name('user-dashboard');

Route::get('deposit-page',[App\Http\Controllers\DepositViewPageControllers::class,'index'])->name('deposit-page');
Route::match(['GET','POST'],'deposited',[App\Http\Controllers\DepositedPageControllers::class,'store'])->name('depositing-money');
