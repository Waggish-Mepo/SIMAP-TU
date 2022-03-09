<?php

namespace App\Http\Controllers\Letter;

use App\Exports\LetterInsExport;
use App\Exports\LetterOutsExport;
use App\Http\Controllers\Controller;
use App\Service\Database\LetterService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LetterController extends Controller
{
    public function indexLetterIn()
    {
        $user = Auth::user();
        $letterDB = new LetterService;
        $letters = $letterDB->index(['jenis' => 'Surat Masuk', 'order_by' => 'ASC'])['data'] ?? [];

        return view('letter.index', compact('user', 'letters'));
    }

    public function indexLetterOut()
    {
        $user = Auth::user();
        $letterDB = new LetterService;
        $letters = $letterDB->index(['jenis' => 'Surat Keluar', 'order_by' => 'ASC'])['data'] ?? [];

        return view('letter.index', compact('user', 'letters'));
    }

    public function create(Request $request)
    {
        $letterDB = new LetterService;

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);
        $letterDB->create($payload);

        return back()->with('success', 'Surat berhasil dibuat');
    }

    public function update($letterId, Request $request)
    {
        $letterDB = new LetterService;

        $payload = $request->all();
        unset($payload['_token']);
        unset($payload['_method']);
        $letterDB->update($letterId, $payload);

        return back()->with('success', 'Surat berhasil diperbarui');
    }

    public function delete($letterId)
    {
        $letterDB = new LetterService;
        $letterDB->delete($letterId);

        return back()->with('success', 'Surat berhasil dihapus');
    }

    public function exportLetterIn()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new LetterInsExport, 'DATA-SURAT-MASUK-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }

    public function exportLetterOut()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new LetterOutsExport, 'DATA-SURAT-KELUAR-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }
}
