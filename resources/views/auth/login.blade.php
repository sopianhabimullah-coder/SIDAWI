<x-guest-layout>
    @if(session('status'))
        <div class="alert-error">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email') }}"
                   placeholder="Masukkan email..."
                   required autofocus>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control"
                   placeholder="Masukkan password..."
                   required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="d-flex align-items-center gap-2"
                   style="font-size:0.85rem; color:#6b7280; cursor:pointer">
                <input type="checkbox" name="remember"> Ingat saya
            </label>
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">
                    Lupa password?
                </a>
            @endif
        </div>

        <button type="submit" class="btn-login">
            Masuk →
        </button>

    </form>
</x-guest-layout>