<x-app-layout>
    <x-slot name="header">Manajemen RT</x-slot>

    <style>
        .card-rt {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .table-rt thead tr th {
            background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
            color: white;
            padding: 12px 16px;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.1);
            white-space: nowrap;
        }
        .table-rt tbody tr { vertical-align: middle; }
        .table-rt tbody tr:hover { background: #f0f9ff; }
        .table-rt tbody td {
            padding: 10px 16px;
            border: 1px solid #e5e7eb;
        }

        /* Card mobile view */
        .rt-card-mobile {
            display: none;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 12px;
        }
        .rt-card-mobile .card-header-custom {
            background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
            color: white;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .rt-card-mobile .card-body-custom {
            padding: 14px 16px;
            background: white;
        }

        @media (max-width: 768px) {
            .table-desktop { display: none; }
            .rt-card-mobile { display: block; }
            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 8px;
            }
            .d-flex.justify-content-between a,
            .d-flex.justify-content-between span {
                width: 100%;
            }
            .d-flex.justify-content-between a {
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .rt-card-mobile .card-body-custom { padding: 12px; }
        }
    </style>

    @if(session('success'))
        <div class="alert border-0 text-white mb-3"
             style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); border-radius:10px">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('rts.create') }}" class="btn btn-sm text-white fw-semibold"
           style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); border-radius:8px">
            <i class="bi bi-plus-circle"></i> Tambah RT
        </a>
        <span class="text-muted" style="font-size:0.85rem">
            Total: <strong>{{ $rts->count() }}</strong> RT
        </span>
    </div>

    {{-- Tabel Desktop --}}
    <div class="card-rt table-desktop">
        <table class="table table-bordered table-rt mb-0">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th>Nomor RT</th>
                    <th>Nomor RW</th>
                    <th>Nama Ketua RT</th>
                    <th style="width:150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rts as $rt)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                        <span class="badge text-white fw-semibold"
                              style="background:#1e3a5f; font-size:0.85rem; padding:6px 12px; border-radius:6px">
                            RT {{ $rt->nomor_rt }}
                        </span>
                    </td>
                    <td>
                        <span class="badge text-white fw-semibold"
                              style="background:#2d6a4f; font-size:0.85rem; padding:6px 12px; border-radius:6px">
                            RW {{ $rt->nomor_rw }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:32px; height:32px; border-radius:50%;
                                        background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
                                        display:flex; align-items:center; justify-content:center;
                                        color:white; font-size:0.8rem; font-weight:700; flex-shrink:0">
                                {{ strtoupper(substr($rt->nama_ketua ?? '?', 0, 1)) }}
                            </div>
                            <span>{{ $rt->nama_ketua ?? '-' }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('rts.edit', $rt->id) }}"
                               class="btn btn-sm btn-warning text-white fw-semibold"
                               style="border-radius:6px; font-size:0.78rem">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <button class="btn btn-sm btn-danger fw-semibold"
                                    style="border-radius:6px; font-size:0.78rem"
                                    onclick="konfirmasiHapus(`{{ route('rts.destroy', $rt->id) }}`, `RT {{ $rt->nomor_rt }} / RW {{ $rt->nomor_rw }}`)">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        <i class="bi bi-inbox" style="font-size:2rem"></i>
                        <p class="mt-2">Belum ada data RT</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Card Mobile --}}
    <div class="d-block d-md-none">
        @forelse($rts as $rt)
        <div class="rt-card-mobile">
            <div class="card-header-custom">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:36px; height:36px; border-radius:50%;
                                background: rgba(255,255,255,0.2);
                                display:flex; align-items:center; justify-content:center;
                                color:white; font-size:0.9rem; font-weight:700;">
                        {{ strtoupper(substr($rt->nama_ketua ?? '?', 0, 1)) }}
                    </div>
                    <div>
                        <div style="font-weight:700; font-size:0.9rem">{{ $rt->nama_ketua ?? '-' }}</div>
                        <div style="font-size:0.75rem; opacity:0.8">RT {{ $rt->nomor_rt }} / RW {{ $rt->nomor_rw }}</div>
                    </div>
                </div>
                <span style="font-size:0.75rem; opacity:0.7">#{{ $loop->iteration }}</span>
            </div>
            <div class="card-body-custom">
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <div style="font-size:0.72rem; color:#6b7280; margin-bottom:4px">Nomor RT</div>
                        <span class="badge text-white fw-semibold"
                              style="background:#1e3a5f; font-size:0.82rem; padding:5px 12px; border-radius:6px">
                            RT {{ $rt->nomor_rt }}
                        </span>
                    </div>
                    <div class="col-6">
                        <div style="font-size:0.72rem; color:#6b7280; margin-bottom:4px">Nomor RW</div>
                        <span class="badge text-white fw-semibold"
                              style="background:#2d6a4f; font-size:0.82rem; padding:5px 12px; border-radius:6px">
                            RW {{ $rt->nomor_rw }}
                        </span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('rts.edit', $rt->id) }}"
                       class="btn btn-sm btn-warning text-white fw-semibold flex-fill text-center"
                       style="border-radius:8px; font-size:0.82rem">
                        <i class="bi bi-pencil-fill"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-danger fw-semibold flex-fill"
                            style="border-radius:8px; font-size:0.82rem"
                            onclick="konfirmasiHapus(`{{ route('rts.destroy', $rt->id) }}`, `RT {{ $rt->nomor_rt }} / RW {{ $rt->nomor_rw }}`)">
                        <i class="bi bi-trash-fill"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-4 text-muted">
            <i class="bi bi-inbox" style="font-size:2rem"></i>
            <p class="mt-2">Belum ada data RT</p>
        </div>
        @endforelse
    </div>

</x-app-layout>