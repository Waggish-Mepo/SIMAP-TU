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
    public function index()
    {
        $user = Auth::user();
        $letterDB = new LetterService;
        $letters = $letterDB->index()['data'] ?? [];
        $tgl_surats = [];
        foreach ($letters as $key => $value) {
            if (in_array($letters[$key]['tgl_surat'], $tgl_surats)) continue;
            $tgl_surats[$key] = $letters[$key]['tgl_surat'];
        }

        return view('letter.index', compact('user', 'tgl_surats'));
    }

    public function getLetterIns(Request $request)
    {
        $user = Auth::user();
        $letterDB = new LetterService;

        $payload = ['jenis' => 'Surat Masuk', 'order_by' => 'ASC'];
        if ($request->tgl_surat !== null) {
            $payload['tgl_surat'] = $request->tgl_surat;
        }
        $letters = $letterDB->index($payload)['data'] ?? [];
        return response()->json($letters);
    }

    public function getLetterOuts(Request $request)
    {
        $user = Auth::user();
        $letterDB = new LetterService;

        $payload = ['jenis' => 'Surat Keluar', 'order_by' => 'ASC'];
        if ($request->tgl_surat !== null) {
            $payload['tgl_surat'] = $request->tgl_surat;
        }
        $letters = $letterDB->index($payload)['data'] ?? [];
        return response()->json($letters);
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

    public function delete(Request $request)
    {
        $letterDB = new LetterService;
        $letter = $letterDB->delete($request->id);

        return response()->json($letter);
    }

    public function exportLetterIn()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new LetterInsExport, 'DATA-SURAT-MASUK-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }

    public function exportLetterInFilterTglSurat($tgl_surat)
    {
        return Excel::download(new LetterInsExport($tgl_surat), 'DATA-SURAT-MASUK-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }

    public function exportLetterOut()
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('DD-MM-YYYY');
        return Excel::download(new LetterOutsExport, 'DATA-SURAT-KELUAR-SMK-WIKRAMA-BOGOR-'.$date.'.xlsx');
    }
}
