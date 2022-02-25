<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

// Auth
Route::get('/', [AuthController::class, 'check']);
Route::get('/login', [AuthController::class, 'check'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'role:ADMIN,TEACHER,HEADMASTER']], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route::get('/change-password', function () {
    //     return view('shared.change_password');
    // })->name('change-password');
    // Route::patch('/change-password/update', [ManageAccountController::class, 'updatePassword'])->name('update-password');
});
