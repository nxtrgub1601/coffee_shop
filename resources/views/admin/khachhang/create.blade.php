@extends('admin.dashboard')

@section('title', 'Thêm khách hàng')

@section('admin-page')

<div class="content-box">

    <h2 class="mb-4">Thêm khách hàng mới</h2>

    <form action="{{ route('admin.khachhang.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Tên người dùng <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="tenNguoiDung"
                   class="form-control"
                   placeholder="Nhập tên người dùng"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Email <span class="text-danger">*</span>
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Nhập email"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Mật khẩu <span class="text-danger">*</span>
            </label>

            <input type="password"
                   name="matKhau"
                   class="form-control"
                   placeholder="Nhập mật khẩu"
                   required>

        </div>

        <button type="submit"
                class="btn btn-success">

            Lưu khách hàng

        </button>

        <a href="{{ route('admin.khachhang.index') }}"
           class="btn btn-secondary">

            Hủy

        </a>

    </form>

</div>

@endsection