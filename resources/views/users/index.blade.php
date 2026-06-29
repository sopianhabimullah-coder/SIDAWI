<x-app-layout>
    <x-slot name="header">Manajemen User</x-slot>

    <style>
        .card-user {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .table-user thead tr th {
            background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
            color: white;
            padding: 12px 16px;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.1);
            white-space: nowrap;
        }
        .table-user tbody tr { vertical-align: middle; }
        .table-user tbody tr:hover { background: #f0f9ff; }
        .table-user tbody td {
            padding: 10px 16px;
            border: 1px solid #e5e7eb;
        }
        .role-badge {
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* Card Mobile */
        .user-card-mobile {
            display: none;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 12px;
        }
        .user-card-mobile .card-header-custom {
            background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
            color: white;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .user-card-mobile .card-body-custom {
            padding: 14px 16px;
            background: white;
        }

        @media (max-width: 768px) {
            .table-desktop { display: none; }
            .user-card-mobile { display: block; }
            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 8px;
            }
            .d-flex.justify-content-between a {
                text-align: center;
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .user-card-mobile .card-body-custom { padding: 12px; }
        }
    </style>

    @if(session('success'))
        <div class="alert border-0 text-white mb-3"
             style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); border-radius:10px">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-sm text-white fw-semibold"
           style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); border-radius:8px">
            <i class="bi bi-person-plus-fill"></i> Tambah User
        </a>
        <span class="text-muted" style="font-size:0.85rem">
            Total: <strong>{{ $users->count() }}</strong> User
        </span>
    </div>

    {{-- Tabel Desktop --}}
    <div class="card-user table-desktop">
        <table class="table table-bordered table-user mb-0">
            <thead>
                <tr>
                    <th style="width:50px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th style="width:130px">Role</th>
                    <th>RT/RW</th>
                    <th style="width:130px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                @php
                $roleConfig = [
                    'admin'       => ['bg' => '#dc2626', 'label' => 'ADMIN'],
                    'kader'       => ['bg' => '#7c3aed', 'label' => 'KADER PKK'],
                    'rt'          => ['bg' => '#1e3a5f', 'label' => 'RT'],
                    'rw'          => ['bg' => '#0891b2', 'label' => 'RW'],
                    'kepala_desa' => ['bg' => '#d97706', 'label' => 'KEPALA DESA'],
                    'camat'       => ['bg' => '#15803d', 'label' => 'CAMAT'],
                ];
                $role = $roleConfig[$user->role] ?? ['bg' => '#6b7280', 'label' => strtoupper($user->role)];
                @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:34px; height:34px; border-radius:50%;
                                        background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
                                        display:flex; align-items:center; justify-content:center;
                                        color:white; font-size:0.85rem; font-weight:700; flex-shrink:0">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div style="font-weight:600; font-size:0.88rem">{{ $user->name }}</div>
                        </div>
                    </td>
                    <td style="font-size:0.85rem; color:#6b7280">{{ $user->email }}</td>
                    <td>
                        <span class="role-badge text-white" style="background: {{ $role['bg'] }}">
                            {{ $role['label'] }}
                        </span>
                    </td>
                    <td style="font-size:0.85rem">
                        @if($user->rt)
                            <span class="badge text-white"
                                  style="background:#1e3a5f; border-radius:6px; padding:5px 10px">
                                RT {{ $user->rt->nomor_rt }} / RW {{ $user->rt->nomor_rw }}
                            </span>
                        @elseif($user->nomor_rw)
                            <span class="badge text-white"
                                  style="background:#0891b2; border-radius:6px; padding:5px 10px">
                                RW {{ $user->nomor_rw }}
                            </span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-sm btn-warning text-white fw-semibold"
                               style="border-radius:6px; font-size:0.78rem">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <button class="btn btn-sm btn-danger fw-semibold"
                                    style="border-radius:6px; font-size:0.78rem"
                                    onclick="konfirmasiHapus(`{{ route('users.destroy', $user->id) }}`, `{{ $user->name }}`)">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        <i class="bi bi-people" style="font-size:2rem"></i>
                        <p class="mt-2">Belum ada data user</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Card Mobile --}}
    <div class="d-block d-md-none">
        @forelse($users as $user)
        @php
        $roleConfig = [
            'admin'       => ['bg' => '#dc2626', 'label' => 'ADMIN'],
            'kader'       => ['bg' => '#7c3aed', 'label' => 'KADER PKK'],
            'rt'          => ['bg' => '#1e3a5f', 'label' => 'RT'],
            'rw'          => ['bg' => '#0891b2', 'label' => 'RW'],
            'kepala_desa' => ['bg' => '#d97706', 'label' => 'KEPALA DESA'],
            'camat'       => ['bg' => '#15803d', 'label' => 'CAMAT'],
        ];
        $role = $roleConfig[$user->role] ?? ['bg' => '#6b7280', 'label' => strtoupper($user->role)];
        @endphp
        <div class="user-card-mobile">
            <div class="card-header-custom">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:38px; height:38px; border-radius:50%;
                                background: rgba(255,255,255,0.2);
                                display:flex; align-items:center; justify-content:center;
                                color:white; font-size:1rem; font-weight:700; flex-shrink:0">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <div style="font-weight:700; font-size:0.9rem">{{ $user->name }}</div>
                        <div style="font-size:0.75rem; opacity:0.8">{{ $user->email }}</div>
                    </div>
                </div>
                <span class="role-badge text-white"
                      style="background: rgba(255,255,255,0.2); font-size:0.68rem">
                    {{ $role['label'] }}
                </span>
            </div>
            <div class="card-body-custom">
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <div style="font-size:0.72rem; color:#6b7280; margin-bottom:4px">Role</div>
                        <span class="role-badge text-white" style="background: {{ $role['bg'] }}">
                            {{ $role['label'] }}
                        </span>
                    </div>
                    <div class="col-6">
                        <div style="font-size:0.72rem; color:#6b7280; margin-bottom:4px">RT/RW</div>
                        @if($user->rt)
                            <span class="badge text-white"
                                  style="background:#1e3a5f; border-radius:6px; padding:4px 8px; font-size:0.75rem">
                                RT {{ $user->rt->nomor_rt }} / RW {{ $user->rt->nomor_rw }}
                            </span>
                        @elseif($user->nomor_rw)
                            <span class="badge text-white"
                                  style="background:#0891b2; border-radius:6px; padding:4px 8px; font-size:0.75rem">
                                RW {{ $user->nomor_rw }}
                            </span>
                        @else
                            <span class="text-muted" style="font-size:0.82rem">-</span>
                        @endif
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('users.edit', $user->id) }}"
                       class="btn btn-sm btn-warning text-white fw-semibold flex-fill text-center"
                       style="border-radius:8px; font-size:0.82rem">
                        <i class="bi bi-pencil-fill"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-danger fw-semibold flex-fill"
                            style="border-radius:8px; font-size:0.82rem"
                            onclick="konfirmasiHapus(`{{ route('users.destroy', $user->id) }}`, `{{ $user->name }}`)">
                        <i class="bi bi-trash-fill"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-4 text-muted">
            <i class="bi bi-people" style="font-size:2rem"></i>
            <p class="mt-2">Belum ada data user</p>
        </div>
        @endforelse
    </div>

</x-app-layout>