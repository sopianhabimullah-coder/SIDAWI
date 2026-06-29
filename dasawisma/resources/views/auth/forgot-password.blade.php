<x-guest-layout>
    <style>
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #374151;
            margin-bottom: 6px;
            display: block;
        }
        .form-control {
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.88rem;
            width: 100%;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
            outline: none;
        }
        .btn-kirim {
            background: linear-gradient(135deg, #2d6a4f, #1e3a5f);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            width: 100%;
            margin-top: 8px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-kirim:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        .btn-kembali {
            display: block;
            text-align: center;
            margin-top: 12px;
            color: #2d6a4f;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .btn-kembali:hover { opacity: 0.7; color: #2d6a4f; }
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.85rem;
            margin-bottom: 16px;
        }
        .text-error {
            color: #dc2626;
            font-size: 0.78rem;
            margin-top: 4px;
        }
    </style>

    <h2 style="font-size:1.4rem; font-weight:700; color:#1e3a5f; margin-bottom:6px">
        Lupa Password? 🔑
    </h2>
    <p style="font-size:0.82rem; color:#6b7280; margin-bottom:20px">
        Masukkan email kamu dan kami akan mengirimkan link untuk mengatur ulang password.
    </p>

    @if(session('status'))
        <div class="alert-success">
            ✅ {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label class="form-label">Email</label>
            <div style="position:relative">
                <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#9ca3af; font-size:0.9rem">✉️</span>
                <input type="email" name="email" class="form-control"
                       style="padding-left: 36px"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email kamu"
                       required autofocus>
            </div>
            @error('email')
                <p class="text-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-kirim">
            Kirim Link Reset Password →
        </button>

        <a href="{{ route('login') }}" class="btn-kembali">
            ← Kembali ke halaman login
        </a>

    </form>
</x-guest-layout>