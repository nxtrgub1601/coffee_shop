@extends('admin.dashboard')

@section('title', 'Thêm Khuyến mãi mới')

@section('admin-page')

<div class="content-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Thêm Khuyến mãi mới</h2>

        <a href="{{ route('admin.khuyenmai.index') }}"
           class="btn btn-secondary">

            Quay lại

        </a>

    </div>

    <form action="{{ route('admin.khuyenmai.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Mô tả khuyến mãi <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="moTaKhuyenMai"
                   class="form-control @error('moTaKhuyenMai') is-invalid @enderror"
                   value="{{ old('moTaKhuyenMai') }}"
                   required>

            @error('moTaKhuyenMai')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Ngày bắt đầu <span class="text-danger">*</span>
                </label>

                <input type="date"
                       name="ngayBatDau"
                       class="form-control @error('ngayBatDau') is-invalid @enderror"
                       value="{{ old('ngayBatDau') }}"
                       required>

                @error('ngayBatDau')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Ngày kết thúc <span class="text-danger">*</span>
                </label>

                <input type="date"
                       name="ngayKetThuc"
                       class="form-control @error('ngayKetThuc') is-invalid @enderror"
                       value="{{ old('ngayKetThuc') }}"
                       required>

                @error('ngayKetThuc')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

        </div>

        <button type="submit"
                class="btn btn-success mt-3">

            Lưu khuyến mãi

        </button>

        <a href="{{ route('admin.khuyenmai.index') }}"
           class="btn btn-secondary mt-3">

            Hủy

        </a>

    </form>

</div>

@endsection