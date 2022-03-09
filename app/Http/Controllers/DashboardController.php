<?php

namespace App\Http\Controllers;

use App\Service\Database\EmployeeService;
use App\Service\Database\UserService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $employeeDB = new EmployeeService;
        $employees = $employeeDB->index(['order_by' => 'ASC'])['data'] ?? [];

        $userDB = new UserService;
        $users = $userDB->index(['order_by' => 'ASC'])['data'] ?? [];

        $teachers = 0;
        $staffs = 0;
        foreach ($employees as $key => $value) {
            $jenisPtk = $employees[$key]['jenis_ptk'];

            $empKey = array_search($employees[$key]['id'], array_column($users, 'userable_id'));
            $employees[$key]['username'] = $users[$empKey]['username'];
            $employees[$key]['status'] = $users[$empKey]['status'];

            if (in_array($jenisPtk, [
                'Guru Mapel',
                'Guru Mata Pelajaran',
                'Guru Kelas',
                'Guru BK',
                'Guru Inklusi',
                'Guru Pendamping',
                'Guru Magang',
                'Guru TIK'
            ])) $teachers++;

            if (in_array($jenisPtk, [
                'Tenaga Administrasi Sekolah',
                'Laboran',
                'Pustakawan',
            ])) $staffs++;
        }

        $users['teachers'] = $teachers;
        $users['staffs'] = $staffs;
        $users['employees'] = count($employees)+1;

        return view('dashboard', compact('user', 'users'));
    }
}
