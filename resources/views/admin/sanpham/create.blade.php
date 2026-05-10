@extends('admin.dashboard')

@section('title', 'Thêm sản phẩm')

@section('admin-page')

<div class="content-box">

    <h2 class="mb-4">Thêm sản phẩm mới</h2>

    <form action="{{ route('admin.sanpham.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


        <div class="mb-3">
            <label class="form-label">
                Tên sản phẩm <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="tenSanPham"
                   class="form-control"
                   placeholder="Ví dụ: Cà phê sữa đá"
                   required>
        </div>


        <div class="mb-3">

            <label class="form-label">
                Danh mục
            </label>

            <select name="theLoai" class="form-select">

                <option value="">-- Chọn danh mục --</option>

                <option value="Cà phê">Cà phê</option>

                <option value="Trà">Trà</option>

                <option value="Freeze">Freeze</option>

                <option value="Bánh ngọt">Bánh ngọt</option>

                <option value="Nước ép">Nước ép</option>

            </select>

        </div>


        <div class="mb-3">

            <label class="form-label">Mô tả</label>

            <textarea name="moTa"
                      class="form-control"
                      rows="3"
                      placeholder="Mô tả sản phẩm..."></textarea>

        </div>


        <div class="row">

            <div class="col-md-6">

                <label class="form-label">
                    Giá bán (₫)
                </label>

                <input type="number"
                       name="gia"
                       class="form-control"
                       required>

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Số lượng tồn kho
                </label>

                <input type="number"
                       name="soLuong"
                       class="form-control"
                       required>

            </div>

        </div>


        <div class="mb-3 mt-3">

            <label class="form-label">
                Hình ảnh sản phẩm
            </label>

            <input type="file"
                   name="hinh_anh"
                   class="form-control"
                   accept="image/*">

        </div>


        <div class="mb-4">

            <label class="form-label">
                Trạng thái
            </label>

            <select name="trangThai" class="form-select">

                <option value="Còn hàng">
                    Còn hàng
                </option>

                <option value="Hết hàng">
                    Hết hàng
                </option>

            </select>

        </div>


        <button type="submit"
                class="btn btn-primary">

            Lưu sản phẩm

        </button>


        <a href="{{ route('admin.sanpham.index') }}"
           class="btn btn-secondary">

            Hủy

        </a>

    </form>

</div>

@endsection