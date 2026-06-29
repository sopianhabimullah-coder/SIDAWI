<x-app-layout>
    <x-slot name="header">Edit User</x-slot>

    <style>
        .form-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            overflow: hidden;
            max-width: 650px;
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
        .form-control, .form-select {
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.88rem;
            transition: all 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
        }
        .btn-simpan {
            background: linear-gradient(90deg, #1e3a5f, #2d6a4f);
            color: white; border: none;
            border-radius: 8px; padding: 10px 24px;
            font-weight: 600; font-size: 0.88rem;
            transition: all 0.2s;
        }
        .btn-simpan:hover { opacity: 0.9; transform: translateY(-1px); color: white; }
        .btn-kembali {
            background: #f1f5f9; color: #374151;
            border: none; border-radius: 8px;
            padding: 10px 24px; font-weight: 600;
            font-size: 0.88rem; text-decoration: none;
            transition: all 0.2s;
        }
        .btn-kembali:hover { background: #e2e8f0; color: #374151; }
        .field-hidden { display: none; }

        @media (max-width: 768px) {
            .form-card { max-width: 100%; }
        }
        @media (max-width: 576px) {
            .form-card .card-body { padding: 16px; }
            .d-flex.gap-2 { flex-direction: column; }
            .btn-simpan, .btn-kembali { width: 100%; text-align: center; display: block; }
        }
    </style>

    @if($errors->any())
        <div class="alert border-0 text-white mb-3"
             style="background: linear-gradient(90deg, #991b1b, #dc2626); border-radius:10px; max-width:650px">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <ul class="mb-0 mt-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <div class="card-header">
            <i class="bi bi-pencil-fill me-2"></i> Edit User
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"
                              style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                            <i class="bi bi-person text-muted" style="font-size:0.85rem"></i>
                        </span>
                        <input type="text" name="name" class="form-control"
                               style="border-left:none; border-radius:0 8px 8px 0"
                               value="{{ $user->name }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"
                              style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                            <i class="bi bi-envelope text-muted" style="font-size:0.85rem"></i>
                        </span>
                        <input type="email" name="email" class="form-control"
                               style="border-left:none; border-radius:0 8px 8px 0"
                               value="{{ $user->email }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Password
                        <small class="text-muted fw-normal">(kosongkan jika tidak ingin diubah)</small>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"
                              style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px">
                            <i class="bi bi-lock text-muted" style="font-size:0.85rem"></i>
                        </span>
                        <input type="password" name="password" class="form-control"
                               style="border-left:none; border-radius:0 8px 8px 0"
                               placeholder="Kosongkan jika tidak diubah">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" id="roleSelect"
                            onchange="toggleRtRw()">
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="kader" {{ $user->role == 'kader' ? 'selected' : '' }}>Kader PKK</option>
                        <option value="rt" {{ $user->role == 'rt' ? 'selected' : '' }}>RT</option>
                        <option value="rw" {{ $user->role == 'rw' ? 'selected' : '' }}>RW</option>
                        <option value="kepala_desa" {{ $user->role == 'kepala_desa' ? 'selected' : '' }}>Kepala Desa</option>
                        <option value="camat" {{ $user->role == 'camat' ? 'selected' : '' }}>Camat</option>
                    </select>
                </div>

                <div class="mb-3 field-hidden" id="fieldRt">
                    <label class="form-label">RT</label>
                    <select name="rt_id" class="form-select">
                        <option value="">-- Pilih RT --</option>
                        @foreach($rts as $rt)
                            <option value="{{ $rt->id }}"
                                {{ $user->rt_id == $rt->id ? 'selected' : '' }}>
                                RT {{ $rt->nomor_rt }} / RW {{ $rt->nomor_rw }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 field-hidden" id="fieldRw">
                    <label class="form-label">Nomor RW</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"
                              style="border:1.5px solid #e5e7eb; border-right:none; border-radius:8px 0 0 8px; font-size:0.85rem; color:#6b7280">
                            RW
                        </span>
                        <input type="text" name="nomor_rw" class="form-control"
                               style="border-left:none; border-radius:0 8px 8px 0"
                               value="{{ $user->nomor_rw }}"
                               placeholder="Contoh: 13">
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-simpan">
                        <i class="bi bi-save-fill me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('users.index') }}" class="btn-kembali">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>

    <script>
    function toggleRtRw() {
        const role = document.getElementById('roleSelect').value;
        document.getElementById('fieldRt').style.display = role === 'rt' ? 'block' : 'none';
        document.getElementById('fieldRw').style.display = role === 'rw' ? 'block' : 'none';
    }
    toggleRtRw();
    </script>

</x-app-layout>