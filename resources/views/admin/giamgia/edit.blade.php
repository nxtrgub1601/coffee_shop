@extends('admin.dashboard')

@section('title', 'Sửa chương trình giảm giá')

@section('admin-page')

<div class="content-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Sửa chương trình giảm giá</h2>

        <a href="{{ route('admin.giamgia.index') }}"
           class="btn btn-secondary">

            Quay lại

        </a>

    </div>

    <form action="{{ route('admin.giamgia.update', $item) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Tên chương trình <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="tenChuongTrinh"
                   value="{{ $item->tenChuongTrinh }}"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Thể loại <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="theLoai"
                   value="{{ $item->theLoai }}"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                % Giảm <span class="text-danger">*</span>
            </label>

            <input type="number"
                   name="phanTramGiam"
                   value="{{ $item->phanTramGiam }}"
                   class="form-control"
                   required>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Ngày bắt đầu
                </label>

                <input type="date"
                       name="ngayBatDau"
                       value="{{ $item->ngayBatDau }}"
                       class="form-control"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Ngày kết thúc
                </label>

                <input type="date"
                       name="ngayKetThuc"
                       value="{{ $item->ngayKetThuc }}"
                       class="form-control"
                       required>

            </div>

        </div>

        <button type="submit"
                class="btn btn-warning">

            Cập nhật chương trình

        </button>

        <a href="{{ route('admin.giamgia.index') }}"
           class="btn btn-secondary">

            Hủy

        </a>

    </form>

</div>

@endsection