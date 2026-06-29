<x-app-layout>
    <x-slot name="header">Edit RT</x-slot>

    <style>
        .form-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
            max-width: 600px;
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
        .btn-kembali {
            background: #f1f5f9;
            color: #374151;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 0.88rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-kembali:hover {
            background: #e2e8f0;
            color: #374151;
        }
    </style>

    <div class="form-card">
        <div class="card-header">
            <i class="bi bi-pencil-fill me-2"></i> Edit Data RT
        </div>
        <div class="card-body">
            <form action="{{ route('rts.update', $rt->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">Nomor RT</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"
                                  style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px; font-size:0.85rem; color:#6b7280">
                                RT
                            </span>
                            <input type="text" name="nomor_rt" class="form-control"
                                   style="border-left:none; border-radius:0 8px 8px 0"
                                   value="{{ $rt->nomor_rt }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Nomor RW</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"
                                  style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px; font-size:0.85rem; color:#6b7280">
                                RW
                            </span>
                            <input type="text" name="nomor_rw" class="form-control"
                                   style="border-left:none; border-radius:0 8px 8px 0"
                                   value="{{ $rt->nomor_rw }}">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Nama Ketua RT</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"
                              style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                            <i class="bi bi-person-fill text-muted" style="font-size:0.85rem"></i>
                        </span>
                        <input type="text" name="nama_ketua" class="form-control"
                               style="border-left:none; border-radius:0 8px 8px 0"
                               value="{{ $rt->nama_ketua }}">
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-simpan">
                        <i class="bi bi-save-fill me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('rts.index') }}" class="btn-kembali">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>