@extends('layouts.app')

@section('title', 'Đăng ký - Highlands Coffee')

@section('content')
<div class="min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow" style="border-radius: 16px; overflow: hidden;">
                    
                    <div class="card-header text-center py-4" style="background: #C8102E;">
                        <h3 class="mb-0 fw-bold text-white">Đăng ký tài khoản</h3>
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tên đăng nhập <span class="text-danger">*</span></label>
                                <input type="text" name="tenNguoiDung" class="form-control form-control-lg" 
                                       value="{{ old('tenNguoiDung') }}" required>
                                @error('tenNguoiDung') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control form-control-lg" 
                                       value="{{ old('email') }}" required>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" name="matKhau" class="form-control form-control-lg" required>
                                    @error('matKhau') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" name="matKhau_confirmation" class="form-control form-control-lg" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Vai trò</label>
                                <select name="vaiTro" class="form-select form-select-lg" required>
                                    <option value="Customer">Khách hàng</option>
                                    <option value="Employee">Nhân viên</option>
                                </select>
                            </div>

                            <button type="submit" 
                                    class="btn btn-lg w-100 text-white fw-bold py-3 mt-2"
                                    style="background: #0066CC; border-radius: 8px;">
                                Đăng ký
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" 
                               class="text-decoration-none" 
                               style="color: #0066CC;">
                                Đã có tài khoản? <strong>Đăng nhập ngay</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection