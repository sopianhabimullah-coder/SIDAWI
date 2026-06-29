<?php

namespace App\Exports;

use App\Models\Keluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KeluargaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Keluarga::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Kepala Keluarga',
            'Jumlah KK',
            'Laki-laki',
            'Perempuan',
            'Balita l',
            'Balita P',
            'PUS',
            'WUS',
            'Ibu Hamil',
            'Ibu Menyusui',
            'Lansia',
            '3 Buta',
            'Berk. Khusus',
            'Sehat Layak Huni',
            'Tidak Layak Huni',
            'Tempat Sampah',
            'SPAL',
            'Jamban',
            'Stiker P4K',
            'PDAM',
            'Sumur',
            'DLL Air',
            'Beras',
            'Non Beras',
            'UP2K',
            'Pekarangan',
            'Industri RT',
            'Kerja Bakti',
            'Keterangan',
        ];
    }

    public function map($keluarga): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $keluarga->nama_kepala_keluarga,
            $keluarga->jumlah_kk,
            $keluarga->jml_laki,
            $keluarga->jml_perempuan,
            $keluarga->balita,
            $keluarga->balita_p,
            $keluarga->pus,
            $keluarga->wus,
            $keluarga->ibu_hamil,
            $keluarga->ibu_menyusui,
            $keluarga->lansia,
            $keluarga->tiga_buta,
            $keluarga->berkebutuhan_khusus,
            $keluarga->sehat_layak_huni ? '✓' : '-',
            $keluarga->tidak_layak_huni ? '✓' : '-',
            $keluarga->tempat_sampah ? '✓' : '-',
            $keluarga->spal ? '✓' : '-',
            $keluarga->jamban ? '✓' : '-',
            $keluarga->stiker_p4k ? '✓' : '-',
            $keluarga->pdam ? '✓' : '-',
            $keluarga->sumur ? '✓' : '-',
            $keluarga->dll_air ? '✓' : '-',
            $keluarga->beras ? '✓' : '-',
            $keluarga->non_beras ? '✓' : '-',
            $keluarga->up2k ? '✓' : '-',
            $keluarga->pekarangan ? '✓' : '-',
            $keluarga->industri_rumah_tangga ? '✓' : '-',
            $keluarga->kerja_bakti ? '✓' : '-',
            $keluarga->keterangan,
        ];
    }
}
