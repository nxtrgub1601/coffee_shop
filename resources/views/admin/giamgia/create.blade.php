@extends('admin.dashboard')

@section('title', 'Thêm chương trình giảm giá')

@section('admin-page')

<div class="content-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Thêm chương trình giảm giá</h2>

        <a href="{{ route('admin.giamgia.index') }}"
           class="btn btn-secondary">

            Quay lại

        </a>

    </div>

    <form action="{{ route('admin.giamgia.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Tên chương trình <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="tenChuongTrinh"
                   class="form-control"
                   placeholder="Nhập tên chương trình"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Thể loại <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="theLoai"
                   class="form-control"
                   placeholder="Ví dụ: Cà phê, Trà..."
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                % Giảm <span class="text-danger">*</span>
            </label>

            <input type="number"
                   name="phanTramGiam"
                   class="form-control"
                   placeholder="Nhập phần trăm giảm"
                   required>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Ngày bắt đầu
                </label>

                <input type="date"
                       name="ngayBatDau"
                       class="form-control"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Ngày kết thúc
                </label>

                <input type="date"
                       name="ngayKetThuc"
                       class="form-control"
                       required>

            </div>

        </div>

        <button type="submit"
                class="btn btn-success">

            Lưu chương trình

        </button>

        <a href="{{ route('admin.giamgia.index') }}"
           class="btn btn-secondary">

            Hủy

        </a>

    </form>

</div>

@endsection