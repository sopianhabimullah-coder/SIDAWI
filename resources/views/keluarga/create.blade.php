<x-app-layout>
    <x-slot name="header">Tambah Data Keluarga</x-slot>

    <style>
        .form-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 20px;
        }
        .form-card .card-header {
            background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
            color: white;
            padding: 12px 20px;
            font-weight: 700;
            font-size: 0.88rem;
            border: none;
        }
        .form-card .card-body { padding: 20px; }
        .form-label {
            font-weight: 600;
            font-size: 0.82rem;
            color: #374151;
            margin-bottom: 4px;
        }
        .form-control, .form-select {
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 0.85rem;
            transition: all 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
        }
        .check-item {
            background: #f8fafc;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 14px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
        }
        .check-item:hover {
            border-color: #2d6a4f;
            background: #f0fdf4;
        }
        .check-item input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #2d6a4f;
            cursor: pointer;
        }
        .check-item input[type="checkbox"]:checked + label {
            color: #2d6a4f;
            font-weight: 600;
        }
        .check-item label {
            font-size: 0.83rem;
            color: #374151;
            cursor: pointer;
            margin: 0;
        }
        .check-item:has(input:checked) {
            border-color: #2d6a4f;
            background: #f0fdf4;
        }
        .btn-simpan {
            background: linear-gradient(90deg, #1e3a5f, #2d6a4f);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 0.88rem;
            transition: all 0.2s;
        }
        .btn-simpan:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            color: white;
        }
        .btn-kembali {
            background: #f1f5f9;
            color: #374151;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 0.88rem;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-kembali:hover {
            background: #e2e8f0;
            color: #374151;
        }

        @media (max-width: 768px) {
        .col-md-6 { width: 100%; }
    }

    @media (max-width: 576px) {
        .row.g-2 > .col-6 { width: 50%; }
        .check-item { padding: 8px 10px; font-size: 0.8rem; }
        .form-card .card-body { padding: 14px; }
        .btn-simpan, .btn-kembali { width: 100%; text-align: center; display: block; }
        .d-flex.gap-2 { flex-direction: column; }
    }
    </style>

    <form action="{{ route('keluarga.store') }}" method="POST">
        @csrf

        <div class="row g-4">

            {{-- Kolom Kiri --}}
            <div class="col-md-6">

                {{-- Identitas --}}
                <div class="form-card">
                    <div class="card-header">
                        <i class="bi bi-person-fill me-2"></i> Identitas
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">RT / RW</label>
                            <select name="rt_id" class="form-select">
                                <option value="">-- Pilih RT --</option>
                                @foreach($rts as $rt)
                                    <option value="{{ $rt->id }}">
                                        RT {{ $rt->nomor_rt }} / RW {{ $rt->nomor_rw }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Nama Kepala Keluarga</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-person text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="text" name="nama_kepala_keluarga" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       placeholder="Nama lengkap kepala keluarga">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Jumlah Anggota --}}
                <div class="form-card">
                    <div class="card-header">
                        <i class="bi bi-people-fill me-2"></i> Jumlah Anggota Keluarga
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label">Jumlah KK</label>
                                <input type="number" name="jumlah_kk" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Laki-laki</label>
                                <input type="number" name="jml_laki" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Perempuan</label>
                                <input type="number" name="jml_perempuan" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Balita (L)</label>
                                <input type="number" name="balita" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Balita (P)</label>
                                <input type="number" name="balita_p" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">PUS</label>
                                <input type="number" name="pus" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">WUS</label>
                                <input type="number" name="wus" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Ibu Hamil</label>
                                <input type="number" name="ibu_hamil" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Ibu Menyusui</label>
                                <input type="number" name="ibu_menyusui" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Lansia</label>
                                <input type="number" name="lansia" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">3 Buta</label>
                                <input type="number" name="tiga_buta" class="form-control" value="0" min="0">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Berk. Khusus</label>
                                <input type="number" name="berkebutuhan_khusus" class="form-control" value="0" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="form-card">
                    <div class="card-header">
                        <i class="bi bi-chat-text-fill me-2"></i> Keterangan
                    </div>
                    <div class="card-body">
                        <textarea name="keterangan" class="form-control" rows="3"
                                  placeholder="Keterangan tambahan..."></textarea>
                    </div>
                </div>

            </div>

            {{-- Kolom Kanan --}}
            <div class="col-md-6">

                {{-- Kriteria Rumah --}}
                <div class="form-card">
                    <div class="card-header">
                        <i class="bi bi-house-fill me-2"></i> Kriteria Rumah
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="sehat_layak_huni" value="1">
                                    <label>🏠 Sehat Layak Huni</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="tidak_layak_huni" value="1">
                                    <label>🏚️ Tidak Layak Huni</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="tempat_sampah" value="1">
                                    <label>🗑️ Tempat Sampah</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="spal" value="1">
                                    <label>🚰 SPAL</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="jamban" value="1">
                                    <label>🚽 Jamban</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="stiker_p4k" value="1">
                                    <label>📋 Stiker P4K</label>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sumber Air --}}
                <div class="form-card">
                    <div class="card-header">
                        <i class="bi bi-droplet-fill me-2"></i> Sumber Air Keluarga
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-4">
                                <label class="check-item">
                                    <input type="checkbox" name="pdam" value="1">
                                    <label>🚿 PDAM</label>
                                </label>
                            </div>
                            <div class="col-4">
                                <label class="check-item">
                                    <input type="checkbox" name="sumur" value="1">
                                    <label>🪣 Sumur</label>
                                </label>
                            </div>
                            <div class="col-4">
                                <label class="check-item">
                                    <input type="checkbox" name="dll_air" value="1">
                                    <label>💧 Lainnya</label>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Makanan Pokok --}}
                <div class="form-card">
                    <div class="card-header">
                        <i class="bi bi-basket-fill me-2"></i> Makanan Pokok
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="beras" value="1">
                                    <label>🌾 Beras</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="non_beras" value="1">
                                    <label>🍠 Non Beras</label>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kegiatan --}}
                <div class="form-card">
                    <div class="card-header">
                        <i class="bi bi-calendar-check-fill me-2"></i> Warga Mengikuti Kegiatan
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="up2k" value="1">
                                    <label>💼 UP2K</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="pekarangan" value="1">
                                    <label>🌱 Pemanfaatan Pekarangan</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="industri_rumah_tangga" value="1">
                                    <label>🏭 Industri Rumah Tangga</label>
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="check-item">
                                    <input type="checkbox" name="kerja_bakti" value="1">
                                    <label>🧹 Kerja Bakti</label>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Tombol --}}
        <div class="d-flex gap-2 mt-2 mb-4">
            <button type="submit" class="btn btn-simpan">
                <i class="bi bi-save-fill me-1"></i> Simpan Data
            </button>
            <a href="{{ route('keluarga.index') }}" class="btn-kembali">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

    </form>

</x-app-layout>