@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="container mt-4">

    <!-- BANNER -->
    <div id="bannerCarousel" 
         class="carousel slide carousel-fade mb-5"
         data-bs-ride="carousel"
         data-bs-interval="4000"
         data-bs-pause="false">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner rounded-4 overflow-hidden">

            <div class="carousel-item active">
                <div class="hero-slide" style="background-image: url('{{ asset('images/banner_1.jpg') }}')">
                    <div class="overlay"></div>

                    <div class="content">
                        <h1 class="fw-bold">Highlands Coffee</h1>
                        <p>Không gian thư giãn cùng hương vị cà phê đậm đà</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('{{ asset('images/banner_2.jpg') }}')">
                    <div class="overlay"></div>

                    <div class="content">
                        <h1>Bánh ngọt mỗi ngày</h1>
                        <p>Thưởng thức món ngon cùng ly cà phê yêu thích</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('{{ asset('images/banner_3.jpg') }}')">
                    <div class="overlay"></div>

                    <div class="content">
                        <h1>Góc chill cuối tuần</h1>
                        <p>Không gian nhẹ nhàng cho những buổi gặp gỡ</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- TITLE -->
    <h3 class="mb-4">Sản phẩm nổi bật</h3>

    <!-- PRODUCTS -->
    <div class="row">

        @foreach($sanPhams as $sp)

            @if($sp->trangThai != 'Ngừng kinh doanh' && $sp->trangThai != null)

            <div class="col-md-3 mb-4">

                <div class="card product-card p-3 h-100 position-relative">

                    @if(isset($sp->phanTramGiam) && $sp->phanTramGiam > 0)

                    <div class="sale-ribbon">
                        🔥 Giảm {{ $sp->phanTramGiam }}%
                    </div>

                    @endif

                    <img src="{{ asset('images/' . $sp->hinh_anh) }}"
                         class="card-img-top mb-3"
                         style="height:200px; object-fit:cover;">

                    <h6 class="product-title">
                        {{ $sp->tenSanPham }}
                    </h6>

                    <p class="text-muted small">
                        {{ $sp->theLoai }}
                    </p>

                    @if(isset($sp->phanTramGiam) && $sp->phanTramGiam > 0)

                        <p class="fw-bold">

                            <span class="text-danger fs-5">
                                {{ number_format($sp->gia) }} ₫
                            </span>

                            <br>

                            <small class="text-muted text-decoration-line-through">
                                {{ number_format($sp->gia_goc ?? $sp->gia) }} ₫
                            </small>

                        </p>

                    @else

                        <p class="text-success fw-bold">
                            {{ number_format($sp->gia) }} ₫
                        </p>

                    @endif

                    <a href="{{ route('sanpham.show', $sp->idSanPham) }}"
                       class="btn btn-detail w-100 mb-2">

                        ☕ Xem món

                    </a>

                    <form action="{{ route('cart.add') }}" method="POST">

                        @csrf

                        <input type="hidden"
                               name="idSanPham"
                               value="{{ $sp->idSanPham }}">

                        <button class="btn btn-spotify w-100">
                            🛒 Thêm vào giỏ
                        </button>

                    </form>

                </div>

            </div>

            @endif

        @endforeach

    </div>

</div>
@endsection