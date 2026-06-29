<x-app-layout>
    <x-slot name="header">Profil Dasa Wisma</x-slot>

    <style>
        .form-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 24px;
        }
        .form-card .card-header {
            background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
            color: white;
            padding: 14px 24px;
            font-weight: 700;
            font-size: 0.9rem;
            border: none;
        }
        .form-card .card-body { padding: 24px; }
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #374151;
            margin-bottom: 6px;
        }
        .form-control {
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.88rem;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
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
        .section-divider {
            font-size: 0.72rem;
            font-weight: 700;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 20px 0 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }
        @media (max-width: 768px) {
        .col-md-6 { width: 100%; }
        .form-card { margin-bottom: 16px; }
    }

    @media (max-width: 576px) {
        .form-card .card-body { padding: 16px; }
        .row.g-3 > .col-6 { width: 100%; }
        .btn-simpan, .btn-hapus { width: 100%; }
    }
    </style>

    @if(session('success'))
        <div class="alert border-0 text-white mb-3"
             style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); border-radius:10px">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">

        {{-- Kolom Kiri: Form --}}
        <div class="col-md-6">
            <div class="form-card">
                <div class="card-header">
                    <i class="bi bi-gear-fill me-2"></i> Pengaturan Profil Dasa Wisma
                </div>
                <div class="card-body">
                    <form action="{{ route('profil.update') }}" method="POST">
                        @csrf

                        <div class="section-divider">📋 Informasi Dasa Wisma</div>

                        <div class="mb-3">
                            <label class="form-label">Nama Dasa Wisma</label>
                            <input type="text" name="nama_dasawisma" class="form-control"
                                   value="{{ $profil->nama_dasawisma ?? '' }}"
                                   placeholder="Contoh: Bugenvil">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ketua</label>
                            <input type="text" name="nama_ketua" class="form-control"
                                   value="{{ $profil->nama_ketua ?? '' }}"
                                   placeholder="Nama ketua dasa wisma">
                        </div>

                        <div class="section-divider">📍 Lokasi</div>

                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label">RT</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"
                                          style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px; font-size:0.85rem; color:#6b7280">
                                        RT
                                    </span>
                                    <input type="text" name="rt" class="form-control"
                                           style="border-left:none; border-radius:0 8px 8px 0"
                                           value="{{ $profil->rt ?? '' }}"
                                           placeholder="Contoh: 01">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">RW</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"
                                          style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px; font-size:0.85rem; color:#6b7280">
                                        RW
                                    </span>
                                    <input type="text" name="rw" class="form-control"
                                           style="border-left:none; border-radius:0 8px 8px 0"
                                           value="{{ $profil->rw ?? '' }}"
                                           placeholder="Contoh: 13">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Desa/Kelurahan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-house-fill text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="text" name="desa" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       value="{{ $profil->desa ?? '' }}"
                                       placeholder="Nama desa/kelurahan">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kecamatan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-geo-alt-fill text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="text" name="kecamatan" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       value="{{ $profil->kecamatan ?? '' }}"
                                       placeholder="Nama kecamatan">
                            </div>
                        </div>

                        <div class="section-divider">📅 Periode</div>

                        <div class="mb-4">
                            <label class="form-label">Tahun</label>
                            <div class="input-group" style="max-width:200px">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-calendar-fill text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="text" name="tahun" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       value="{{ $profil->tahun ?? date('Y') }}"
                                       placeholder="{{ date('Y') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-simpan">
                            <i class="bi bi-save-fill me-1"></i> Simpan Perubahan
                        </button>

                    </form>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Preview --}}
        <div class="col-md-6">
            <div class="form-card">
                <div class="card-header">
                    <i class="bi bi-eye-fill me-2"></i> Preview Profil
                </div>
                <div class="card-body text-center py-4">
                    <img src="{{ asset('images/LOGO PKK PNG.png') }}" alt="Logo PKK"
                         style="width:90px; height:90px; object-fit:contain; margin-bottom:16px;
                                filter:drop-shadow(0 2px 8px rgba(0,0,0,0.15))">
                    <h5 class="fw-bold mb-1" style="color:#1e3a5f">
                        DASA WISMA {{ strtoupper($profil->nama_dasawisma ?? '-') }}
                    </h5>
                    <p class="text-muted mb-3" style="font-size:0.82rem">PKK Kelurahan</p>
                    <hr>
                    <table class="table table-sm text-start mt-2">
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem; width:40%">
                                <i class="bi bi-person-fill me-1"></i> Ketua
                            </td>
                            <td class="fw-semibold" style="font-size:0.85rem">
                                {{ $profil->nama_ketua ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem">
                                <i class="bi bi-house-fill me-1"></i> RT/RW
                            </td>
                            <td class="fw-semibold" style="font-size:0.85rem">
                                RT {{ $profil->rt ?? '-' }} / RW {{ $profil->rw ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem">
                                <i class="bi bi-geo-alt-fill me-1"></i> Desa
                            </td>
                            <td class="fw-semibold" style="font-size:0.85rem">
                                {{ $profil->desa ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem">
                                <i class="bi bi-pin-map-fill me-1"></i> Kecamatan
                            </td>
                            <td class="fw-semibold" style="font-size:0.85rem">
                                {{ $profil->kecamatan ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem">
                                <i class="bi bi-calendar-fill me-1"></i> Tahun
                            </td>
                            <td class="fw-semibold" style="font-size:0.85rem">
                                {{ $profil->tahun ?? '-' }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>