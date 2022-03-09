<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\VisitLetterService;
use App\Service\Database\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\exportVisitArchives;

class VisitLetterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('visit.index', compact('user'));
    }

    public function detail($visitLetterId)
    {
        $user = Auth::user();

        $visitDB = new VisitLetterService;
        $visit = $visitDB->detail($visitLetterId);
        return view('visit.detail', compact('visit', 'user'));
    }

    public function edit($visitLetterId)
    {
        $user = Auth::user();
        
        $visitDB = new VisitLetterService;
        $visit = $visitDB->detail($visitLetterId);
        return view('visit.detail', compact('visit', 'user'));
    }

    public function getVisitLetters()
    {
        $user = Auth::user();
        $visitDB = new VisitLetterService;

        $visits = $visitDB->index(['order_by' => 'ASC'])['data'] ?? [];

        return response()->json($visits);
    }

    public function create(Request $request)
    {
        $visitDB = new VisitLetterService;

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);
        unset($payload['id']);
        unset($payload['tgl_kunjungan']);
        unset($payload['jumlah']);

        $visit = $visitDB->create($payload);

        return redirect()->route('visit_letter.index')
        ->with('success', 'Data berhasil ditambahkan');
    }


    public function update($visitLetterId, Request $request)
    {
        $user = Auth::user();
        $visitDB = new VisitLetterService;

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);
        unset($payload['id']);
        unset($payload['tgl_kunjungan']);
        unset($payload['jumlah']);

        $visitDB->update($visitLetterId, $payload);

        return redirect()->route('visit_letter.index')
            ->with('success', 'Data berhasil diubah');
    }

    public function delete($visitLetterId)
    {
        $visitDB = new VisitLetterService;
        $visitDB->delete($visitLetterId);

        return redirect()->route('visit_letter.index')
            ->with('success', 'Data berhasil dihapus');
    }
}