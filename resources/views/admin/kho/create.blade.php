@extends('admin.dashboard')

@section('title', 'Nhập hàng mới')

@section('admin-page')

<div class="content-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Nhập hàng mới</h2>

        <a href="{{ route('admin.kho.index') }}"
           class="btn btn-secondary">

            Quay lại

        </a>

    </div>

    <form action="{{ route('admin.kho.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Sản phẩm <span class="text-danger">*</span>
            </label>

            <select name="idSanPham"
                    class="form-select"
                    required>

                <option value="">
                    -- Chọn sản phẩm --
                </option>

                @foreach($sanPhams as $sp)

                    <option value="{{ $sp->idSanPham }}">

                        {{ $sp->tenSanPham }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="row">

            <div class="col-md-6">

                <label class="form-label">
                    Số lượng nhập
                </label>

                <input type="number"
                       name="soLuongNhap"
                       class="form-control"
                       min="1"
                       required>

            </div>

            <div class="col-md-6">

                <label class="form-label">
                    Đơn giá nhập (₫)
                </label>

                <input type="number"
                       name="donGiaNhap"
                       class="form-control"
                       min="0"
                       required>

            </div>

        </div>

        <button type="submit"
                class="btn btn-success mt-4">

            Xác nhận nhập hàng

        </button>

        <a href="{{ route('admin.kho.index') }}"
           class="btn btn-secondary mt-4">

            Hủy

        </a>

    </form>

</div>

@endsection