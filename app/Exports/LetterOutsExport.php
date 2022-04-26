<?php

namespace App\Exports;

use App\Models\Letter;
use App\Service\Database\LetterService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LetterOutsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letter::all()->where('jenis', 'Surat Keluar');
    }

    public function map($letter): array
    {
        return [
            $letter->id,
            $letter->no_surat,
            $letter->perihal,
            $letter->sifat,
            $letter->lampiran,
            $letter->tgl_surat,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'No Surat',
            'Perihal',
            'Sifat',
            'Lampiran',
            'Tanggal Surat',
        ];
    }
}
