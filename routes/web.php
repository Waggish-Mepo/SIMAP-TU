<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeAffair\IjazahController;
use App\Http\Controllers\EmployeeAffair;
use App\Http\Controllers\StudentAffair;
use App\Http\Controllers\Visit;
use App\Http\Controllers\EmployeeAffair\EmployeeController;
use App\Http\Controllers\Meeting;
use App\Http\Controllers\Letter;
use App\Http\Controllers\StudenAffair\StudentController;
use App\Http\Controllers\StudentAffair\StudentController as StudentAffairStudentController;
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

Route::group(['middleware' => ['auth', 'role:ADMIN,EMPLOYEE,HEADMASTER,STUDENT']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    // Siswa
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/', [StudentAffairStudentController::class, 'index'])->name('index');
        Route::get('/{studentId}/detail', [StudentAffairStudentController::class, 'detail'])->name('detail');
        Route::get('/{studentId}/edit', [StudentAffairStudentController::class, 'edit'])->name('edit');
        Route::patch('/{studentId}/update', [StudentAffairStudentController::class, 'updateUser'])->name('update');


        // Ajax Request Siswa
        Route::get('/database/users', [StudentAffair\StudentController::class, 'getUsers']);

        Route::group(['middleware' => ['auth', 'role:ADMIN']], function () {
            Route::patch('/database/users', [StudentAffair\StudentController::class, 'resetPassword']);
            Route::post('/database/users', [StudentAffair\StudentController::class, 'createUser']);
        });
    });


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
            Route::post('/', [EmployeeAffair\ActivityController::class, 'store'])->name('store');
            Route::get('/{activityId}/edit', [EmployeeAffair\ActivityController::class, 'edit'])->name('edit');
            Route::patch('/{activityId}/update', [EmployeeAffair\ActivityController::class, 'update'])->name('update');
            Route::delete('/{activityId}/delete', [EmployeeAffair\ActivityController::class, 'delete'])->name('delete');

            Route::get('/database/activity', [EmployeeAffair\ActivityController::class, 'getActivity']);
        });

        // Export Excel
        Route::group(['middleware' => ['auth', 'role:ADMIN']], function () {
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
        Route::prefix('/ijazah/{employeeId}')->name('ijazah.')->group(function () {
            Route::get('/{ijazahId}/detail', [EmployeeAffair\IjazahController::class, 'detail'])->name('detail');
            Route::post('/', [EmployeeAffair\IjazahController::class, 'create'])->name('create');
            Route::patch('/', [EmployeeAffair\IjazahController::class, 'update'])->name('update');
            Route::delete('/{ijazahId}', [EmployeeAffair\IjazahController::class, 'delete'])->name('delete');
        });

        // Ajax Request
        Route::get('/database/certificate/{employeeId}', [EmployeeAffair\CertificateController::class, 'index'])->name('certificates.index');
        Route::get('/database/ijazah/{employeeId}', [EmployeeAffair\IjazahController::class, 'index'])->name('ijazah.index');
        Route::get('/database/users', [EmployeeAffair\EmployeeController::class, 'getUsers']);
        Route::get('/database/activity', [EmployeeAffair\ActivityController::class, 'getActivity']);
        Route::post('/database/activity', [EmployeeAffair\ActivityController::class, 'store']);
        Route::patch('/database/users', [EmployeeAffair\EmployeeController::class, 'resetPassword']);
        Route::group(['middleware' => ['auth', 'role:ADMIN']], function () {
            Route::post('/database/users', [EmployeeAffair\EmployeeController::class, 'createUser']);
            Route::patch('/{employeeId}/update-status', [EmployeeAffair\EmployeeController::class, 'toggleStatus'])->name('update.status');
        });
    });

    // Kunjungan
    Route::prefix('visit-letter')->name('visit_letter.')->group(function () {
        Route::get('/', [Visit\VisitLetterController::class, 'index'])->name('index');
        Route::post('/', [Visit\VisitLetterController::class, 'create'])->name('create');
        Route::get('/{visitId}/detail', [Visit\VisitLetterController::class, 'detail'])->name('detail');
        Route::patch('/{visitId}/update', [Visit\VisitLetterController::class, 'update'])->name('update');
        Route::delete('/{visitId}/delete', [Visit\VisitLetterController::class, 'delete'])->name('delete');

        Route::get('/database/visits', [Visit\VisitLetterController::class, 'getVisitLetters']);

        Route::get('/export/visit-finished', [Visit\VisitLetterController::class, 'exportVisitFinish'])->name('export.finish');
    });

    // Rapat
    Route::prefix('meeting')->name('meeting.')->group(function () {
        Route::prefix('/{meetingId}')->group(function () {
            Route::get('/', [Meeting\MeetingController::class, 'detail'])->name('detail');

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

Route::group(['middleware' => ['auth', 'role:ADMIN,HEADMASTER']], function () {
    // Surat Menyurat
    Route::get('letter-in', [Letter\LetterController::class, 'index'])->name('letter.in.index');
    Route::get('letter-out', [Letter\LetterController::class, 'index'])->name('letter.out.index');
    Route::prefix('letter')->name('letter.')->group(function () {
        Route::post('/', [Letter\LetterController::class, 'create'])->name('create');
        Route::get('/{letterId}', [Letter\LetterController::class, 'detail'])->name('detail');
        Route::get('/{letterId}/edit', [Letter\LetterController::class, 'edit'])->name('edit');
        Route::patch('/{letterId}/update', [Letter\LetterController::class, 'update'])->name('update');

        Route::get('/export/letter-in', [Letter\LetterController::class, 'exportLetterIn'])->name('export.in');
        Route::get('/export/letter-out', [Letter\LetterController::class, 'exportLetterOut'])->name('export.out');

        // Ajax Request
        Route::get('/database/letter-ins', [Letter\LetterController::class, 'getLetterIns'])->name('index.in');
        Route::get('/database/letter-outs', [Letter\LetterController::class, 'getLetterOuts'])->name('index.out');
        Route::delete('/database/letter', [Letter\LetterController::class, 'delete'])->name('delete');
    });


});
