@extends('admin.dashboard')

@section('title', 'Sửa khách hàng')

@section('admin-page')

<div class="content-box">

    <h2 class="mb-4">Sửa khách hàng</h2>

    <form action="{{ route('admin.khachhang.update', $kh) }}"
          method="POST">

        @csrf
        @method('PUT')

        <!-- Tên người dùng -->
        <div class="mb-3">

            <label class="form-label">
                Tên người dùng <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="tenNguoiDung"
                   class="form-control"
                   value="{{ old('tenNguoiDung', $kh->tenNguoiDung) }}"
                   required>

        </div>

        <!-- Email -->
        <div class="mb-3">

            <label class="form-label">
                Email <span class="text-danger">*</span>
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email', $kh->email) }}"
                   required>

        </div>

        <!-- Mật khẩu -->
        <div class="mb-3">

            <label class="form-label">
                Mật khẩu mới
            </label>

            <input type="password"
                   name="matKhau"
                   class="form-control"
                   placeholder="Để trống nếu không đổi mật khẩu">

        </div>

        <!-- Button -->
        <button type="submit"
                class="btn btn-primary">

            Cập nhật

        </button>

        <a href="{{ route('admin.khachhang.index') }}"
           class="btn btn-secondary">

            Hủy

        </a>

    </form>

</div>

@endsection