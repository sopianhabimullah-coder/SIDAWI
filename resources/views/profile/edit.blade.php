<x-app-layout>
    <x-slot name="header">Profil Akun</x-slot>

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
        .btn-hapus {
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 0.88rem;
        }
        .btn-hapus:hover {
            background: #b91c1c;
            color: white;
        }
        .alert-success-custom {
            background: linear-gradient(90deg, #1e3a5f, #2d6a4f);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 16px;
            font-size: 0.85rem;
            margin-bottom: 16px;
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

    <div class="row g-4">

        {{-- Kolom Kiri --}}
        <div class="col-md-6">

            {{-- Update Info --}}
            <div class="form-card">
                <div class="card-header">
                    <i class="bi bi-person-fill me-2"></i> Informasi Akun
                </div>
                <div class="card-body">
                    @if(session('status') === 'profile-updated')
                        <div class="alert-success-custom">
                            <i class="bi bi-check-circle-fill"></i> Profil berhasil diperbarui!
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-person text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="text" name="name" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       value="{{ old('name', auth()->user()->name) }}" required>
                            </div>
                            @error('name')
                                <div class="text-danger mt-1" style="font-size:0.8rem">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-envelope text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="email" name="email" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       value="{{ old('email', auth()->user()->email) }}" required>
                            </div>
                            @error('email')
                                <div class="text-danger mt-1" style="font-size:0.8rem">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-simpan">
                            <i class="bi bi-save-fill me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>

            {{-- Update Password --}}
            <div class="form-card">
                <div class="card-header">
                    <i class="bi bi-lock-fill me-2"></i> Ubah Password
                </div>
                <div class="card-body">
                    @if(session('status') === 'password-updated')
                        <div class="alert-success-custom">
                            <i class="bi bi-check-circle-fill"></i> Password berhasil diperbarui!
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label class="form-label">Password Saat Ini</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-lock text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="password" name="current_password" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       placeholder="Password saat ini">
                            </div>
                            @error('current_password')
                                <div class="text-danger mt-1" style="font-size:0.8rem">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-key text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="password" name="password" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       placeholder="Minimal 8 karakter">
                            </div>
                            @error('password')
                                <div class="text-danger mt-1" style="font-size:0.8rem">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                                    <i class="bi bi-key-fill text-muted" style="font-size:0.85rem"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control"
                                       style="border-left:none; border-radius:0 8px 8px 0"
                                       placeholder="Ulangi password baru">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-simpan">
                            <i class="bi bi-shield-lock-fill me-1"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan --}}
        <div class="col-md-6">

            {{-- Info Akun --}}
            <div class="form-card">
                <div class="card-header">
                    <i class="bi bi-info-circle-fill me-2"></i> Info Akun
                </div>
                <div class="card-body text-center py-4">
                    <div style="width:70px; height:70px; border-radius:50%;
                                background: linear-gradient(135deg, #1e3a5f, #2d6a4f);
                                display:flex; align-items:center; justify-content:center;
                                color:white; font-size:1.8rem; font-weight:700;
                                margin: 0 auto 16px">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <h5 class="fw-bold mb-1" style="color:#1e3a5f">{{ auth()->user()->name }}</h5>
                    <p class="text-muted mb-3" style="font-size:0.82rem">{{ auth()->user()->email }}</p>
                    <hr>
                    <table class="table table-sm text-start mt-2">
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem; width:40%">
                                <i class="bi bi-shield-fill me-1"></i> Role
                            </td>
                            <td>
                                <span class="badge text-white fw-semibold"
                                      style="background:#1e3a5f; border-radius:6px; padding:4px 10px">
                                    {{ strtoupper(auth()->user()->role) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem">
                                <i class="bi bi-house-fill me-1"></i> RT/RW
                            </td>
                            <td style="font-size:0.85rem; font-weight:600">
                                @if(auth()->user()->rt)
                                    RT {{ auth()->user()->rt->nomor_rt }} / RW {{ auth()->user()->rt->nomor_rw }}
                                @elseif(auth()->user()->nomor_rw)
                                    RW {{ auth()->user()->nomor_rw }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="font-size:0.85rem">
                                <i class="bi bi-calendar-fill me-1"></i> Bergabung
                            </td>
                            <td style="font-size:0.85rem; font-weight:600">
                                {{ auth()->user()->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Hapus Akun --}}
            <div class="form-card">
                <div class="card-header" style="background: linear-gradient(135deg, #991b1b, #dc2626)">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Hapus Akun
                </div>
                <div class="card-body">
                    <p style="font-size:0.85rem; color:#6b7280; margin-bottom:16px">
                        Setelah akun dihapus, semua data akan dihapus permanen. Pastikan kamu sudah backup data sebelum melanjutkan.
                    </p>
                    <button type="button" class="btn btn-hapus"
                            data-bs-toggle="modal" data-bs-target="#modalHapusAkun">
                        <i class="bi bi-trash-fill me-1"></i> Hapus Akun
                    </button>
                </div>
            </div>

        </div>
    </div>

    {{-- Modal Hapus Akun --}}
    <div class="modal fade" id="modalHapusAkun" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:16px; border:none">
                <div class="modal-header border-0"
                     style="background: linear-gradient(135deg, #991b1b, #dc2626); border-radius:16px 16px 0 0">
                    <h5 class="modal-title text-white fw-bold">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Hapus Akun
                    </h5>
                </div>
                <div class="modal-body p-4">
                    <p style="font-size:0.88rem; color:#374151">
                        Apakah kamu yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.
                        Masukkan password untuk konfirmasi.
                    </p>
                    <form method="POST" action="{{ route('profile.destroy') }}" id="formHapusAkun">
                        @csrf
                        @method('delete')
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                   placeholder="Masukkan password kamu">
                            @error('password', 'userDeletion')
                                <div class="text-danger mt-1" style="font-size:0.8rem">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                            style="border-radius:8px" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" form="formHapusAkun" class="btn btn-hapus btn-sm">
                        <i class="bi bi-trash-fill me-1"></i> Ya, Hapus Akun
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>