<?php

namespace App\Http\Controllers\EmployeeAffair;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\IjazahService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IjazahController extends Controller
{
    public function index($employeeId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return response()->json([]);

        $ijazahDb = new IjazahService;
        $ijazah = $ijazahDb->index($employeeId, ['order_by' => 'DESC'])['data'] ?? [];

        return response()->json($ijazah);
    }

    public function create($employeeId, Request $request)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return view('employee_affair.employee.detail', $employeeId);

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);

        $ijazahDb = new IjazahService;
        $tes = $ijazahDb->create($employeeId, $payload);

        dd($tes);

        return back()->with('success', 'Berhasil menambahkan ijazah');
    }

    public function detail($employeeId, $ijazahId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return response()->json([]);

        $ijazahDb = new IjazahService;
        $ijazah = $ijazahDb->detail($ijazahId);

        return response()->json($ijazah);
    }

    public function update($employeeId, Request $request)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return view('employee_affair.employee.index');

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);
        $ijazahId = $payload['id'];
        unset($payload['id']);

        $ijazahDb = new IjazahService;
        $ijazahDb->update($ijazahId, $payload);

        return back()->with('success', 'Berhasil memperbarui ijazah');
    }

    public function delete($employeeId, $ijazahId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return view('employee_affair.employee.index');

        $ijazahDb = new IjazahService;

        $ijazah = $ijazahDb->delete($ijazahId);

        return response()->json($ijazah);
    }
}
