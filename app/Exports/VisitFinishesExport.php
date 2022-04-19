<?php

namespace App\Exports;

use App\Models\VisitLetter;
use App\Service\Database\VisitLetterService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitFinishesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VisitLetter::all()->where('status', 'SELESAI');
    }

    public function map($visit): array
    {
        return [
            $visit->id,
            $visit->no_surat,
            $visit->perihal,
            $visit->lampiran,
            $visit->kepada,
            $visit->hari,
            $visit->tanggal,
            $visit->jam,
            $visit->tempat,
            $visit->jumlah_peserta,
            $visit->keterangan,

        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'No Surat',
            'Perihal',
            'Lampiran',
            'Kepada',
            'Hari',
            'Tanggal',
            'Jam',
            'Tempat',
            'Jumlah Peserta',
            'Keterangan',
        ];
    }
}