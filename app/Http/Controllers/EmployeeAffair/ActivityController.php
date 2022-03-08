<?php

namespace App\Http\Controllers\EmployeeAffair;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\EmployeeActivityService;
use App\Service\Database\EmployeeService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $activityDb = new EmployeeActivityService;

        $user = Auth::user();

        $payload = [
            'employee_id' => $user->userable_id,
        ];

        $userDb = new UserService;
        $members = $userDb->index()['data'] ?? [];
        $employeeDb = new EmployeeService;
        $employees =  $activityDb->index()['data'];

        foreach ($employees as $key => $value) {
            $employees[$key]['nama_pegawai'] = $employeeDb->detail($employees[$key]['employee_id'])['nama'];
        }

        $pribadi =  $activityDb->index($payload)['data'];

        $activities['pribadi'] = $pribadi;
        $activities['employees'] = $employees;

        // dd($activities);

        return view('employee_affair.activity.index', compact('activities', 'user'));
    }

    public function getActivity()
    {
        $activityDb = new EmployeeActivityService;

        $user = Auth::user();

        $payload = [
            'employee_id' => $user->userable_id,
        ];

        if ($user->role === User::ADMIN) {
            $userDb = new UserService;
            $members = $userDb->index(['order_by' => 'ASC'])['data'] ?? [];
        }

        $employees =  $activityDb->index()['data'];
        $pribadi =  $activityDb->index($payload)['data'];

        $activities['pribadi'] = $pribadi;
        $activities['employees'] = $employees;

        return response()->json($activities);
    }

    public function detail($activityId)
    {
        $user = Auth::user();

        $activityDb = new EmployeeActivityService;
        $activity = $activityDb->detail($activityId);
        if (
            $user->userable_id !== $activity['employee_id'] &&
            $user->role !== User::ADMIN
        ) return redirect()->route('employee.activity.index');

        $employeeDb = new EmployeeService;
        $activity['nama_pegawai'] = $employeeDb->detail($activity['employee_id'])['nama'];

        return view('employee_affair.activity.detail', compact('activity', 'user'));
    }

    public function edit($employeeId, $activityId)
    {
        $user = Auth::user();
        if (
            $user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return redirect()->route('employee.index');

        $activityDb = new EmployeeActivityService;
        $activity = $activityDb->detail($activityId);

        return view('employee_affair.activity.detail', compact('activity', 'user'));
    }

    public function update(Request $request, $activityId)
    {
        $activityDb = new EmployeeActivityService;

        $payload = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'kategori' => $request->kategori,
        ];

        $activityDb->update($activityId, $payload);

        return redirect()->route('employee.activity.index');
    }


    public function store(Request $request)
    {
        $activityDb = new EmployeeActivityService;


        $payload = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'kategori' => $request->kategori,
        ];

        $activityDb->create($payload);

        // dd($tes);

        return redirect()->route('employee.activity.index');
    }
}