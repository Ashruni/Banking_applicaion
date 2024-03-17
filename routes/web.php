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

Route::get('registration',[App\Http\Controllers\RegistrationContentProcessingController::class,'index']);
Route::post('login',[App\Http\Controllers\RegistrationContentProcessingController::class,'store'])->name('registration_content');

Route::get('success',[App\Http\Controllers\SuccessControllers::class,'index'])->name('success');

Route::get('login-page',[App\Http\Controllers\LoginContentAuthController::class,'index']);
Route::post('login-posting',[App\Http\Controllers\LoginContentAuthController::class,'store'])->name('login_content_posting');

Route::get('user-dashboard',[App\Http\Controllers\UserDashboardController::class,'index'])->name('user_dashboard');

Route::get('deposit-page/{id}',[App\Http\Controllers\DepositedPageController::class,'index'])->name('deposit_page');
Route::post('deposited/{id}',[App\Http\Controllers\DepositedPageController::class,'store'])->name('depositing_money');

Route::get('withdraw-page/{id}/{currentBalance}',[App\Http\Controllers\WithdrawingController::class,'index'])->name('withdraw_page');
Route::post('withdrawing-money/{id}/{currentBalance}',[App\Http\Controllers\WithdrawingController::class,'store'])->name('withdrawing_money');

Route::get('transfer-page/{id}/{currentBalance}',[App\Http\Controllers\TransferMoneyController::class,'index'])->name('transfer_page');
Route::post('transfer-money/{id}/{currentBalance}',[App\Http\Controllers\TransferMoneyController::class,'store'])->name('transferring_money');

Route::get('bank/statement/{id}/{currentBalance}',[App\Http\Controllers\BankStatementControllers::class,'index'])->name('bank_statement');
Route::get('logout/',[App\Http\Controllers\LogoutBankAppControllers::class,'index'])->name('logout');
Route::get('home/{id}',[App\Http\Controllers\HomeBankAppController::class,'index'])->name('home');
