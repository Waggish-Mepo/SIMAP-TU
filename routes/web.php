<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeAffair;
use App\Http\Controllers\EmployeeAffair\EmployeeController;
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

    // Kepegawaian
    Route::prefix('employee')->name('employee.')->group(function () {
        //
        Route::get('/', [EmployeeAffair\EmployeeController::class, 'index'])->name('index');
        Route::get('/{employeeId}/detail', [EmployeeAffair\EmployeeController::class, 'detail'])->name('detail');
        Route::get('/{employeeId}/edit', [EmployeeAffair\EmployeeController::class, 'edit'])->name('edit');

        Route::patch('/{employeeId}/update', [EmployeeAffair\EmployeeController::class, 'updateUser'])->name('update');


        // Aktivitas Pegawai
        Route::prefix('/activity')->name('activity.')->group(function () {
            Route::get('/', [EmployeeAffair\ActivityController::class, 'index'])->name('index');
            Route::get('/{activityId}', [EmployeeAffair\ActivityController::class, 'detail'])->name('detail');
        });

        // Export Excel
        Route::group(['middleware' => ['auth', 'role:ADMIN']], function(){
            Route::get('/export/employee', [EmployeeAffair\EmployeeController::class, 'exportEmployee'])->name('export.employee');
            Route::get('/export/teacher', [EmployeeAffair\EmployeeController::class, 'exportTeacher'])->name('export.teacher');
            Route::get('/export/staff', [EmployeeAffair\EmployeeController::class, 'exportStaff'])->name('export.staff');
        });

        // Sertifikat Pegawai
        Route::prefix('/certificates/{employeeId}')->name('certificates.')->group(function () {
            Route::post('/', [EmployeeAffair\CertificateController::class, 'create'])->name('create');
            Route::patch('/', [EmployeeAffair\CertificateController::class, 'update'])->name('update');
            Route::delete('/{certificateId}', [EmployeeAffair\CertificateController::class, 'delete'])->name('delete');
        });

        // Ijazah Pegawai
        Route::prefix('/ijazah')->name('ijazah.')->group(function () {
            Route::get('/', [EmployeeAffair\IjazahController::class, 'index'])->name('index');
            Route::post('/', [EmployeeAffair\IjazahController::class, 'create'])->name('create');
            Route::patch('/', [EmployeeAffair\IjazahController::class, 'update'])->name('update');
            Route::delete('/', [EmployeeAffair\IjazahController::class, 'delete'])->name('delete');
        });

        // Ajax Request
        Route::get('/database/certificate/{employeeId}', [EmployeeAffair\CertificateController::class, 'index'])->name('certificates.index');
        Route::get('/database/users', [EmployeeAffair\EmployeeController::class, 'getUsers']);
        Route::group(['middleware' => ['auth', 'role:ADMIN']], function(){
            Route::patch('/database/users', [EmployeeAffair\EmployeeController::class, 'resetPassword']);
            Route::post('/database/users', [EmployeeAffair\EmployeeController::class, 'createUser']);
            Route::patch('/{employeeId}/update-status', [EmployeeAffair\EmployeeController::class, 'toggleStatus'])->name('update.status');
        });
    });

    // Kunjungan
    Route::prefix('visit-letter')->name('visit_letter.')->group(function () {
        Route::get('/', [Visit\VisitLetterController::class, 'index'])->name('index');
        Route::get('/{visitId}', [Visit\VisitLetterController::class, 'detail'])->name('detail');
    });

    // Rapat
    Route::prefix('meeting')->name('meeting.')->group(function () {
        Route::get('/', [Meeting\MeetingController::class, 'index'])->name('index');
        Route::get('/{meetingId}', [Meeting\MeetingController::class, 'detail'])->name('detail');

        Route::prefix('/{meetingId}')->group(function () {
            Route::prefix('/agenda')->name('agenda.')->group(function () {
                Route::get('/', [Meeting\AgendaController::class, 'index'])->name('index');
            });

            Route::prefix('/notula')->name('notula.')->group(function () {
                Route::get('/', [Meeting\NotulaController::class, 'detail'])->name('detail');
            });
        });

        Route::prefix('/notula')->name('notula.')->group(function () {
            Route::get('/', [Meeting\NotulaController::class, 'index'])->name('index');
        });
    });
});
