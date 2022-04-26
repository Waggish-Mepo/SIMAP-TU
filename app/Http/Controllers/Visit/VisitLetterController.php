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
use App\Exports\VisitFinishesExport;
use App\Models\VisitLetter;

class VisitLetterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $visitDB = new VisitLetterService;
        $visit = $visitDB->index()['data'] ?? [];
        $tgl_visits = [];
        foreach ($visit as $key => $value) {
            if (in_array($visit[$key]['tanggal'], $tgl_visits)) continue;
            $tgl_visits[$key] = $visit[$key]['tanggal'];
        }
        return view('visit.index', compact('user', 'tgl_visits'));
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

    public function getVisitLetters(Request $request)
    {
        $user = Auth::user();
        $visitDB = new VisitLetterService;

        if ($request->tanggal !== null) {
            $visits = $visitDB->index(['order_by' => 'ASC', 'tanggal' => $request->tanggal])['data'] ?? [];
        } else {
            $visits = $visitDB->index(['order_by' => 'ASC'])['data'] ?? [];
        }

        $archives = $visitDB->index(['order_by' => 'ASC', 'status' => VisitLetter::SELESAI])['data'] ?? [];

        $data = [
            'visits' => $visits,
            'archives' => $archives,
        ];

        return response()->json($data);
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

        return back()->with('success', 'Data berhasil diperbarui');
    }



    public function delete($visitLetterId)
    {
        $visitDB = new VisitLetterService;
        $visitDB->delete($visitLetterId);

        return redirect()->route('visit_letter.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function exportVisitFinish()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new VisitFinishesExport, 'DATA-SELESAI-SURAT-KUNJUNGAN-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }
}
