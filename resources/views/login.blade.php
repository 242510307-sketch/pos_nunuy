@extends('layouts.app')

@section('title', 'Login POS')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Styling Biru Pastel Lucu */
    body {
        background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%) !important;
        min-height: 100vh;
    }

    .cute-card {
        border: none !important;
        border-radius: 20px !important;
        box-shadow: 0 10px 25px rgba(118, 156, 226, 0.3) !important;
        background: #ffffff !important;
        padding: 10px;
    }

    .cute-header {
        background-color: transparent !important;
        border-bottom: none !important;
        color: #4a6fa5;
        font-weight: 700;
        font-size: 1.4rem;
        padding-top: 15px;
    }

    .form-control-cute {
        border-radius: 12px !important;
        border: 2px solid #d0e1fd !important;
        padding: 10px 15px !important;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .form-control-cute:focus {
        border-color: #64b5f6 !important;
        box-shadow: 0 0 8px rgba(100, 181, 246, 0.4) !important;
    }

    .btn-cute {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
        border: none !important;
        border-radius: 12px !important;
        padding: 10px 20px !important;
        font-weight: 600;
        color: white !important;
        box-shadow: 0 4px 12px rgba(79, 172, 254, 0.4);
        transition: all 0.3s ease;
    }

    .btn-cute:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(79, 172, 254, 0.6);
    }

    .badge-cute {
        background-color: #ff85a1 !important;
        font-weight: 500;
        border-radius: 8px;
        padding: 5px 10px;
        margin-top: 5px;
    }
</style>

<div class="card cute-card text-center position-absolute top-50 start-50 translate-middle" style="width: 22rem;">
    
    <div class="cute-header">
        <div class="mb-2">
            <i class="fa-solid fa-store fa-bounce" style="color: #4facfe; font-size: 2.5rem;"></i>
        </div>
        Login POS ✨
        <p class="text-muted fs-6 fw-normal mt-1" style="font-size: 0.85rem !important;">Selamat datang kembali! 👋</p>
    </div>

    <div class="card-body px-4">
        <form action="{{ route('auth') }}" method="POST">
            @csrf
            
            <div class="mb-3 text-start">
                <label for="exampleInputEmail1" class="form-label fw-bold text-secondary style="font-size: 0.85rem;">
                    <i class="fa-regular fa-envelope me-1" style="color: #4facfe;"></i> Email Address
                </label>
                <input type="email" name="email" class="form-control form-control-cute" id="exampleInputEmail1" placeholder="nama@email.com" required>
                @error('email') 
                    <div class="badge badge-cute text-wrap w-100 mt-1">
                        <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="exampleInputPassword1" class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">
                    <i class="fa-solid fa-lock me-1" style="color: #4facfe;"></i> Password
                </label>
                <input type="password" name="password" class="form-control form-control-cute" id="exampleInputPassword1" placeholder="••••••••" required>
                @error('password') 
                    <div class="badge badge-cute text-wrap w-100 mt-1">
                        <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4" style="font-size: 0.8rem;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label text-secondary" for="rememberMe">Ingat saya</label>
                </div>
                <a href="#" class="text-decoration-none fw-bold" style="color: #4facfe;">Lupa?</a>
            </div>

            <button type="submit" class="btn btn-cute w-100 mb-2">
                Masuk Sekarang <i class="fa-solid fa-arrow-right-long ms-1"></i>
            </button>
        </form>
    </div>
</div>

@endsection