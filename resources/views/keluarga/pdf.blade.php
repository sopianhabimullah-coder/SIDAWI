<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Keluarga</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 8px; }
        h3 { text-align: center; margin-bottom: 4px; }
        p { text-align: center; margin: 0 0 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 3px; text-align: center; }
        th { background: #333; color: #fff; }
        .text-left { text-align: left; }
    </style>
</head>
<body>
    <h3>REKAPITULASI CATATAN DAN KEGIATAN WARGA</h3>
    <p>KELOMPOK DASA WISMA</p>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Kepala Keluarga</th>
                <th colspan="11">Jumlah Anggota Keluarga</th>
                <th colspan="6">Kriteria Rumah</th>
                <th colspan="3">Sumber Air</th>
                <th colspan="2">Makanan Pokok</th>
                <th colspan="4">Kegiatan</th>
                <th rowspan="2">Ket</th>
            </tr>
            <tr>
                <th>KK</th>
                <th>L</th>
                <th>P</th>
                <th>Balita l</th>
                <th>Balita p</th>
                <th>PUS</th>
                <th>WUS</th>
                <th>Ibu Hamil</th>
                <th>Ibu Menyusui</th>
                <th>Lansia</th>
                <th>3 Buta</th>
                <th>Berk. Khusus</th>
                <th>Sehat</th>
                <th>Tdk Layak</th>
                <th>Sampah</th>
                <th>SPAL</th>
                <th>Jamban</th>
                <th>P4K</th>
                <th>PDAM</th>
                <th>Sumur</th>
                <th>DLL</th>
                <th>Beras</th>
                <th>Non Beras</th>
                <th>UP2K</th>
                <th>Pekarangan</th>
                <th>Industri</th>
                <th>Kerja Bakti</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keluargas as $keluarga)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-left">{{ $keluarga->nama_kepala_keluarga }}</td>
                <td>{{ $keluarga->jumlah_kk }}</td>
                <td>{{ $keluarga->jml_laki }}</td>
                <td>{{ $keluarga->jml_perempuan }}</td>
                <td>{{ $keluarga->balita }}</td>
                <td>{{ $keluarga->balita_p }}</td>
                <td>{{ $keluarga->pus }}</td>
                <td>{{ $keluarga->wus }}</td>
                <td>{{ $keluarga->ibu_hamil }}</td>
                <td>{{ $keluarga->ibu_menyusui }}</td>
                <td>{{ $keluarga->lansia }}</td>
                <td>{{ $keluarga->tiga_buta }}</td>
                <td>{{ $keluarga->berkebutuhan_khusus }}</td>
                <td>{{ $keluarga->sehat_layak_huni ? 'V' : '-' }}</td>
<td>{{ $keluarga->tidak_layak_huni ? 'V' : '-' }}</td>
<td>{{ $keluarga->tempat_sampah ? 'V' : '-' }}</td>
<td>{{ $keluarga->spal ? 'V' : '-' }}</td>
<td>{{ $keluarga->jamban ? 'V' : '-' }}</td>
<td>{{ $keluarga->stiker_p4k ? 'V' : '-' }}</td>
<td>{{ $keluarga->pdam ? 'V' : '-' }}</td>
<td>{{ $keluarga->sumur ? 'V' : '-' }}</td>
<td>{{ $keluarga->dll_air ? 'V' : '-' }}</td>
<td>{{ $keluarga->beras ? 'V' : '-' }}</td>
<td>{{ $keluarga->non_beras ? 'V' : '-' }}</td>
<td>{{ $keluarga->up2k ? 'V' : '-' }}</td>
<td>{{ $keluarga->pekarangan ? 'V' : '-' }}</td>
<td>{{ $keluarga->industri_rumah_tangga ? 'V' : '-' }}</td>
<td>{{ $keluarga->kerja_bakti ? 'V' : '-' }}</td>
                <td>{{ $keluarga->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>