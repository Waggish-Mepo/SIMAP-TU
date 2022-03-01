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

Route::group(['middleware' => ['auth', 'role:ADMIN,EMPLOYEE,HEADMASTER']], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route::get('/change-password', function () {
    //     return view('shared.change_password');
    // })->name('change-password');
    // Route::patch('/change-password/update', [ManageAccountController::class, 'updatePassword'])->name('update-password');
});

// Route::group(['middleware' => ['auth', 'role:EMPLOYEE, HEADMASTER']], function(){
//     // Kepegawaian
//     Route::prefix('employee')->name('employee.')->group(function () {
//         Route::get('/', [EmployeeAffair\EmployeeController::class, 'index'])->name('index');
//         Route::get('/{employeeId}', [EmployeeAffair\EmployeeController::class, 'detail'])->name('detail');

//         Route::prefix('/activity')->name('activity.')->group(function () {
//             Route::get('/', [EmployeeAffair\ActivityController::class, 'index'])->name('index');
//             Route::get('/{activityId}', [EmployeeAffair\ActivityController::class, 'detail'])->name('detail');
//         });
//     });

//     // Kunjungan
//     Route::prefix('visit-letter')->name('visit_letter.')->group(function () {
//         Route::get('/', [Visit\VisitLetterController::class, 'index'])->name('index');
//         Route::get('/{visitId}', [Visit\VisitLetterController::class, 'detail'])->name('detail');
//     });

//     // Rapat
//     Route::prefix('meeting')->name('meeting.')->group(function () {
//         Route::get('/', [Meeting\MeetingController::class, 'index'])->name('index');
//         Route::get('/{meetingId}', [Meeting\MeetingController::class, 'detail'])->name('detail');

//         Route::prefix('/{meetingId}')->group(function () {
//             Route::prefix('/agenda')->name('agenda.')->group(function () {
//                 Route::get('/', [Meeting\AgendaController::class, 'index'])->name('index');
//             });

//             Route::prefix('/notula')->name('notula.')->group(function () {
//                 Route::get('/', [Meeting\NotulaController::class, 'detail'])->name('detail');
//             });
//         });

//         Route::prefix('/notula')->name('notula.')->group(function () {
//             Route::get('/', [Meeting\NotulaController::class, 'index'])->name('index');
//         });
//     });
// });
