@extends('layouts.app')

@section('title', $sanPham->tenSanPham)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
@endpush

@section('content')

<div class="row">
    
    <!-- Hình ảnh -->
    <div class="col-md-5">
        <div class="product-image">
            @if($sanPham->hinh_anh)
                <img src="{{ asset('images/' . $sanPham->hinh_anh) }}" 
                     class="img-fluid w-100"
                     alt="{{ $sanPham->tenSanPham }}">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center"
                     style="height: 400px; border-radius: 12px;">
                    <h1 class="text-secondary">☕</h1>
                </div>
            @endif
        </div>
    </div>

    <!-- Thông tin -->
    <div class="col-md-7">

        <!-- Tên -->
        <h1 class="product-title">
            {{ $sanPham->tenSanPham }}
        </h1>

        <!-- Giá -->
        <div class="mb-4">

            @if(isset($giamGia))

                <span class="old-price">
                    {{ number_format($sanPham->gia) }} ₫
                </span>

                <span class="discount-badge">
                    -{{ $giamGia->phanTramGiam }}%
                </span>

                <div class="product-price mt-2">
                    {{ number_format($giaSauGiam) }} ₫
                </div>

            @else

                <div class="product-price">
                    {{ number_format($sanPham->gia) }} ₫
                </div>

            @endif

        </div>

        <!-- Rating -->
        @php
            $avg = round($sanPham->danhGias->avg('soSao'), 1);
        @endphp

        <div class="product-rating">
            ⭐ Trung bình:
            <strong>{{ $avg ?? 0 }}</strong>/5
            ({{ $sanPham->danhGias->count() }} đánh giá)
        </div>

        <!-- Mô tả -->
        <div class="product-description">
            {{ $sanPham->moTa ?? 'Không có mô tả cho sản phẩm này.' }}
        </div>

        <!-- Trạng thái -->
        <div class="mb-4" >
            <strong style="color: black;">Trạng thái:</strong>

            <span class="status-badge 
                {{ $sanPham->trangThai === 'Còn hàng' ? 'status-success' : 'status-danger' }}">
                {{ $sanPham->trangThai }}
            </span>
        </div>

        <!-- Button -->
        @if($sanPham->trangThai === 'Còn hàng')

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf

                <input type="hidden"
                       name="idSanPham"
                       value="{{ $sanPham->idSanPham }}">

                <button type="submit" class="btn-cart">
                    🛒 Thêm vào giỏ hàng
                </button>
            </form>

        @else

            <button class="btn btn-secondary btn-lg" disabled>
                Hết hàng
            </button>

        @endif


        <!-- Form đánh giá -->
        <div class="review-card">

            <div class="card-header">
                ✍️ Đánh giá sản phẩm
            </div>

            <div class="card-body">

                <form action="{{ route('danhgia.store', $sanPham) }}"
                      method="POST">

                    @csrf

                    <!-- Chọn sao -->
                    <select name="soSao"
                            class="form-select mb-3"
                            required>

                        <option value="">
                            -- Chọn số sao --
                        </option>

                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}">
                                {{ $i }} ⭐
                            </option>
                        @endfor

                    </select>

                    <!-- Nội dung -->
                    <textarea name="noiDung"
                              rows="4"
                              class="form-control mb-3"
                              placeholder="Nhập đánh giá của bạn..."
                              required></textarea>

                    <!-- Button -->
                    <button type="submit"
                            class="btn-review">
                        Gửi đánh giá
                    </button>

                </form>

            </div>

        </div>


        <!-- Danh sách đánh giá -->
        <div class="mt-5">

            <h3 class="mb-4 fw-bold">
                Đánh giá từ khách hàng
                ({{ $sanPham->danhGias->count() }})
            </h3>

            @forelse($sanPham->danhGias as $danhgia)

                <div class="customer-review">

                    <div class="d-flex justify-content-between align-items-center">

                        <!-- Tên -->
                        <div class="customer-name">
                            {{ $danhgia->nguoiDung->tenNguoiDung ?? 'Khách hàng' }}
                        </div>

                        <!-- Sao -->
                        <div>
                            @for($i=1; $i<=5; $i++)

                                <span class="star 
                                    {{ $i <= $danhgia->soSao ? 'active' : 'inactive' }}">
                                    ★
                                </span>

                            @endfor
                        </div>

                    </div>

                    <!-- Nội dung -->
                    <div class="review-text">
                        {{ $danhgia->noiDung }}
                    </div>

                    <!-- Thời gian -->
                    <div class="review-date">
                        {{ optional($danhgia->created_at)->format('d/m/Y H:i') }}
                    </div>

                </div>

            @empty

                <div class="alert alert-info">
                    Chưa có đánh giá nào.
                </div>

            @endforelse

        </div>

    </div>
</div>

@endsection