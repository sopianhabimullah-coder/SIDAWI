<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Keluarga</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h3 { text-align: center; margin-bottom: 4px; }
        p { text-align: center; margin: 0 0 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #000; padding: 5px 8px; }
        th { background: #333; color: #fff; width: 40%; }
        td { width: 60%; }
        .section-title { background: #555; color: #fff; text-align: center;
                         font-weight: bold; padding: 5px; margin-top: 10px; }
    </style>
</head>
<body>
    <h3>DATA KELUARGA DASA WISMA</h3>
    <p>Rekapitulasi Catatan dan Kegiatan Warga</p>

    {{-- Identitas --}}
    <div class="section-title">Identitas</div>
    <table>
        <tr><th>Nama Kepala Keluarga</th><td>{{ $keluarga->nama_kepala_keluarga }}</td></tr>
        <tr><th>Jumlah KK</th><td>{{ $keluarga->jumlah_kk }}</td></tr>
    </table>

    {{-- Jumlah Anggota --}}
    <div class="section-title">Jumlah Anggota Keluarga</div>
    <table>
        <tr><th>Laki-laki</th><td>{{ $keluarga->jml_laki }}</td></tr>
        <tr><th>Perempuan</th><td>{{ $keluarga->jml_perempuan }}</td></tr>
        <tr><th>Balita</th><td>{{ $keluarga->balita }}</td></tr>
        <tr><th>PUS</th><td>{{ $keluarga->pus }}</td></tr>
        <tr><th>WUS</th><td>{{ $keluarga->wus }}</td></tr>
        <tr><th>Ibu Hamil</th><td>{{ $keluarga->ibu_hamil }}</td></tr>
        <tr><th>Ibu Menyusui</th><td>{{ $keluarga->ibu_menyusui }}</td></tr>
        <tr><th>Lansia</th><td>{{ $keluarga->lansia }}</td></tr>
        <tr><th>3 Buta</th><td>{{ $keluarga->tiga_buta }}</td></tr>
        <tr><th>Berkebutuhan Khusus</th><td>{{ $keluarga->berkebutuhan_khusus }}</td></tr>
    </table>

    {{-- Kriteria Rumah --}}
    <div class="section-title">Kriteria Rumah</div>
    <table>
        <tr><th>Sehat Layak Huni</th><td>{{ $keluarga->sehat_layak_huni ? '✓' : '-' }}</td></tr>
        <tr><th>Tidak Layak Huni</th><td>{{ $keluarga->tidak_layak_huni ? '✓' : '-' }}</td></tr>
        <tr><th>Tempat Sampah</th><td>{{ $keluarga->tempat_sampah ? '✓' : '-' }}</td></tr>
        <tr><th>SPAL</th><td>{{ $keluarga->spal ? '✓' : '-' }}</td></tr>
        <tr><th>Jamban</th><td>{{ $keluarga->jamban ? '✓' : '-' }}</td></tr>
        <tr><th>Stiker P4K</th><td>{{ $keluarga->stiker_p4k ? '✓' : '-' }}</td></tr>
    </table>

    {{-- Sumber Air --}}
    <div class="section-title">Sumber Air Keluarga</div>
    <table>
        <tr><th>PDAM</th><td>{{ $keluarga->pdam ? '✓' : '-' }}</td></tr>
        <tr><th>Sumur</th><td>{{ $keluarga->sumur ? '✓' : '-' }}</td></tr>
        <tr><th>Lainnya</th><td>{{ $keluarga->dll_air ? '✓' : '-' }}</td></tr>
    </table>

    {{-- Makanan Pokok --}}
    <div class="section-title">Makanan Pokok</div>
    <table>
        <tr><th>Beras</th><td>{{ $keluarga->beras ? '✓' : '-' }}</td></tr>
        <tr><th>Non Beras</th><td>{{ $keluarga->non_beras ? '✓' : '-' }}</td></tr>
    </table>

    {{-- Kegiatan --}}
    <div class="section-title">Warga Mengikuti Kegiatan</div>
    <table>
        <tr><th>UP2K</th><td>{{ $keluarga->up2k ? '✓' : '-' }}</td></tr>
        <tr><th>Pemanfaatan Tanah/Pekarangan</th><td>{{ $keluarga->pekarangan ? '✓' : '-' }}</td></tr>
        <tr><th>Industri Rumah Tangga</th><td>{{ $keluarga->industri_rumah_tangga ? '✓' : '-' }}</td></tr>
        <tr><th>Kerja Bakti</th><td>{{ $keluarga->kerja_bakti ? '✓' : '-' }}</td></tr>
    </table>

    {{-- Keterangan --}}
    <div class="section-title">Keterangan</div>
    <table>
        <tr><th>Keterangan</th><td>{{ $keluarga->keterangan ?? '-' }}</td></tr>
    </table>

</body>
</html>