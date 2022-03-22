<?php

namespace App\Exports;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LetterInsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letter::all()->where('jenis', 'Surat Masuk');
    }

    public function map($letter): array
    {
        return [
            $letter->id,
            $letter->no_surat,
            $letter->perihal,
            $letter->pengirim,
            $letter->sifat,
            $letter->lampiran,
            $letter->tgl_surat,
            $letter->tgl_terima,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'No Surat',
            'Perihal',
            'Pengirim',
            'Sifat',
            'Lampiran',
            'Tanggal Surat',
            'Tanggal Terima',
        ];
    }
}
