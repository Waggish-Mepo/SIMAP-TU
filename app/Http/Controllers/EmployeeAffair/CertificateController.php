<?php

namespace App\Http\Controllers\EmployeeAffair;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use App\Service\Database\CertificateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index($employeeId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return response()->json([]);

        $certificateDB = new CertificateService;
        $certificates = $certificateDB->index($employeeId, ['order_by' => 'DESC'])['data'] ?? [];

        return response()->json($certificates);
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
        unset($payload['id']);

        $certificateDB = new CertificateService;
        $certificateDB->create($employeeId, $payload);

        return back()->with('success', 'Berhasil menambahkan sertifikat');
    }

    public function detail($employeeId, $certificateId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return response()->json([]);

        $certificateDB = new CertificateService;
        $certificate = $certificateDB->detail($certificateId);

        return response()->json($certificate);
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
        $certificateId = $payload['id'];
        unset($payload['id']);

        $certificateDB = new CertificateService;
        $certificateDB->update($certificateId, $payload);

        return back()->with('success', 'Berhasil memperbarui sertifikat');
    }

    public function delete($employeeId, $certificateId)
    {
        $user = Auth::user();
        if ($user->userable_id !== $employeeId &&
            $user->role !== User::ADMIN
        ) return view('employee_affair.employee.index');

        $certificateDB = new CertificateService;

        $certificate = $certificateDB->delete($certificateId);

        return response()->json($certificate);
    }
}
