<x-app-layout>
    <x-slot name="header">Data Keluarga</x-slot>

    <style>
        .table-keluarga { font-size: 0.78rem; }
        .table-keluarga thead tr:first-child th {
            background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
            color: white;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            padding: 10px 8px;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .table-keluarga thead tr:last-child th {
            background: #1e4976;
            color: white;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            padding: 8px 6px;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .table-keluarga tbody tr {
            vertical-align: middle;
        }
        .table-keluarga tbody tr:hover {
            background: #f0f9ff;
        }
        .table-keluarga tbody td {
            padding: 8px 6px;
            text-align: center;
            border: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        .table-keluarga tbody td:nth-child(2),
        .table-keluarga tbody td:nth-child(3) {
            text-align: left;
        }
        .centang { color: #16a34a; font-weight: bold; }
        .strip { color: #9ca3af; }
        .btn-aksi { display: flex; flex-direction: column; gap: 4px; }
        .card-tabel {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
        }
    /* ... css yang sudah ada ... */

    @media (max-width: 768px) {
        .d-flex.gap-2 { gap: 6px !important; }
        .btn-sm { font-size: 0.75rem; padding: 5px 10px; }
    }

    @media (max-width: 576px) {
        .d-flex.flex-wrap { gap: 6px !important; }
        .input-group { flex-wrap: nowrap; }
        .col-md-4, .col-md-3 { width: 100%; }
        .col-auto { width: 50%; }
        .col-auto .btn, .col-auto a { width: 100%; text-align: center; }
    }
</style>    
    {{-- Tombol Aksi --}}
    <div class="d-flex flex-wrap gap-2 mb-3">
        @if(!auth()->user()->isReadOnly())
            <a href="{{ route('keluarga.create') }}" class="btn btn-sm text-white fw-semibold"
               style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); border-radius:8px">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        @endif
        <a href="{{ route('keluarga.exportExcel') }}" class="btn btn-sm btn-success fw-semibold" style="border-radius:8px">
            <i class="bi bi-file-earmark-excel"></i> Export Excel
        </a>
        <a href="{{ route('keluarga.exportPdf') }}" class="btn btn-sm btn-danger fw-semibold" style="border-radius:8px">
            <i class="bi bi-file-earmark-pdf"></i> Export PDF
        </a>
        <a href="{{ route('keluarga.cetak') }}" class="btn btn-sm btn-secondary fw-semibold" target="_blank" style="border-radius:8px">
            <i class="bi bi-printer"></i> Cetak
        </a>
    </div>

    {{-- Search & Filter --}}
    <form action="{{ route('keluarga.index') }}" method="GET" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control border-start-0"
                           placeholder="Cari Nama Kepala Keluarga..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="filter" class="form-select">
                    <option value="">Semua Data</option>
                    <option value="balita" {{ request('filter') == 'balita' ? 'selected' : '' }}>Balita</option>
                    <option value="lansia" {{ request('filter') == 'lansia' ? 'selected' : '' }}>Lansia</option>
                    <option value="ibu_hamil" {{ request('filter') == 'ibu_hamil' ? 'selected' : '' }}>Ibu Hamil</option>
                    <option value="tidak_layak_huni" {{ request('filter') == 'tidak_layak_huni' ? 'selected' : '' }}>Tidak Layak Huni</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-sm fw-semibold text-white"
                        style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); border-radius:8px">
                    <i class="bi bi-funnel"></i> Filter
                </button>
            </div>
            <div class="col-auto">
                <a href="{{ route('keluarga.index') }}" class="btn btn-sm btn-outline-secondary fw-semibold" style="border-radius:8px">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                </a>
            </div>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="card-tabel">
        <div class="table-responsive">
            <table class="table table-bordered table-keluarga mb-0">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama Kepala Keluarga</th>
                        <th rowspan="2">RT/RW</th>
                        <th colspan="12">Jumlah Anggota Keluarga</th>
                        <th colspan="6">Kriteria Rumah</th>
                        <th colspan="3">Sumber Air</th>
                        <th colspan="2">Makanan Pokok</th>
                        <th colspan="4">Warga Ikut Kegiatan</th>
                        <th rowspan="2">Ket</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>KK</th>
                        <th>L</th>
                        <th>P</th>
                        <th>Balita L</th>
                        <th>Balita P</th>
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
                    @forelse($keluargas as $keluarga)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="text-align:left; white-space:nowrap">{{ $keluarga->nama_kepala_keluarga }}</td>
                        <td style="white-space:nowrap">
                            {{ $keluarga->rt ? 'RT '.$keluarga->rt->nomor_rt.' / RW '.$keluarga->rt->nomor_rw : '-' }}
                        </td>
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
                        <td><span class="{{ $keluarga->sehat_layak_huni ? 'centang' : 'strip' }}">{{ $keluarga->sehat_layak_huni ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->tidak_layak_huni ? 'centang' : 'strip' }}">{{ $keluarga->tidak_layak_huni ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->tempat_sampah ? 'centang' : 'strip' }}">{{ $keluarga->tempat_sampah ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->spal ? 'centang' : 'strip' }}">{{ $keluarga->spal ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->jamban ? 'centang' : 'strip' }}">{{ $keluarga->jamban ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->stiker_p4k ? 'centang' : 'strip' }}">{{ $keluarga->stiker_p4k ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->pdam ? 'centang' : 'strip' }}">{{ $keluarga->pdam ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->sumur ? 'centang' : 'strip' }}">{{ $keluarga->sumur ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->dll_air ? 'centang' : 'strip' }}">{{ $keluarga->dll_air ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->beras ? 'centang' : 'strip' }}">{{ $keluarga->beras ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->non_beras ? 'centang' : 'strip' }}">{{ $keluarga->non_beras ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->up2k ? 'centang' : 'strip' }}">{{ $keluarga->up2k ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->pekarangan ? 'centang' : 'strip' }}">{{ $keluarga->pekarangan ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->industri_rumah_tangga ? 'centang' : 'strip' }}">{{ $keluarga->industri_rumah_tangga ? '✓' : '-' }}</span></td>
                        <td><span class="{{ $keluarga->kerja_bakti ? 'centang' : 'strip' }}">{{ $keluarga->kerja_bakti ? '✓' : '-' }}</span></td>
                        <td style="text-align:left; max-width:100px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap"
                            title="{{ $keluarga->keterangan }}">
                            {{ $keluarga->keterangan ?? '-' }}
                        </td>
                        <td>
                            <div class="btn-aksi">
                                @if(!auth()->user()->isReadOnly())
                                    <a href="{{ route('keluarga.edit', $keluarga->id) }}"
                                       class="btn btn-xs btn-warning text-white fw-semibold"
                                       style="font-size:0.72rem; padding:3px 8px; border-radius:6px">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>
                                @endif
                                <a href="{{ route('keluarga.exportPdfDetail', $keluarga->id) }}"
                                   class="btn btn-xs btn-danger fw-semibold"
                                   style="font-size:0.72rem; padding:3px 8px; border-radius:6px">
                                    <i class="bi bi-file-pdf"></i> PDF
                                </a>
                                <a href="{{ route('keluarga.cetakDetail', $keluarga->id) }}"
                                   class="btn btn-xs btn-secondary fw-semibold"
                                   style="font-size:0.72rem; padding:3px 8px; border-radius:6px"
                                   target="_blank">
                                    <i class="bi bi-printer"></i> Cetak
                                </a>
                                @if(!auth()->user()->isReadOnly())
                                <button class="btn btn-xs btn-danger fw-semibold w-100"
        style="font-size:0.72rem; padding:3px 8px; border-radius:6px"
        onclick="konfirmasiHapus(`{{ route('keluarga.destroy', $keluarga->id) }}`, `{{ $keluarga->nama_kepala_keluarga }}`)">
    <i class="bi bi-trash-fill"></i> Hapus
</button>
</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="32" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox" style="font-size:2rem"></i>
                            <p class="mt-2">Belum ada data keluarga</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>