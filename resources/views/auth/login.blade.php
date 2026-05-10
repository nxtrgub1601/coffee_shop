@extends('layouts.app')

@section('title', 'Đăng nhập - Highlands Coffee')

@section('content')
<div class="min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card border-0 shadow" style="border-radius: 16px; overflow: hidden;">
                    
                    <!-- Header -->
                    <div class="card-header text-center py-4" style="background: #C8102E;">
                        <h3 class="mb-0 fw-bold text-white">Đăng nhập</h3>
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tên đăng nhập</label>
                                <input type="text" name="tenNguoiDung" 
                                       class="form-control form-control-lg" 
                                       value="{{ old('tenNguoiDung') }}" 
                                       placeholder="Nhập tên đăng nhập" required autofocus>
                                @error('tenNguoiDung')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Mật khẩu</label>
                                <input type="password" name="matKhau" 
                                       class="form-control form-control-lg" 
                                       placeholder="Nhập mật khẩu" required>
                                @error('matKhau')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" 
                                    class="btn btn-lg w-100 text-white fw-bold py-3"
                                    style="background: #0066CC; border-radius: 8px;">
                                Đăng nhập
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="{{ route('register') }}" 
                               class="text-decoration-none" 
                               style="color: #0066CC;">
                                Chưa có tài khoản? <strong>Đăng ký ngay</strong>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4 text-muted">
                    <p class="mb-0">&copy; 2026 Highlands Coffee</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection