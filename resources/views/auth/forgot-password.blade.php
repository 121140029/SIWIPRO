@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #126180, #0a3d52);
        min-height: 100vh;
    }
    .auth-wrapper {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .auth-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        overflow: hidden;
    }
    .auth-header {
        background: linear-gradient(135deg, #126180, #0f516b);
        color: #fff;
        padding: 1.5rem;
        text-align: center;
    }
    .auth-header h4 {
        margin-bottom: .25rem;
        font-weight: 600;
    }
    .auth-header p {
        margin: 0;
        font-size: .9rem;
        opacity: .9;
    }
    .auth-icon-circle {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.35);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.75rem;
        font-size: 1.7rem;
    }
</style>

<div class="container auth-wrapper">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">
            <div class="card auth-card">
                <div class="auth-header">
                    <div class="auth-icon-circle">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <h4>Lupa Password Pelanggan</h4>
                    <p>Masukkan email yang terdaftar untuk mengatur ulang password Anda.</p>
                </div>

                <div class="card-body p-4">
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('tamu.forgot-password.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-1"></i> Email Terdaftar
                            </label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="contoh: email@domain.com"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="text-muted">
                                Kami akan mengirimkan link untuk reset password ke email ini.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="fas fa-paper-plane me-1"></i> Kirim Permintaan Reset
                        </button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke halaman login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
